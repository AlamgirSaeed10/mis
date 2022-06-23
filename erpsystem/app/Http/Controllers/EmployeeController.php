<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Session;
use URL;
use Image;
use Excel;
use File;
use PDF;
use Illuminate\Validation\Rule;
class EmployeeController extends Controller
{
    function show_departments()
    {
        $departments = DB::table('department')
            ->select('*')
            ->get();
        return view('HR.department', compact('departments'));
    }
    function add_department(Request $request)
    {
        $this->validate($request, [
            'departmentname' => 'required|max:30|unique:department',

        ]);

        $department = $request->departmentname;
        DB::table('department')->insert([
            'DepartmentName' => $department
        ]);
        return redirect()->back();
    }
    function deletedepartment($DepartmentID)
    {
        DB::delete('delete from department where DepartmentID = ?', [$DepartmentID]);
        return redirect()->back()->with('error', 'Leave Saved Successfully')->with('class', 'success');
        return redirect()->back();
    }
    function editdepartment($DepratmentID)
    {
        $department = DB::select('select * from department where DepartmentID = ?', [$DepratmentID]);

        return view('HR/editdepartment', compact('department'));
    }
    function updatedepartment(Request $request)
    {

        $DepartmentID = $request->DepartmentID;
        $DepartmentName = $request->departmentname;

        DB::update('update department set DepartmentName = ? where DepartmentID = ?', [$DepartmentName, $DepartmentID]);
        return redirect('departments');
    }

    function educationlevels()
    {
        $educationlevels = DB::table('educationlevel')->get();
        return view('HR.educationlevel', compact('educationlevels'));
    }
    function add_educationlevels(Request $request)
    {
        $this->validate($request, [
            'EducationLevelName' => 'required|max:30|unique:educationlevel',
        ]);

        $educationlevel = $request->EducationLevelName;
        DB::table('educationlevel')->insert([
            'EducationLevelName' => $educationlevel
        ]);
        return redirect()->back();
    }
    function deleteeducationlevel($EducationLevelID)
    {

        DB::delete('delete from educationlevel where EducationLevelID = ?', [$EducationLevelID]);
        return redirect()->back();
    }
    function editeducationlevel($EducationLevelID)
    {
        $educationlevel = DB::select('select * from educationlevel where EducationLevelID = ?', [$EducationLevelID]);

        return view('HR/edit_educationlevel', ['educationlevel' => $educationlevel]);
    }
    function updateeducationlevel(Request $request)
    {

        $EducationLevelID = $request->EducationLevelID;
        $EducationLevelName = $request->EducationLevelName;

        DB::update('update educationlevel set EducationLevelName = ? where EducationLevelID = ?', [$EducationLevelName, $EducationLevelID]);
        return redirect('educationlevels');
    }



    function stafftype()
    {
        $stafftype = DB::table('staff_type')->get();
        // dd($stafftype);
        return view('HR.stafftype', compact('stafftype'));
    }

    function addstafftype(Request $request)
    {
        $this->validate($request, [
            'stafftype' => 'required|max:30||unique:staff_type',
        ]);
        $stafftype = $request->stafftype;
        DB::table('staff_type')->insert([
            'StaffType' => $stafftype
        ]);
        return redirect()->back();
    }
    function deletestafftype($StaffTypeID)
    {
        DB::delete('delete from staff_type where StaffTypeID = ?', [$StaffTypeID]);
        return redirect()->back();
    }

    function editstafftype($StaffTypeID)
    {
        $staff = DB::select('select * from staff_type where StaffTypeID = ?', [$StaffTypeID]);

        return view('HR/edit_staff', compact('staff'));
    }

    function updatestafftype(Request $request)
    {

        $StaffTypeID = $request->StaffTypeID;
        $StaffType = $request->StaffType;

        DB::update('update staff_type set StaffType = ? where StaffTypeID = ?', [$StaffType, $StaffTypeID]);
        return redirect('stafftype');
    }

