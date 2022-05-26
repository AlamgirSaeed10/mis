<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class NoticeBoardController extends Controller
{
    
    public function addNewNotice(){
        $all_employees = DB::table('employee')->get();
        $pagetitle = "Add new Notice";
        return view('addNewNotice', compact('pagetitle', 'all_employees'));
    }
    public function saveNoticeInDB(Request $request){
        $data = $this->validate($request, ['Title' => 'required', 'Description' => 'required', ]);
        $all_employees_id = DB::table('employee')->get();
        $data = array(
            'Title' => $request->Title,
            'Description' => $request->Description,
            'FromEmployeeID' => $request->FromEmployeeID
        );
        $noticeid = DB::table('notice')->insertGetId($data);
        foreach ($all_employees_id as $value)
        {
            $data = array(
                'NoticeID' => $noticeid,
                'EmployeeID' => $value->EmployeeID,
                'Status' => 0,
            );
            DB::table('notice_status')->insertGetId($data);
        }
        return redirect('datatable')->with('success', 'Notice has be uploaded Successfully');
    }
    public function datatable(){
    return view('datatable');
    }
    public function viewAllNotices(){

        $get_employeID = DB::table('notice')->where("FromEmployeeID",Session::get("EmployeeID"))->get();
        return DataTables::of($get_employeID)->addIndexColumn()->addColumn('action', function ($row)
        {

            $btn = '<a href="' . URL('getAllNotice/' . $row->NoticeID) . '" class="edit text-info btn-md"><i class="mdi mdi-eye-check-outline" style="font-size:20px;></i></a> ';
            $btn = $btn . '<a href="javascript:void(0)" onclick="delete_confirm2(`deleteNotice`,'.$row->NoticeID.')" class="edit text-danger btn-md">
            <i class="mdi mdi-trash-can" style="font-size:20px; color:red;"></i></a>';


            return $btn;
        })->rawColumns(['action'])
            ->make(true);

        return redirect('datatable');
    }
    public function getAllNotice($id){
        $getRelatedNotice = DB::table('v_employeenotice')->where('NoticeID', $id)->get();
        return view('allNotices', compact('getRelatedNotice'));
    }
    public function getNotification($id){
        $get_notice = DB::table('v_notice')
            ->where('NoticeID', $id)->where("Status", '0')
            ->get();

            $data = array('Status' => 1, );
        $id = DB::table('notice_status')->where('EmployeeID',session::get('EmployeeID'))->where('NoticeID',$id)->update($data);    
        return view('notice_notification', compact('get_notice'));
    }
    public function sendNotification(){
        $get_notice = DB::table('v_notice')->where('EmployeeID', Session::get('EmployeeID'))
            ->where("Status", '0')
            ->where("Desktop",'0')
            ->orderBy('NoticeID', 'Desc')
            ->get();
            $cc = count($get_notice);
            if($cc > 0){
        return response()->json(['data' => $get_notice]);
            }
    }
    public function deleteNotice($id){

        $delete_notice = DB::table('notice')->where('NoticeID', $id)->where('FromEmployeeID',Session::get('EmployeeID'));
        $delete_notice->delete();

        return redirect('datatable')->with('success','Notice has been Deleted Successfully!');
    }
}
