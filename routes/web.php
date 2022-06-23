<?php

use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TableUser;
use App\Http\Controllers\TableuserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/bank', function () {
    return view('admin/setup_bank');
});
Route::get('/report',function(){
    return view('admin/report');
});



Route::get('/index',[TableuserController::class,'ViewTable']);
Route::post('/login',[TableuserController::class,'CheckLogin']);
Route::get('/logout',[TableuserController::class,'Logout']);
//setup bank
Route::post('/insert',[TableuserController::class,'bankData']);
Route::get('/bank',[TableuserController::class,'ViewTablebank']);
Route::post('/update',[TableuserController::class,'UpdateData']);
Route::post('/delete',[TableuserController::class,'DeleteData']);

// Route::get('/income',function(){
    
//     return view('admin/income');
// });

//select table bank
Route::get('/income',[FinanceController::class,'BankName']);
//Route::get('/bankname',[FinanceController::class,'IncomeList']);
Route::post('/insertincome',[FinanceController::class,'InsertIncome']);
Route::post('/updateincome',[FinanceController::class,'UpdateIncome']);
Route::post('/deleteincome',[FinanceController::class,'DeleteIncome']);

//expense
Route::get('/expense',function(){
    
    return view('admin/expense');
});
Route::get('/expense',[FinanceController::class,'ExpenseName']);
Route::post('/insertexpense',[FinanceController::class,'InsertExpense']);
Route::post('/updateexpense',[FinanceController::class,'UpdateExpense']);
Route::post('/deleteexpense',[FinanceController::class,'DeleteExpense']);

//report
Route::get('/report',[FinanceController::class,'ReportData']);
//Route::get('/report',[FinanceController::class,'TotalSum']);