    function title()
    {
        $titles = DB::table('title')->get();

        return view('HR.title', compact('titles'));
    }
    function addtitle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30|unique:title',
        ]);
        $title = $request->title;
        DB::table('title')->insert([
            'Title' =>  $title
        ]);
        return redirect()->back();
    }
    function deletetitle($TitleID)
    {
        DB::delete('delete from title where TitleID = ?', [$TitleID]);
        return redirect()->back();
    }
    function edittitle($TitleID)
    {
        $title = DB::select('select * from title where TitleID = ?', [$TitleID]);

        return view('HR/edit_title', compact('title'));
    }

    function updatetitle(Request $request)
    {

        $TitleeID = $request->TitleID;
        $Title = $request->Title;

        DB::update('update title set Title = ? where TitleID = ?', [$Title, $TitleeID]);
        return redirect('title');
    }
    function showemployees(Request $request)
    {


        if ($request->ajax()) {
            $data = DB::table('employee')
                ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
                ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
                ->select('employee.EmployeeID', 'employee.Title', 'employee.FirstName', 'employee.MiddleName', 'employee.LastName', 'employee.StaffType', 'jobtitle.JobTitleName', 'department.DepartmentName')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<div class="dropdown">
        
                       <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-h text-secondary"></i>
                         </a>
                       <div class="dropdown-menu">
                       <a class="dropdown-item"  href ="employeedetail/' . $row->EmployeeID . '" class="btn btn-sm edit" title="Edit"><i class="fa fa-eye text-secondary"></i>&nbsp; View</a>
                           <a class="dropdown-item" href="editemployee/' . $row->EmployeeID . '" class="btn btn-sm edit" title="Edit"><i class="fa fa-pen text-secondary"></i>&nbsp; Edit</a>
                           <a class="dropdown-item" href ="#" onclick="delete_employee(' . $row->EmployeeID . ')" class="btn btn-sm edit" title="Edit" id="sa-params">
                            <i class="fa fa-trash text-secondary"></i>&nbsp; Delete</a>
                          
                       </div>
                   </div>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('HR.employee');
    }



    function employeeform()
    {
        $educationlevel = DB::table('educationlevel')->get();
        $department = DB::table('department')->get();
        $stafftype = DB::table('staff_type')->get();
        $title = DB::table('title')->get();
        $jobtitle = DB::table('jobtitle')->get();
        return view('HR.addemployee', compact('educationlevel', 'department', 'stafftype', 'title', 'jobtitle'));
    }


    function addemployee(Request $request)
    {
       
        $this->validate(
            $request,
            [
                'CNIC' => 'required|max:30||unique:employee',
                'Email' =>'required|unique:employee'
            ],
            [
                'CNIC.unique' => 'This CNIC already exists ',
            ]
        );
        // dd($request);

        $data['IsSupervisor'] = $request->IsSupervisor;
        $data['Title'] = $request->Title;

        $data['StaffType'] = $request->StaffType;
        $data['FirstName'] = $request->FirstName;
        $data['MiddleName'] = $request->MiddleName;
        $data['LastName'] = $request->LastName;
        $data['CNIC'] = $request->CNIC;
        $data['DateOfBirth'] = $request->DateOfBirth;
        $data['Gender'] = $request->Gender;
        $data['Email'] = $request->Email;
        $data['Nationality'] = $request->Nationality;
        $data['HomePhone'] = $request->HomePhone;
        $data['MobileNo'] = $request->MobileNo;
        $data['FullAddress'] = $request->FullAddress;
        $data['EducationLevel'] = $request->EducationLevel;
        $data['LastDegree'] = $request->LastDegree;
        $data['MaritalStatus'] = $request->MaritalStatus;

        $data['SpouseName'] = $request->SpouseName;
        $data['SpouseEmployer'] = $request->SpouseEmployer;
        $data['SpouseWorkPhone'] = $request->SpouseWorkPhone;
        $data['VisaIssueDate'] = ($request->VisaIssueDate == null) ? null :  date("Y-m-d", strtotime($request->VisaIssueDate));
        $data['SpouseEmployer'] = $request->SpouseEmployer;
        $data['VisaExpiryDate'] = ($request->VisaExpiryDate == null) ? null :  date("Y-m-d", strtotime($request->VisaExpiryDate));
        $data['PassportNo'] = $request->PassportNo;
        $data['PassportExpiry'] = ($request->PassportExpiry == null) ? null :  date("Y-m-d", strtotime($request->PassportExpiry));

        $data['NextofKinName'] = $request->NextofKinName;
        $data['NextofKinAddress'] = $request->NextofKinAddress;
        $data['NextofKinPhone'] = $request->NextofKinPhone;
        $data['NextofKinRelationship'] = $request->NextofKinRelationship;
        $data['BankName'] = $request->BankName;
        $data['BankBranch'] = $request->BankBranch;
        $data['AccountNo'] = $request->AccountNo;
        $data['JobTitleID'] = $request->JobTitleID;
        $data['DepartmentID'] = $request->DepartmentID;
        $data['SupervisorID'] = $request->SupervisorID;
        $data['WorkLocation'] = $request->WorkLocation;
        $data['EmailOffical'] = $request->EmailOffical;
        $data['WorkLocation'] = $request->WorkLocation;
        $data['WorkPhone'] = $request->WorkPhone;
        $data['JobLeavingDate'] = ($request->JobLeavingDate == null) ? null :  date("Y-m-d", strtotime($request->JobLeavingDate));
        $data['JobLeavingReson'] = $request->JobLeavingReson;

        $data['Password'] = $request->Password;




        if ($request->hasFile('Uploadpicture')) {




            if ($request->hasFile('Uploadpicture')) {
                $file = $request->file('Uploadpicture');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/employee_pictures';
                $storage = $file->move($destinationPath, $fileName);

                $data['Picture'] = $fileName;
            }

            DB::table('employee')->insert($data);

            return redirect('/employee')->with('error', 'Employee Added Successfully')->with('class', 'success');
        }

        function editemployee($EmployeeID)
        {
            $educationlevel = DB::table('educationlevel')->get();
            $department = DB::table('department')->get();
            $stafftype = DB::table('staff_type')->get();
            $title = DB::table('title')->get();
            $jobtitle = DB::table('jobtitle')->get();

            $employee =  DB::table('employee')->where('EmployeeID', $EmployeeID)->get();

            return view('HR.editemployee', compact('employee', 'educationlevel', 'department', 'stafftype', 'title', 'jobtitle'));
        }

        function updateemploye(Request $request)
        {

            if ($request->hasFile('newpicture')) {
                $file = $request->file('newpicture');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/employee_pictures';
                $storage = $file->move($destinationPath, $fileName);
            } else {
                $filename = $request->oldpicture;
            }

            $data = array(
                'IsSupervisor' => $request->IsSupervisor,
                'Title' => $request->Title,
                'StaffType' => $request->StaffType,
                'FirstName' => $request->FirstName,
                'MiddleName' => $request->MiddleName,
                'LastName' => $request->LastName,
                'CNIC' => $request->CNIC,
                'DateOfBirth' => $request->DateOfBirth,
                'Gender' => $request->Gender,
                'Email' => $request->Email,
                'Nationality' => $request->Nationality,
                'MobileNo' => $request->MobileNo,
                'HomePhone' => $request->HomePhone,
                'FullAddress' => $request->FullAddress,
                'EducationLevel' => $request->EducationLevel,
                'LastDegree' => $request->LastDegree,
                'MaritalStatus' => $request->MaritalStatus,
                'SpouseName' => $request->SpouseName,
                'SpouseEmployer' => $request->SpouseEmployer,
                'SpouseWorkPhone' => $request->SpouseWorkPhone,
                'VisaIssueDate' => $request->VisaIssueDate,
                'SpouseEmployer' => $request->SpouseEmployer,
                'VisaExpiryDate' => $request->VisaExpiryDate,
                'PassportNo' => $request->PassportNo,
                'PassportExpiry' => $request->PassportExpiry,
                'NextofKinName' => $request->NextofKinName,
                'NextofKinAddress' => $request->NextofKinAddress,
                'NextofKinPhone' => $request->NextofKinPhone,
                'NextofKinRelationship' => $request->NextofKinRelationship,
                'JobTitleID' => $request->JobTitleID,
                'DepartmentID' => $request->DepartmentID,
                'SupervisorID' => $request->SupervisorID,
                'WorkLocation' => $request->WorkLocation,
                'EmailOffical' => $request->EmailOffical,
                'BankName' => $request->BankName,
                'BankBranch' => $request->BankBranch,
                'AccountNo' => $request->AccountNo,
                'WorkLocation' => $request->WorkLocation,
                'WorkPhone' => $request->WorkPhone,
                'eDate' => $request->StartDate,
                'Picture' => $fileName,
                'Password' => $request->Password,

            );



            $id = DB::table('employee')->where('EmployeeID', $request->EmployeeID)->update($data);


            return redirect('/employee')->with('error', 'Employee Updated Successfully')->with('class', 'success');
        }
        function deletemployee($EmployeeID)
        {

            return view('HR.employee');
        }
    }
    function editemployee($EmployeeID)
    {
        $educationlevel = DB::table('educationlevel')->get();
        $department = DB::table('department')->get();
        $stafftype = DB::table('staff_type')->get();
        $title = DB::table('title')->get();
        $jobtitle = DB::table('jobtitle')->get();

        $employee =  DB::table('employee')->where('EmployeeID', $EmployeeID)->get();

        return view('HR.editemployee', compact('employee', 'educationlevel', 'department', 'stafftype', 'title', 'jobtitle'));
    }

    function updateemployee(Request $request)
    {

        $fetch_email = DB::table('employee')->where('EmployeeID' , $request->EmployeeID)->get('Email');
      
        
        
        $request->validate([
            'Email' => Rule::unique('employee')->where(fn ($query) => $query->where('Email','!=',$fetch_email[0]->Email))


            
        ]);

        if ($request->hasFile('newpicture')) {
            $file = $request->file('newpicture');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_pictures';
            $storage = $file->move($destinationPath, $fileName);
        } else {
            $fileName = $request->oldpicture;
        }

        $data = array(
            'IsSupervisor' => $request->IsSupervisor,
            'Title' => $request->Title,
            'StaffType' => $request->StaffType,
            'FirstName' => $request->FirstName,
            'MiddleName' => $request->MiddleName,
            'LastName' => $request->LastName,
            'CNIC' => $request->CNIC,
            'DateOfBirth' => $request->DateOfBirth,
            'Gender' => $request->Gender,
            'Email' => $request->Email,
            'Nationality' => $request->Nationality,
            'MobileNo' => $request->MobileNo,
            'HomePhone' => $request->HomePhone,
            'FullAddress' => $request->FullAddress,
            'EducationLevel' => $request->EducationLevel,
            'LastDegree' => $request->LastDegree,
            'MaritalStatus' => $request->MaritalStatus,
            'SpouseName' => $request->SpouseName,
            'SpouseEmployer' => $request->SpouseEmployer,
            'SpouseWorkPhone' => $request->SpouseWorkPhone,
            'VisaIssueDate' => $request->VisaIssueDate,
            'SpouseEmployer' => $request->SpouseEmployer,
            'VisaExpiryDate' => $request->VisaExpiryDate,
            'PassportNo' => $request->PassportNo,
            'PassportExpiry' => $request->PassportExpiry,
            'NextofKinName' => $request->NextofKinName,
            'NextofKinAddress' => $request->NextofKinAddress,
            'NextofKinPhone' => $request->NextofKinPhone,
            'NextofKinRelationship' => $request->NextofKinRelationship,
            'JobTitleID' => $request->JobTitleID,
            'DepartmentID' => $request->DepartmentID,
            'SupervisorID' => $request->SupervisorID,
            'WorkLocation' => $request->WorkLocation,
            'EmailOffical' => $request->EmailOffical,
            'WorkLocation' => $request->WorkLocation,
            'WorkPhone' => $request->WorkPhone,
            'eDate' => $request->StartDate,
            'Picture' => $fileName,
            'Password' => $request->Password,

        );



        $id = DB::table('employee')->where('EmployeeID', $request->EmployeeID)->update($data);


        return redirect('/employee')->with('error', 'Employee Updated Successfully')->with('class', 'success');
    }

    function deletemployee($EmployeeID)
    {

        DB::delete('delete from employee where EmployeeID = ?', [$EmployeeID]);
        return view('Hr.employee');
    }

    function view_employee($EmployeeID)
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', $EmployeeID)
            ->get();
        // dd($employee);
        // $employee = DB::select('select * from employee where EmployeeID = ?',[$EmployeeID]);    
        return view('HR.view_employ', compact('employee'));
    }

    public function EmployeeDocuments()
    {

        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', session::get('EmployeeID'))
            ->get();
        $documents = DB::table('documents')->where('EmployeeID', session::get('EmployeeID'))->get();

        return view('employe_section.employeedocuments', compact('employee', 'documents'));
    }



    public function Deletedocuments($Documentid)
    {
        DB::delete('delete from documents where DocumentID = ?', [$Documentid]);
        return redirect()->back()->with('error', 'Document Deleted successfully')->with('class', 'danger');;
    }

    public function Employeeleave()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', session::get('EmployeeID'))
            ->get();
        // $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();
        $leaves = DB::table('leave')->where('EmployeeID', session::get('EmployeeID'))->get();

        return view('employe_section.employeeleave', compact('employee', 'leaves'));
    }
    public function EmployeeLeaveEdit($id)
    {

        $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();

        $leave = DB::table('leave')->where('LeaveID', $id)->get();

        return view('employe_section.employeeleaveedit', compact('leave', 'employee'));
    }
    public function EmployeeLeaveSave(request $request)
    {

        $EmployeeID = session::get('EmployeeID');
        $this->validate(
            $request,
            [

                'FromDate' => 'required | date_format:d/m/Y',
                'ToDate' => 'required | date_format:d/m/Y',
                'Reason' => 'required',


                // 'email'=>'required | email|unique:user',
            ],
            [
                'FromDate.required' => 'Leave Start Date is required',
                'FromDate.date_format' => 'Leave start date does not match the format d/m/Y.',


                'ToDate.required' => 'Leave End Date is required',
                'ToDate.date_format' => 'Leave end date does not match the format d/m/Y.',
                'Reason.required' => 'Reason is required',



            ]
        );


        $data = array(

            'EmployeeID' => $EmployeeID,
            'FromDate' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('FromDate')))),
            'ToDate' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('ToDate')))),
            'Reason' => $request->Reason,

        );


        $id = DB::table('leave')->insertGetId($data);

        return redirect()->back()->with('error', 'Leave Saved Successfully')->with('class', 'success');
    }

    public function EmployeeLeaveUpdate(Request $request)
    {
        $data = array(
            'FromDate' => $request->FromDate,
            'ToDate' => $request->ToDate,
            'Reason' => $request->Reason
        );

        $LeaveID = $request->LeaveID;


        $id = DB::table('leave')->where('LeaveID', $LeaveID)->update($data);
        return redirect('/employeeleave')->with('error', 'Leave Updated Successfully')->with('class', 'success');
    }
    public function Deleteleave($Leaveid)
    {
        // DB::delete('delete from leave where LeaveID = ?',['24']);
        $id = DB::table('leave')->where('LeaveID', $Leaveid)->delete();
        return redirect()->back()->with('error', 'Leave Deleted successfully')->with('class', 'danger');;
    }

    public function Employeeloan()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', session::get('EmployeeID'))
            ->get();
        $loan = DB::table('loan')->where('EmployeeID', session::get('EmployeeID'))->get();
        return view('employe_section.loan', compact('employee', 'loan'));
    }
    public function Employeeloansave(Request $request)
    {

        $this->validate(
            $request,
            [

                'RequestDate' => 'required | date_format:d/m/Y',
                'StartDate' => 'required | date_format:d/m/Y',
                'Amount' =>  'required',
                'Remarks' => 'required',
            ],
            [
                'StartDate.required' => 'Loan Start Date is required',
                'StartDate.date_format' => 'Loan start date does not match the format d/m/Y.',
                'RequestDate.required' => 'Loan End Date is required',
                'RequestDate.date_format' => 'Loan end date does not match the format d/m/Y.',
                'Remarks.required' => 'Reason is required',
                'Amonut.required' => 'Amount is required',
            ]
        );


        $EmployeeID = $request->employeeid;
        $NoOfInstallment = $request->NoOfInstallment;

        //  $date = $request->input('StartDate');

        $date = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('StartDate'))));





        $data = array(
            'EmployeeID' => $EmployeeID,
            'RequestDate' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('RequestDate')))),
            'Amount' => $request->Amount,
            'Remarks' => $request->Remarks
        );



        $loanid = DB::table('loan')->insertGetId($data);

        for ($i = 0; $i < $NoOfInstallment; $i++) {

            $deduction = array(
                'LoanID' => $loanid,
                'EmployeeID' => $EmployeeID,
                'Amount' => $request->Installment,
                'LoanDeductionDate' => $date,
            );
            $date = date('Y-m-d', strtotime($date . ' + 1 months'));

            $loandeduction = DB::table('loan_deduction')->insertGetId($deduction);
        }

        return redirect()->back()->with('error', 'Loan Submitted Successfully')->with('class', 'success');;
    }

    public function loandelete($id)
    {
        $idd = DB::table('loan')->where('LoanID', $id)->delete();
        $loandeduction =  DB::table('loan_deduction')->where('LoanID', $id)->delete();

        return redirect()->back()->with('error', 'Loan Deleted Successfully')->with('class', 'danger');
    }
    function employeesalary()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')->where('EmployeeID', '=', session::get('EmployeeID'))
            ->get();

        $employeesalary = DB::table('emp_salary')->where('EmployeeID', '=', session::get('EmployeeID'))->get();


        return view('employe_section.employee_salary', compact('employee', 'employeesalary'));
    }

    function EmployeeAttendance()
    {

        $attendance = DB::table('attendance')->where('EmployeeID', session::get('EmployeeID'))->get();
        $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();
        return view('employe_section.employee_attendence', compact('attendance', 'employee'));
    }

    function Inattendence()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->where('EmployeeID', '=', session::get('EmployeeID'))
            ->get();

        $name = $employee[0]->FirstName . ' ' . $employee[0]->LastName;
        $attendence = array(
            'EmployeeID' => $employee[0]->EmployeeID,
            'EmployeeName' =>  $name,
            'Department'  => $employee[0]->DepartmentName,
            'Status' => "Present"

        );


        DB::table('attendance')->insert($attendence);
        return redirect()->back()->with('error', 'Attendence Marked Successfully')->with('class', 'sucess');;
    }

    function Outattendence()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')->select()
            ->where('EmployeeID', '=', session::get('EmployeeID'))
            ->latest()->get();

        dd($employee);
    }

    function deletemployeedata($EmployeeID)
    {
        DB::delete('delete from employee where EmployeeID = ?', [$EmployeeID]);
        return redirect()->back()->with('error', 'Employee Deleted Successfully')->with('class', 'danger');
    }
}
