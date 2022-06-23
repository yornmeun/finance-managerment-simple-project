<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //
    public function Data(){
        return view('admin/income');
    }
    
    public function BankName(){
        $tblbank = DB::table('tblbank')->get();
        $tblincome = DB::table('tblincome')->get();
 
        return view('admin/income',['bankname'=>$tblincome,'bank_name'=>$tblbank]);
    }
    public function InsertIncome(Request $data){
        $amount     = $data->input("txtamount");
        $bankname   = $data->input("bankname");
        $date       = $data->input("txtdate");
        $discrition = $data->input("txtdis");
        echo $amount ." ".$bankname." ".$date." ".$discrition;
        DB::table('tblincome')->insert([
            'amount'=>$amount,
            'bank'=>$bankname,
            'date'=>$date,
            'decrition'=>$discrition,
            ]);
        //echo "Record inserted successfully";
     }
    
     public function IncomeList(){
        $tblincome = DB::table('tblincome')->get();
        //$table= DB::select('select tblbank.bankid,tlbbank.bank_name from tblbank INNER JOIN tblincome on tblbank.bankid=tblincom.incomeid');
        return view('admin/income',['incomes'=>$tblincome]);
       
    }
    
    public function UpdateIncome(Request $rq){
        $id = $rq->input("incomeid");
        $amount = $rq->input("amount"); 
        $bankname= $rq->input('bank_name');
        $des = $rq->input("descrition");
        $date = $rq->input("date"); 
        echo $id." ".$amount." ".$bankname." ".$des." ".$date;
       
        DB::table('tblincome')
             ->where('incomeid', [$id])
             ->update([
             'amount'=>$amount,
             'bank'=>$bankname,
             'decrition'=>$des,
             'date'=>$date,
            
            ]);
           // echo "update succeful";
     
    
     }
     public function DeleteIncome(Request $data){
        $txtid =$data->input('income_id');
        //echo $txtid;
       DB::table('tblincome')->where('incomeid',[$txtid])->delete();
        
       //echo "succesfull";

    }

    //expense
    public function ExpenseName(){
        $tblbank = DB::table('tblbank')->get();
        $tblexpense = DB::table('tblexpensse')->get();
 
        return view('admin/expense',['expenses'=>$tblexpense,'bank_name'=>$tblbank]);
    }
    public function InsertExpense(Request $data){
        $amount     = $data->input("txtamount");
        $bankname   = $data->input("bankname");
        $date       = $data->input("txtdate");
        $discrition = $data->input("txtdis");
        echo $amount ." ".$bankname." ".$date." ".$discrition;
        DB::table('tblexpensse')->insert([
            'amount'=>$amount,
            'bank'=>$bankname,
            'date'=>$date,
            'decrition'=>$discrition,
            ]);
        //echo "Record inserted successfully";
     }
     public function UpdateExpense(Request $rq){
        $id = $rq->input("expenseid");
        $amount = $rq->input("amount"); 
        $bankname= $rq->input('bank_name');
        $des = $rq->input("descrition");
        $date = $rq->input("date"); 
       // echo $id." ".$amount." ".$bankname." ".$des." ".$date;
       
        DB::table('tblexpensse')
             ->where('expenseid', [$id])
             ->update([
             'amount'=>$amount,
             'bank'=>$bankname,
             'decrition'=>$des,
             'date'=>$date,
            
            ]);
            //echo "update succeful";
     
    
     }
     public function DeleteExpense(Request $data){
        $txtid =$data->input('expenseid');
        //echo $txtid;
       DB::table('tblexpensse')->where('expenseid',[$txtid])->delete();
        
       //cho "succesfull";

    }

    //report
    public function ReportData(){
         $report = DB::table('tblincome')->select('amount','date','bank')->get();
         $reportex = DB::table('tblexpensse')->select('amount','date','bank')->get();
         $total= DB::table("intotal_view")->get();
         $totalex= DB::table("extotal_view")->get();
      
        return view('admin/report',['sum'=>$total,'reports'=>$report,'reportexs'=>$reportex,'totalexs'=>$totalex]);
    }
    public function TotalSum(){
        $total = DB::view("intotal_view")->get();
        return view('admin/report',['totals'=>$total]);
       
        
        
    }
}
