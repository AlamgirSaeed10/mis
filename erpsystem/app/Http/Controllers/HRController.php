<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Carbon;

class HRController extends Controller
{

    public function employeeleaves($employeeid)
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', $employeeid)
            ->get();
        $leaves = DB::table('leave')->where('EmployeeID', $employeeid)->get();
        $leaveStatus = DB::table('leave_status')->get();
        return view('HR.employeeleaves', compact('leaves', 'employee', 'leaveStatus'));
    }
    public function letter_issue_save(request $request)
    {



        $data = array(

            'EmployeeID' => $request->input('EmployeeID'),
            'LetterID' => $request->input('LetterID'),
            'Title' => $request->input('Title'),
            'Content' => $request->input('Content'),

        );
        // dd($data);
        $letter = DB::table('issue_letter')->insert($data);
        if ($letter) {
            return redirect('/employeeletter/' . $request->input('EmployeeID'))->with('error', 'Letter Issued Successfully')->with('class', 'success');
        } else {
            return redirect()->back()->with('error', 'Data not inserted')->with('class', 'Dangerous');
        }
    }

    public function letter_issue_preview(request $request)
    {
        $letter = DB::table('letter')->where('LetterID', $request->letter_id)->get();
        $issue_letter = DB::table('issue_letter')->get();
        // dd($issue_letter);
        $employeeid = $request->employeeid;
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', $employeeid)->get();
        // dd($employee);
        // $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();
        return view('HR.letter_issue_preview', compact('letter', 'issue_letter', 'employee'));
    }
    function employeeletter($employeeid)
    {
        $letter  =  DB::table('letter')->get();
        $issue_letter = DB::table('issue_letter')->where('EmployeeID', $employeeid)->get();
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', $employeeid)
            ->get();
            
        return view('Hr.employeeletter' , compact('letter' , 'issue_letter' , 'employee'));
            
    }
    function letterissued()
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=',  session::get('EmployeeID'))
            ->get();
        $issue_letter = DB::table('issue_letter')->join('letter', 'issue_letter.LetterID', 'letter.LetterID')->where('EmployeeID', session::get('EmployeeID'))->get();

        return view('employe_section.issuedletters', compact('issue_letter', 'employee'));
    }
    public function destroy_issue_letter($IssueLetterID)
    {
        DB::delete('delete from `issue_letter` where IssueLetterID = ?', [$IssueLetterID]);
        return redirect()->back()->with('error', ' Deleted Successfully')->with('class', 'danger');
    }

    public function Employeeloan($employeeid)
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', $employeeid)
            ->get();
        $loan = DB::table('loan')->where('EmployeeID', $employeeid)->get();
        return view('HR.employeeloan', compact('employee', 'loan'));
    }
    function documents($employeeid)
    {
        $documents = DB::table('documents')->where('EmployeeID', '=', $employeeid)->get();
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->where('EmployeeID', '=', $employeeid)
            ->get();

        return view('HR.documents', compact('documents', 'employee'));
    }
    public function EmployeeDocumentsUpload(Request $request)
    {


        $employeeid = $request->EmployeeID;

        if ($request->file('UploadFile') != null) {

            $this->validate($request, [


                'FileName' => 'required',
                'UploadFile' => 'required|mimes:jpeg,png,jpg,gif,doc,docx,bmp,pdf|max:20000',

            ]);

            $file = $request->file('UploadFile');
            $input['filename'] = time() . '.' . $file->extension();

            $destinationPath = public_path('/documents');

            $file->move($destinationPath, $input['filename']);

            $data = array(
                'EmployeeID' =>   $employeeid,
                'FileName' => $request->input('FileName'),
                'File' => $input['filename'],
                // 'mimeType'=>substr($file->getMimeType(), 0, 5)
            );
        }


        $id = DB::table('documents')->insertGetId($data);




        return redirect()->back()->with('error', 'Document uploaded successfully')->with('class', 'success');
    }

    public function Deletedocuments($Documentid)
    {
        DB::delete('delete from documents where DocumentID = ?', [$Documentid]);
        return redirect()->back()->with('error', 'Document Deleted successfully')->with('class', 'danger');;
    }

    public function allowances()
    {
        $allowance = DB::table('allowance_list')->get();

        return view('HR.allownce', compact('allowance'));
    }
    function add_allowance(Request $request)
    {
        $this->validate($request, [
            'AllowanceTitle' => 'required|max:30|unique:allowance_list',

        ]);

        $AllowanceTitle = $request->AllowanceTitle;
        $AllowanceCategory = $request->AllowanceCategory;
        DB::table('allowance_list')->insert([
            'AllowanceTitle' => $AllowanceTitle,
            'AllowanceCategory' => $AllowanceCategory,

        ]);
        return redirect()->back()->with('error', ' Submit Successfully')->with('class', 'success');
    }

    public function Deleteallowance($AllowanceListID)
    {
        DB::delete('delete from allowance_list where AllowanceListID  = ?', [$AllowanceListID]);
        return redirect()->back()->with('error', 'Allowance Deleted successfully')->with('class', 'danger');
    }
    function edit_allowance($AllowanceListID)
    {
        $AllowanceList = DB::select('select * from allowance_list where AllowanceListID = ?', [$AllowanceListID]);
        //  dd($AllowanceList);
        return view('HR/edit_allowance', ['AllowanceList' => $AllowanceList]);
    }

    public function update_allowanceses(Request $request)
    {
        $AllowanceID = $request->input('AllowanceID');
        $AllowanceTitle = $request->input('AllowanceTitle');
        DB::update('update `allowance_list` set AllowanceTitle= ? where AllowanceListID = ?', [$AllowanceTitle,$AllowanceID]);
        return redirect('allowance')->with('primary', ' Updates Successfully')->with('class', 'primary');
    }

    function employeesalary($EmployeeID)
    {
        $employee = DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')->where('EmployeeID', '=', $EmployeeID)
            ->get();

        $employeesalary = DB::table('emp_salary')->where('EmployeeID', '=', $EmployeeID)->get();
        $allownces = DB::table('allowance_list')->get();
        return view('HR/salary', compact('employee', 'employeesalary', 'allownces'));
    }
    function addemployeesalary(Request $request)
    {
        $category=DB::table('allowance_list')->where('Allowancetitle', '=',  $request->allowance)->get('AllowanceCategory');
        
        $salary = array(
            'EmployeeID' => $request->EmployeeID,
            'Basic' =>  $request->Salary,
            'Allowncetitle' => $request->allowance ,
            'AllowanceCategory' => $category[0]->AllowanceCategory 
        );

       

        DB::table('emp_salary')->insert($salary);

        return redirect()->back()->with('error', 'Salary Saved Successfully')->with('class', 'success');
    }
    public function Deletesalary($EmployeeSalaryID)
    {
        DB::delete('delete from emp_salary where EmployeeSalaryID  = ?', [$EmployeeSalaryID]);
        return redirect()->back()->with('error', 'Salary Deleted successfully')->with('class', 'danger');;
    }
    function edit_salary_empl($EmployeeSalaryID)
    {
        $allownces = DB::table('allowance_list')->get();
        $salary_emplo = DB::select('select * from emp_salary where EmployeeSalaryID   = ?', [$EmployeeSalaryID]);
       
        $employeesalary = DB::table('emp_salary')->where('EmployeeID', '=', $salary_emplo[0]->EmployeeID)->get();

        return view('HR/edit_emply_salary', ['salary_emplo' => $salary_emplo, 'allownces' => $allownces , 'employeesalary' => $employeesalary]);
    }

    public function update_salary_empl(Request $request)
    {

        $data = array(
            'Basic' =>  $request->Salary,
            'Allowncetitle' => $request->allowance,
        );
        $id = DB::table('emp_salary')->where('EmployeeSalaryID', $request->EmployeeSalaryID)->update($data);
        // dd($request->EmployeeSalaryID);
        return redirect('/salary/' . $request->EmployeeID)->with('primary', ' Updated Successfully')->with('class', 'primary');
    }
    function departmentreports()
    {
        $department = DB::table('department')->get();
        $all_reports = DB::table('employee')
            ->join('report', 'employee.EmployeeID', 'report.EmployeeID')
            ->select('*')->orderBy('rePort.ReportID', 'DESC')->get();

        return view('HR.employeereports', compact('department', 'all_reports'));
    }
    function departmentreports_fetch(Request $request)
    {
        // dd($request->all());
        $reports = DB::table('v_employees_report')
            ->whereDate('eDate', '=', $request->date)
            ->where('DepartmentID', '=', $request->dep_id)
            ->get();
        $department = DB::table('department')->where('DepartmentID', '=', $request->dep_id)->get();

        return view('HR.eReportsByDate', compact('reports', 'department'));
    }

    function departmentreports_fetch_between(Request $request)
    {
        // dd($request);
        $reports = DB::table('v_employees_report')
            ->whereBetween('eDate', [$request->Fromdate,$request->Todate])
            ->where('DepartmentID', '=', $request->dep_id)
            ->get();
        // dd($reports);
        $department = DB::table('department')->where('DepartmentID', '=', $request->dep_id)->get();

        return view('HR.eReportsByDate', compact('reports', 'department'));
    }

    function singlereport($reportid)
    {
        $report = DB::table('employee')
            ->join('report', 'employee.EmployeeID', 'report.EmployeeID')
            ->select('*')->where('report.ReportID', '=', $reportid)
            ->select('employee.FirstName', 'employee.MiddleName', 'employee.LastName', 'report.*')
            ->get();

        return response()->json([
            'status' => 200,
            'report' => $report
        ]);
    }

    function aprove_leave(Request $request)
    {
        $mytime = Carbon::now();
        // dd($mytime);
        $data = array(
            'HRStatus' => $request->status,
            'HRRemarks' => $request->reason,
            'HRStatusDate' => $mytime,
        );
        $id = DB::table('leave')->where('LeaveID', $request->LeaveID)->update($data);
        return back()->with('error', 'Leave Updated successfully')->with('class', 'success');
    }

    function EmployeeLeaveType()
    {
        $Leavetype= DB::table('leavetype')->get();
        // dd($Leavetype);
        return view('HR.leave_type',compact('Leavetype'));
    }

    public function EmployeeLeaveTypeDelete($LeaveTypeID)
    {
        DB::delete('delete from `leavetype` where LeaveTypeID = ?', [$LeaveTypeID]);
        return redirect()->back()->with('error', ' Deleted Successfully')->with('class', 'danger');
    }

    function LeaveTypeadd(Request $request)
    {
        $this->validate($request, [
            'LeaveTypeTitle' => 'required|max:30|unique:leavetype',

        ]);

        $LeaveTypeTitle = $request->LeaveTypeTitle;
        DB::table('leavetype')->insert([
            'LeaveTypeTitle' => $LeaveTypeTitle,

        ]);
        return redirect()->back()->with('error', ' Submit Successfully')->with('class', 'success');
    }

    function LeaveTypeedit($LeaveTypeID)
    {
        $LeaveTypeedit = DB::select('select * from leavetype where LeaveTypeID = ?', [$LeaveTypeID]);
        //  dd($LeaveTypeID);
        return view('HR/leave_type_edit', ['LeaveTypeedit' => $LeaveTypeedit]);
    }

    public function LeaveTypeupdate(Request $request)
    {

        $data = array(
            'LeaveTypeTitle' =>  $request->LeaveTypeTitle
        );
        $id = DB::table('leavetype')->where('LeaveTypeID', $request->LeaveTypeID)->update($data);
        // dd($request->LeaveTypeID);
        return redirect('LeaveType')->with('primary', ' Updated Successfully')->with('class', 'primary');
    }

    
    public function Item()
    {
        $item= DB::table('item')->get();
        return view('HR.item',compact('item'));
    }

    public function Voucher()
    {
        return view('HR.voucher_new');
    }

    public function Journal_Voucher()
    {
        return view('HR.journal_voucher');
    }
}