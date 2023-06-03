<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Auth::routes();
Route::get('logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Income Categories
Route::get('/incomeCategories','App\Http\Controllers\CategoryController@getIncomeCategories')->name('incomeCategories');
Route::get('/incomeCategories/add', function() { return view('incomeCategories.add'); });
Route::post('/incomeCategories/create','App\Http\Controllers\CategoryController@create')->name('incomeCategories.create');
Route::get('/incomeCategories/edit/{id}','App\Http\Controllers\CategoryController@getEditPage')->name('incomeCategories.openEdit');
Route::post('/incomeCategories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('incomeCategories.edit');
Route::get('/incomeCategories/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('incomeCategories.delete');

// Expense Categories
Route::get('/expenseCategories','App\Http\Controllers\CategoryController@getExpenseCategories')->name('expenseCategories');
Route::get('/expenseCategories/add', function() { return view('expenseCategories.add'); });
Route::post('/expenseCategories/create','App\Http\Controllers\CategoryController@createForExpense')->name('expenseCategories.create');
Route::get('/expenseCategories/edit/{id}','App\Http\Controllers\CategoryController@getEditPage')->name('expenseCategories.openEdit');
Route::post('/expenseCategories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('expenseCategories.edit');
Route::get('/expenseCategories/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('expenseCategories.delete');

// Income
Route::get('/income','App\Http\Controllers\TransactionController@getIncome')->name('income');
Route::get('/income/add', 'App\Http\Controllers\TransactionController@openIncomeAdd')->name("income.add");
Route::post('/income/create','App\Http\Controllers\TransactionController@createIncome')->name('income.create');
Route::get('/income/edit/{id}','App\Http\Controllers\TransactionController@getEditPage')->name('income.openEdit');
Route::post('/income/edit/{id}','App\Http\Controllers\TransactionController@edit')->name('income.edit');
Route::get('/income/delete/{id}','App\Http\Controllers\TransactionController@delete')->name('income.delete');

// Expense
Route::get('/expense','App\Http\Controllers\TransactionController@getExpense')->name('expense');
Route::get('/expense/add', 'App\Http\Controllers\TransactionController@openExpenseAdd')->name("expense.add");
Route::post('/expense/create','App\Http\Controllers\TransactionController@createExpense')->name('expense.create');
Route::get('/expense/edit/{id}','App\Http\Controllers\TransactionController@getEditPage')->name('expense.openEdit');
Route::post('/expense/edit/{id}','App\Http\Controllers\TransactionController@edit')->name('expense.edit');
Route::get('/expense/delete/{id}','App\Http\Controllers\TransactionController@delete')->name('expense.delete');


Route::get('/monthlyReport','App\Http\Controllers\ReportsController@index')->name('monthlyReport');

Route::get('/users','App\Http\Controllers\UserController@index')->name('admin.users');
Route::get('/export','App\Http\Controllers\UserController@export')->name('admin.export');
