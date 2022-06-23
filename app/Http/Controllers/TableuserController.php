<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class TableuserController extends Controller
{
    //
    public function ViewTable(){
        $table= DB::select('select * from tbluser');
        return view('admin/user',['users'=>$table]);
       }

       //login
    public function CheckLogin(Request $rq){
       
        $username = $rq->input('username');
        $password = $rq->input('password');
       // echo $username." ".$password;

        //select form table
        
       $sql = DB::select("select * from tbluser WHERE username=? AND password=?",[$username,md5($password)]);
      
        foreach($sql as $sqls)
        {
            $user=$sqls->username;
            $pass=$sqls->password;
            $userid= $sqls->userid;
            $us="login as admin";
            //session(['userid'=>$userid]);
            session(['username'=>$us]);
            session()->put('userid',$userid);
         
           // echo $user." ".$pass;
          }

           if($username == $user && md5($password)==$pass){ 
            echo 1;
            //return redirect("index");
           }
           //else echo "error";   
    }
    public function Logout(Request $rq){
        $rq->session()->forget('userid');
        $rq->session()->forget('username');
        return redirect("login");
    }
    public function bankData(Request $data){
        $banknum = $data->input("banknumber");
        $accname = $data->input("accname");
        //echo $banknum ." ".$accname;
        DB::table('tblbankacc')->insert([
            'banknum'=>$banknum,
            'accname'=>$accname,
            
            ]);
        //echo "Record inserted successfully";
    }

    public function ViewTablebank(){
        $table= DB::select('select * from tblbankacc');
        return view('admin/setup_bank',['users'=>$table]);
       }

    public function UpdateData(Request $rq){
        $id = $rq->input("id");
        $name = $rq->input("bankname"); 
        $accname= $rq->input('accname');
       
        DB::table('tblbankacc')
             ->where('bankid', [$id])
             ->update([
             'banknum'=>$name,
             'accname'=>$accname,
            
            ]);
     
     //echo "Record updated successfully";
     }

     public function DeleteData(Request $data){
        $txtid =$data->input('user_id');
        //echo $txtid;
        DB::table('tblbankacc')->where('bankid',[$txtid])->delete();
        
       //echo "succesfull";

    }
   
}
