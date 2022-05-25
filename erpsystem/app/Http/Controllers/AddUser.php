<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddUser extends Controller
{

    public function userCreate(){

        $pagetitle = "Add User";
        $userCreate = DB::table('users')->get();
        return view('adduser.adduser',compact('pagetitle','userCreate'));
    }

    public function userInsert(Request $request){
        
        $this->validate($request,[
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

        DB::table('users')->insert($data);
        return redirect('userCreate')->with('success','User Created Successfully!');
    }

    public function userEdit($UserID){
        $userEdit = DB::table('user')->where("UserID",$UserID)->get();
        return view('adduser.adduser_edit',compact('userEdit'));

    }
    public function userUpdate(Request $request){

    $this->validate($request,[
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
        $userUpdate = DB::table('users')->where('UserID',$request->UserID)->update($data);
        return redirect('userCreate')->with('success',"User has been updated successfully!");

    }
    public function userDelete($UserID){

        $userDelete = DB::table('users')->where('UserID',$UserID)->delete();
        return redirect("userCreate")->with('success',"User Deleted Successfully!");

    }

}
