<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Carbon;

class DashboardController extends Controller
{
    //

    public function fetch_notifications(){
        $get_notice = DB::table('v_notice')->where('EmployeeID',Session::get('EmployeeID'))->orderBy('NoticeID','Desc')->get();
        return response()->json(['data' => $get_notice]);
    }

    public function getRelatedNotice($id){
        $getRelatedNotice = DB::table('v_notice')->where('NoticeID',$id)->get();
        return response()->json(['notice'=>$getRelatedNotice]);
    }

    public function updateNoticeStatus($id){
        $updateNotice = DB::table('notice_status')->where('NoticeID',$id)->where('EmployeeID',Session::get('EmployeeID'))
        ->update(
            array(
                'Status' => '1',
                'uDate' => Carbon\Carbon::now())  
        );
         $getRelatedNotice = DB::table('v_notice')->where('NoticeID',$id)->where('EmployeeID',Session::get('EmployeeID'))->get();
        return response()->json(['updateNotice'=>$updateNotice , 'tot'=>count($getRelatedNotice)]);
    }


     public function getNotification(){
        $get_notice = DB::table('v_notice')->where('EmployeeID',Session::get('EmployeeID'))->where("Status",'0')->orderBy('NoticeID','Desc')->get();
        return response()->json(['data' => $get_notice]);
    }
    
}
