<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\session;


class Profile extends Controller
{

	
	
	public function changepassword(){
		return view('profile.changepassword');

	}


	public function userPasswordUpdate(Request $request){
		$this->validate($request, [
            'Password' => 'required',
			 'ConfirmPassword' => 'required|same:Password',
        ]);


		$EmployeeID =  session::get('EmployeeID');
		$oldPassword = $request->OldPassword;
		$newPassword = $request->Password;
		$confirmNewPassword = $request->ConfirmPassword;

		$data = array('Password' => $newPassword );

		$userProfileUpdate = DB::table('employee')->where('EmployeeID',$EmployeeID)->where('Password',$oldPassword)->get();
		// dd(count($userProfileUpdate));
		// dd($EmployeeID . '----' . $oldPassword . '----' .$newPassword . '----' .$confirmNewPassword . '----' . count($userProfileUpdate) );

		if(count($userProfileUpdate) == 0)
		{
			
		return redirect()->back()->with('error', 'Your Current Password is Wrong')->with('class', 'danger');

		
		}
		else
		{
			
			 DB::table('employee')->where('EmployeeID', $EmployeeID)->update($data);
			 return redirect()->back()->with('success', 'Password Changed Successfully')->with('class', 'success');


		}


	}
    //
}
