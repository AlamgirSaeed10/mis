<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{


    public function index()
    {
        $pagetitle= "Shah CRM";
        return view('Welcome',compact('pagetitle'));
    }


    function login()
    {

       
      
        return view('auth.login');
      
       
    }
    function logout()
    {
        Session::flush(); // removes all session data
        return redirect('/')->with('error', 'Logout Successfully.');
    }

    public function UserVerify(Request $request)
    {
        // dd($request); 
         
        
        if ($request->StaffType == 'Management') {

                // dd('hello');
             $username = $request->email;
            $password =  $request->input('password');
            
         

            $data = DB::table('employee')->where('Email', '=', $username)
                ->where('Password', '=', $password)
                ->where('Active', '=', 'Y')
                ->get();
              
             
            if (count($data) > 0) {
                // dd('heloo');
                Session::put('FullName', $data[0]->FirstName);
                Session::put('EmployeeID', $data[0]->EmployeeID);
                Session::put('Email', $data[0]->Email);
                Session::put('StaffType', $data[0]->StaffType);
                Session::put('DepartmentID', $data[0]->DepartmentID);
                Session::put('Picture', $data[0]->Picture);
                Session::put('LoggedUser');

                if (session::get('StaffType') == 'HR') {
                 
                    $pagetitle = "HR Dashboard";
                // dd($pagetitle);
                return redirect('/dashboard')->with('pagetitle',  $pagetitle);
          
                    // return view('dashboard',compact('pagetitle'))->with('error', 'Welcome to Extensive HR System')->with('class', 'success');
                } elseif (session::get('StaffType') == 'GM') {
                    $pagetitle = "GM Dashboard";

                    return view('dashboard',compact('pagetitle'))->with('error', 'Welcome to Extensive HR System')->with('class', 'success');
                } 
                elseif (session::get('StaffType') == 'OM') {
                    $pagetitle = "OM Dashboard";
                    
                    return view('dashboard',compact('pagetitle'))->with('error', 'Welcome to Extensive HR System')->with('class', 'success');

                } 
                else
                {
                    return redirect('/login')->with('error', 'Please Login as an Employee')->with('class', 'success');

                }
            } else {

                  
                //session::flash('error', 'Invalid username or Password. Try again'); 

                return redirect('/login')->with('error', 'Invalid User Name or Password')->with('class', 'success');

            }
        } else {

            $username = $request->input('email');
            $password =  $request->input('password');
            $staff_type = $request->StaffType;

            $data = DB::table('employee')->where('Email', '=', $username)
                ->where('Password', '=', $password)
                ->where('StaffType', '=', $staff_type)
                // ->where('Active', '=', 'Y' )
                ->get();
           
            if (count($data) > 0) {
                Session::put('FullName', $data[0]->FirstName . ' ' . $data[0]->MiddleName . ' ' . $data[0]->LastName);
                Session::put('EmployeeID', $data[0]->EmployeeID);
                Session::put('Email', $data[0]->Email);
                Session::put('StaffType', $data[0]->StaffType);
                Session::put('BranchID', $data[0]->DepartmentID);
                Session::put('Picture', $data[0]->Picture);
                Session::put('LoggedUser');
                   //employ dashboard data
                   $employee = DB::table('employee')
                   ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
                   ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')->where('EmployeeID','=' , session::get('EmployeeID'))
                   ->get();
                  

                   $pagetitle = "Employee Dashboard";
                   return redirect('/employeeprofile');
                //    return view('employe_section.dashboard', compact('employee' ,'pagetitle'));
            } else {
                return redirect('/login')->withinput($request->all())->with('error', 'Invalid username or Password. Try again');
            }
        }
    }

}
