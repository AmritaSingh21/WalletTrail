<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Support\Facades\Http;

class ReportsController extends Controller
{
    function index(Request $postData)
    {
        if (!Auth::user()) {
            abort(404);
        }
        if ($postData->input('month')) {
            // $str = explode("-", $postData->input('month'));
            $str = $postData->input('month');
        } else {
            $str = $postData->get('y', date('Y')) . '-' . $postData->get('m', date('m'));
        }

        $strArray = explode("-", $str);
        $from = Carbon::parse($strArray[0] . "-" . $strArray[1] . "-01");
        $to = Carbon::parse($strArray[0] . "-" . $strArray[1] . "-01");
        $to->day = $to->daysInMonth;

        $query = Transaction::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('transaction_type', 'income');
        $query->whereBetween('date', [$from, $to]);
        $incomes = $query->get();
        $inc_total = $incomes->sum("amount");
        $inc_summary = [];
        for ($i = 0; $i < sizeof($incomes); $i++) {
            $category = Category::findorFail($incomes[$i]->category_id);
            $incomes[$i]["categoryName"] = $category->name;
        }

        foreach ($incomes as $inc) {
            if (!isset($inc_summary[$inc->categoryName])) {
                $inc_summary[$inc->categoryName] = [
                    'name'   => $inc->categoryName,
                    'amount' => 0,
                ];
            }
            $inc_summary[$inc->categoryName]['amount'] += $inc->amount;
        }

        $query2 = Transaction::query();
        $query2->where('user_id', Auth::user()->id);
        $query2->where('transaction_type', 'expense');
        $query2->whereBetween('date', [$from, $to]);
        $expenses = $query2->get();
        $exp_total = $expenses->sum("amount");
        $exp_summary = [];
        for ($i = 0; $i < sizeof($expenses); $i++) {
            $category = Category::findorFail($expenses[$i]->category_id);
            $expenses[$i]["categoryName"] = $category->name;
        }

        foreach ($expenses as $exp) {
            if (!isset($exp_summary[$exp->categoryName])) {
                $exp_summary[$exp->categoryName] = [
                    'name'   => $exp->categoryName,
                    'amount' => 0,
                ];
            }
            $exp_summary[$exp->categoryName]['amount'] += $exp->amount;
        }


        $viewData = array();
        $viewData["inc_total"] = $inc_total;
        $viewData["inc_summary"] = $inc_summary;
        $viewData["exp_total"] = $exp_total;
        $viewData["exp_summary"] = $exp_summary;
        $viewData["profit"] = $inc_total - $exp_total;
        $viewData["month"] = $str;

        //graph 1
        $curl1 = curl_init();
        $url1 = "https://image-charts.com/chart";
        $url1 .= "?cht=p3";
        $url1 .= "&chs=300x300";
        $param1 = "&chd=t:";
        $param2 = "&chl=";
        foreach($inc_summary as $inc){
            $p = ($inc['amount']/$inc_total ) * 100;
            $param1 .= $p.",";
            $param2 .= $inc["name"]."|";
        }
        $url1 .= $param1.$param2;

        $url1 .= "&chan";
        curl_setopt($curl1, CURLOPT_URL, $url1);
        curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
        $result1 = curl_exec($curl1);
        curl_close($curl1);

        //graph 2
        $curl2 = curl_init();
        $url2 = "https://image-charts.com/chart";
        $url2 .= "?cht=p3";
        $url2 .= "&chs=300x300";
        $param1 = "&chd=t:";
        $param2 = "&chl=";
        foreach($exp_summary as $exp){
            $p = ($exp['amount']/$exp_total ) * 100;
            $param1 .= $p.",";
            $param2 .= $exp["name"]."|";
        }
        $url2 .= $param1.$param2;
        $url2 .= "&chan";
        curl_setopt($curl2, CURLOPT_URL, $url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
        $result2 = curl_exec($curl2);
        curl_close($curl2);

        $viewData["graph1"] = $result1;
        $viewData["graph2"] = $result2;

        return view("reports.index")->with("viewData", $viewData);
    }
}
