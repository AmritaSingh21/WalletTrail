<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class TransactionController extends Controller
{
    function getIncome()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $query = Transaction::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('transaction_type', 'income');
        $incomes = $query->get();
        $incomes = $incomes->sortBy('date');
        for($i = 0; $i<sizeof($incomes);$i++){
            $category = Category::findorFail($incomes[$i]->category_id);
            $incomes[$i]["categoryName"] = $category->name;
        }
        return view('income.index')->with('incomes', $incomes);
    }
    
    function openIncomeAdd(){
        if (!Auth::user()) {
            abort(404);
        }
        $query = Category::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('type', '1');
        $incomeCategories = $query->get();
        return view('income.add')->with('incomeCategories',$incomeCategories);
    }

    function createIncome(Request $postData){
        if (!Auth::user()) {
            abort(404);
        }
        $income = new Transaction();
        $income->amount = $postData->input('amount');
        $income->date = $postData->input('date');
        $income->category_id = $postData->input('category_id');
        $income->user_id = Auth::user()->id;
        $income->transaction_type = "income";

        $income->save();
        return redirect()->route('income');
    }

    function getEditPage($id){
        if (!Auth::user()) {
            abort(404);
        }
        $trans = Transaction::findorFail($id);
        if($trans->user_id != Auth::user()->id){
            abort(404);
        }
        $query = Category::query();
        $query->where('user_id', Auth::user()->id);
       
        if($trans->transaction_type === "income"){
            $query->where('type', '1');
            $incomeCategories = $query->get();
            return view('income.edit')->with('income',$trans)->with('incomeCategories',$incomeCategories);
        }else {
            $query->where('type', '2');
            $expenseCategories = $query->get();
            return view('expense.edit')->with('expense',$trans)->with('expenseCategories',$expenseCategories);
        }
    }

    function edit(Request $postData, $id){
        if (!Auth::user()) {
            abort(404);
        }
        $trans = Transaction::findorFail($id);
        if($trans->user_id != Auth::user()->id){
            abort(404);
        }
        $trans->amount = $postData->input('amount');
        $trans->date = $postData->input('date');
        $trans->category_id = $postData->input('category_id');
        $trans->save();

        if($trans->transaction_type === "income"){
            return redirect()->route('income');
        }else {
            return redirect()->route('expense');
        }
    }

    function delete($id){
        if (!Auth::user()) {
            abort(404);
        }
        $trans = Transaction::findorFail($id);
        if($trans->user_id != Auth::user()->id){
            abort(404);
        }
        Transaction::destroy($id);
        return back();
    }

    function getExpense()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $query = Transaction::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('transaction_type', 'expense');
        $expenses = $query->get();
        $expenses = $expenses->sortBy('date');
        for($i = 0; $i<sizeof($expenses);$i++){
            $category = Category::findorFail($expenses[$i]->category_id);
            $expenses[$i]["categoryName"] = $category->name;
        }
        return view('expense.index')->with('expenses', $expenses);
    }
    
    function openExpenseAdd(){
        if (!Auth::user()) {
            abort(404);
        }
        $query = Category::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('type', '2');
        $expenseCategories = $query->get();
        return view('expense.add')->with('expenseCategories',$expenseCategories);
    }

    function createExpense(Request $postData){
        if (!Auth::user()) {
            abort(404);
        }
        $expense = new Transaction();
        $expense->amount = $postData->input('amount');
        $expense->date = $postData->input('date');
        $expense->category_id = $postData->input('category_id');
        $expense->user_id = Auth::user()->id;
        $expense->transaction_type = "expense";

        $expense->save();
        return redirect()->route('expense');
    }
}
