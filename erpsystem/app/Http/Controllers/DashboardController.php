<?php

namespace App\Http\Controllers;
use Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function fetch_notifications(){
        $data = DB::table('v_notice')->where('Status','0')->where('EmployeeID',Session::get('EmployeeID'))->orderBy('NoticeID','Desc')->get();

        if(count($data) > 0){
            return response()->json(['data' => $data]);
        }
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
                'uDate' => Carbon\Carbon::now()
            )  
        );
         $getRelatedNotice = DB::table('v_notice')->where('Status',0)->where('EmployeeID',Session::get('EmployeeID'))->get();
        return response()->json(['updateNotice'=>$updateNotice , 'tot'=>count($getRelatedNotice)]);
    }
    public function updateNotificationStatus($id){
        $updateNotificationStatus = DB::table('notice_status')->where('NoticeID',$id)->where('EmployeeID',Session::get('EmployeeID'))
        ->update(
            array(
                'Desktop' =>'1',
            )
        );
        return response()->json(['updateNotificationStatus'=>$updateNotificationStatus]);
    }
    


}
