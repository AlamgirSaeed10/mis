<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddUser extends Controller
{
   
    public function userCreate(){

        $pagetitle = "Add User";
        $userCreate = DB::table('user')->get();
        return view('adduser.adduser',compact('pagetitle','userCreate'));
    }

    public function userInsert(Request $request){

        $validate = $this->validate($request,[
            'FullName' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'UserType' => 'required',
            'Active' => 'required',
            ]);

        $password = bcrypt($request->Password);

         $data =array(
            'FullName' => $request->FullName,
            'Email' => $request->Email,
            'Password' => $password,
            'UserType' => $request->UserType,
            'Active' => $request->Active,
        );

        $userStore = DB::table('user')->insert($data);
        return redirect('userCreate')->with('success','User Created Successfully!');
    }

    public function userEdit($UserID){
        $userEdit = DB::table('user')->where("UserID",$UserID)->get();
        return view('adduser.adduser_edit',compact('userEdit'));
        
    }
    public function userUpdate(Request $request){

    $validate = $this->validate($request,[
        'Email' =>'required',
        'Password' =>'required',
    ]);

    $data =array(
            'FullName' => $request->FullName,
            'Email' => $request->Email,
            'Password' => bcrypt($request->Password),
            'UserType' => $request->UserType,
            'Active' => $request->Active,
        );
        $userUpdate = DB::table('user')->where('UserID',$request->UserID)->update($data);
        return redirect('userCreate')->with('success',"User has been updated successfully!");
        
    }
    public function userDelete($UserID){

        $userDelete = DB::table('user')->where('UserID',$UserID)->delete();
        return redirect("userCreate")->with('success',"User Deleted Successfully!");

    }
}
