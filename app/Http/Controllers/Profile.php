<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Profile extends Controller
{

	public function userProfile(){
		$pagetitle = "Manage User";
		return view('profile.userprofile', compact('pagetitle'));

	}

	public function userProfileUpdate(Request $request){

		$UserID = $request->UserID;
		$oldPassword = $request->Password;
		$newPassword = $request->Password;
		$confirmNewPassword = $request->Password;



		$userProfileUpdate = DB::table('user')->where('Password',$oldPassword)->where('UserID',$UserID)->get();
		print_r($UserID . '----' . $oldPassword . '----' .$newPassword . '----' .$confirmNewPassword . '----' . count($userProfileUpdate) );

		if(count($userProfileUpdate) == 0){
			print_r("old password is wrong");
		}else{
			if($newPassword == $confirmNewPassword)
			{
			print_r("both are same");	
			}
		}


	}
    //
}
