<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    function getIncomeCategories()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $query = Category::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('type', '1');
        $incomeCategories = $query->get();
        return view('incomeCategories.index')->with('incomeCategories', $incomeCategories);
    }

    function create(Request $postData)
    {
        if (!Auth::user()) {
            abort(404);
        }
        $nc = new Category();
        $nc->name = $postData->input('name');
        $nc->user_id = Auth::user()->id;
        $nc->type = 1;

        $nc->save();
        return redirect()->route('incomeCategories');
    }

    function getEditPage($id)
    {
        if (!Auth::user()) {
            abort(404);
        }
        $category = Category::findorFail($id);
        if ($category->user_id != Auth::user()->id) {
            abort(404);
        }
        if ($category->type === 1) {
            return view('incomeCategories.edit')->with('category', $category);
        } else {
            return view('expenseCategories.edit')->with('category', $category);
        }
    }

    function edit(Request $postData, $id)
    {
        if (!Auth::user()) {
            abort(404);
        }
        $category = Category::findorFail($id);
        if ($category->user_id != Auth::user()->id) {
            abort(404);
        }
        $category->name = $postData->input('name');
        $category->save();

        if ($category->type === 1) {
            return redirect()->route('incomeCategories');
        } else {
            return redirect()->route('expenseCategories');
        }
    }

    function delete($id)
    {
        if (!Auth::user()) {
            abort(404);
        }
        $category = Category::findorFail($id);
        if ($category->user_id != Auth::user()->id) {
            abort(404);
        }
        $error = "";
        try {
            Category::destroy($id);
        } catch (QueryException $q) {
            $error = "Cannot delete category as a transaction exists for it.";
            
        }
        return Redirect::back()->withErrors(['msg' => $error]);
    }

    function getExpenseCategories()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $query = Category::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('type', '2');
        $expenseCategories = $query->get();
        return view('expenseCategories.index')->with('expenseCategories', $expenseCategories);
    }

    function createForExpense(Request $postData)
    {
        if (!Auth::user()) {
            abort(404);
        }
        $nc = new Category();
        $nc->name = $postData->input('name');
        $nc->user_id = Auth::user()->id;
        $nc->type = 2;

        $nc->save();
        return redirect()->route('expenseCategories');
    }
}
