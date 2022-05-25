<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB,Session,DataTables;

class NoticeBoardController extends Controller
{
    //

    public function addNewNotice(){
        $all_employees = DB::table('employee')->get();
        $pagetitle = "Add new Notice";
        return view('addNewNotice',compact('pagetitle','all_employees'));
    }

public function saveNoticeInDB(Request $request){

         $data =  $this->validate($request, [
            'Title' => 'required',
            'Description' => 'required',
        ]);

        $all_employees_id = DB::table('employee')->get();

        $data = array(

            'Title' => $request->Title, 
            'Description' =>$request->Description,
            'FromEmployeeID' =>$request->FromEmployeeID
        );

        $noticeid = DB::table('notice')->insertGetId($data);

         foreach ($all_employees_id as $key => $value) {


      $data = array (
        'NoticeID' => $noticeid, 
        'EmployeeID' => $value->EmployeeID,
        'Status' => 0,

            );

        $notice_status= DB::table('notice_status')->insertGetId($data);

        }

       return view('datatable')->with('error','Save Successfully')->with('class','success');

        }
        
    public function datatable(){
        return view ('datatable');
    }

    public function viewAllNotices(Request $request){
        
        $get_employeID = DB::table('notice')->get();
         return DataTables::of($get_employeID)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                           $btn = '<a href="'.URL('getAllNotice/'.$row->NoticeID).'" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                           $btn = $btn.'<a href="'.URL('getAllNotice/'.$row->NoticeID).'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> ';
                           $btn = $btn.'<a href="'.URL('getAllNotice/'.$row->NoticeID).'" class="edit btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> ';
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
       
        return view('viewAllNotices');
        
    }
    public function getAllNotice($id){
        $getRelatedNotice = DB::table('v_employeenotice')->where('NoticeID',$id)->get();
        return view('allNotices',compact('getRelatedNotice'));
    }
}
