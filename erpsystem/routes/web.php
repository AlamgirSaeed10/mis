<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\WorkController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\chartOfAccount;
use App\Http\Controllers\Supplier;
use App\Http\Controllers\Customer;
use App\Http\Controllers\AddUser;
use App\Http\Controllers\Profile;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class,'index']);

//departments
Route::get('/departments',[EmployeeController::class,'show_departments'])->name('departments');
Route::get('/deletedepartment/{DepartmentID}',[EmployeeController::class,'deletedepartment']);
Route::post('/adddepartments',[EmployeeController::class,'add_department'])->name('adddepartments');
Route::post('/updatedepartment',[EmployeeController::class,'updatedepartment'])->name('updatedepartment');
Route::get('/editdepartment/{DepartmentID}',[EmployeeController::class,'editdepartment']);
//educationlevels
Route::get('/educationlevels',[EmployeeController::class,'educationlevels'])->name('educationlevels');
Route::post('/addeducationlevels',[EmployeeController::class,'add_educationlevels'])->name('addeducationlevels');
Route::get('/deleteeducationlevel/{EducationLevelID}',[EmployeeController::class,'deleteeducationlevel']);
Route::post('/updateeducationlevel',[EmployeeController::class,'updateeducationlevel'])->name('updateeducationlevel');
Route::get('/editeducationlevel/{EducationLevelID}',[EmployeeController::class,'editeducationlevel']);

//HR documentsupload
Route::get('/documents/{EmployeeID}',[HRController::class,'documents'])->name('documents');
Route::post('employeedocumentsupload',[HRController::class,'EmployeeDocumentsUpload'])->name('EmployeeDocumentUpload');
Route::get('/delete_emp_documents/{id}',[HRController::class,'Deletedocuments']);


//hr lOAN

Route::get('/employeeloan/{EmployeeID}',[HRController::class,'employeeloan']);

//hr Letter

Route::get('/employeeletter/{EmployeeID}',[HRController::class,'employeeletter']);
Route::post('letter_issue_preview',[HRController::class,'letter_issue_preview'])->name('letter_issue_preview');
Route::post('letter_issue_save',[HRController::class,'letter_issue_save'])->name('letter_issue_save');
Route::get('/delete_issue_letter/{id}',[HRController::class,'destroy_issue_letter']);

//hr leave

Route::get('employeeleaves/{id}',[HRController::class,'employeeleaves']);

//issuedletter

Route::get('/issuedletter',[HRController::class,'letterissued'])->name('issuedletter');


///
//stafftype
Route::get('/stafftype',[EmployeeController::class,'stafftype'])->name('stafftype');
Route::post('/addstafftype',[EmployeeController::class,'addstafftype'])->name('addstafftype');
Route::get('/deletestafftype/{StaffTypeID}',[EmployeeController::class,'deletestafftype']);
Route::post('/updatestafftype',[EmployeeController::class,'updatestafftype'])->name('updatestafftype');
Route::get('/editstafftype/{StaffTypeID}',[EmployeeController::class,'editstafftype']);
//Title
Route::get('/title',[EmployeeController::class,'title'])->name('title');
Route::post('/addtitle',[EmployeeController::class,'addtitle'])->name('addtitle');
Route::get('/deletetitle/{TitleID}',[EmployeeController::class,'deletetitle']);
Route::post('/updatetitle',[EmployeeController::class,'updatetitle'])->name('updatetitle');
Route::get('/edittitle/{TitleID}',[EmployeeController::class,'edittitle']);
//employee
Route::get('/employee',[EmployeeController::class,'showemployees'])->name('showemployee');
Route::get('/employeeform',[EmployeeController::class,'employeeform'])->name('employeeform');
Route::post('/addemployee',[EmployeeController::class,'addemployee'])->name('addemployee');
Route::get('/editemployee/{EmployeeID}',[EmployeeController::class,'editemployee']);
Route::post('/updateemployee',[EmployeeController::class,'updateemployee'])->name('updateemployee');
Route::get('/deleteemployee/{EmployeeID}',[EmployeeController::class,'deletemployee']);
Route::get('/deletemployeedata/{EmployeeID}',[EmployeeController::class,'deletemployeedata']);
Route::get('/employeedetail/{EmployeeID}',[EmployeeController::class,'view_employee']);


Route::get('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/check', [LoginController::class, 'UserVerify'])->name('auth.check');
Route::get('/admin_dashboard', [LoginController::class, 'admin_dashboard'])->name('auth.admin_dashboard');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Route::get('/', function () {
//     return view('check');
// });

Route::get('/Job_Title',[WorkController::class,'job']);
Route::get('/edit_job/{id}',[WorkController::class,'edit_job']);
Route::post('updatejob/{id}',[WorkController::class,'update_job']);
Route::get('delete_job/{id}',[WorkController::class,'destroy_job'])->name('delete_job');
Route::post('/Job_Title',[WorkController::class,'add_job'])->name('Job_Title');

Route::get('/Leave_Status',[WorkController::class,'leave_status']);
Route::get('/edit_status/{id}',[WorkController::class,'edit_leave_status']);
Route::post('updatestatus/{id}',[WorkController::class,'update_leave_status']);
Route::get('/delete_leave_status/{id}',[WorkController::class,'destroy_leave_status']);
Route::post('/leave_status',[WorkController::class,'add_leave_status'])->name('leave_status');


Route::get('/edit_leave/{id}',[WorkController::class,'edit_leave']);
Route::post('updateleave/{id}',[WorkController::class,'update_leave']);
Route::get('/delete_leave/{id}',[WorkController::class,'destroy_leave']);
Route::post('/leave',[WorkController::class,'add_leave'])->name('leave');

Route::get('/letter',[WorkController::class,'view_letter']);
Route::get('/add_letter',[WorkController::class,'addletter']);
Route::get('/edit_letter/{id}',[WorkController::class,'edit_letter']);
Route::post('updateletter/{id}',[WorkController::class,'update_letter']);
Route::get('/delete_letter/{id}',[WorkController::class,'destroy_letter']);
Route::post('/letter',[WorkController::class,'add_letter'])->name('letter');



Route::get('allowance',[HRController::class,'allowances'])->name('allownces');
Route::get('/allowance_delete/{id}',[HRController::class,'Deleteallowance']);
Route::post('/allowance',[HRController::class,'add_allowance'])->name('allowance');
Route::get('/editallowance/{id}',[HRController::class,'edit_allowance']);
Route::post('/update_allowance',[HRController::class,'update_allowanceses'])->name('update_allowance');

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/customer', 'customer')->name('customer');


//EmployeeSide
Route::get('/Report',[WorkController::class,'report']);
Route::post('/Report',[WorkController::class,'add_report'])->name('Report');
Route::get('/edit_report/{id}',[WorkController::class,'edit_report']);
Route::post('updatereport/{id}',[WorkController::class,'update_report']);
Route::get('/delete_report/{id}',[WorkController::class,'destroy_report']);
// employ section
Route::view('/employ_dashboard', 'employe_section/dashboard')->name('employ_dashboard');
Route::get('employeeprofile',[WorkController::class,'employeeprofile'])->name('employeeprofile');

//Employee Documents
Route::get('/employeedocuments',[EmployeeController::class,'EmployeeDocuments'])->name('employeedocuments');

//Employee Attendence
Route::get('EmployeeAttendance',[EmployeeController::class,'EmployeeAttendance'])->name('EmployeeAttendance');
Route::post('Inattendence',[EmployeeController::class,'Inattendence'])->name('Inattendence');
Route::post('Outattendence',[EmployeeController::class,'Outattendence'])->name('Outattendence');

//Employeeleave

Route::get('/employeeleave',[EmployeeController::class,'Employeeleave'])->name('employeeleave');
Route::post('/employeeleavesave',[EmployeeController::class,'EmployeeLeaveSave'])->name('empLeaveSave');
Route::get('/empleaveedit/{id}',[EmployeeController::class,'EmployeeLeaveEdit']);
Route::post('/employeeleaveupdate',[EmployeeController::class,'EmployeeLeaveUpdate'])->name('empLeaveUpdate');
Route::get('/delete_emp_leave/{id}',[EmployeeController::class,'Deleteleave']);

//Emoployee loan

Route::get('/employeeloan',[EmployeeController::class,'Employeeloan'])->name('Employeeloan');
Route::post('/employeeloansave',[EmployeeController::class,'Employeeloansave'])->name('EmployeeloanSave');
Route::get('/employeeloandelete/{id}',[EmployeeController::class,'loandelete'])->name('Loandelete');






Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::get('IssueLetter',[WorkController::class,'IssueLetter']);
Route::get('IssueLetter',[WorkController::class,'letter_issue_preview']);
Route::get('/edit_letter_issue/{id}',[WorkController::class,'edit_letter_issue']);
Route::post('updateletterissue/{id}',[WorkController::class,'update_letter_issue']);
Route::get('/issue_letter_print/{id}',[WorkController::class,'issue_letter_print']);




Route::get('employe_att',[WorkController::class,'emplo_att']);
Route::post('employe_att',[WorkController::class,'add_emplo'])->name('employe_att');

Route::get('EmployeeWarningLeter',[WorkController::class,'employeewarningletter']);

Route::get('salary/{id}',[HRController::class,'employeesalary']);
Route::post('salary',[HRController::class,'addemployeesalary'])->name('addemployeesalary');
Route::get('/delete_salary/{id}',[HRController::class,'Deletesalary']);
Route::get('/editemployesalary/{id}',[HRController::class,'edit_salary_empl']);
Route::post('/update_salary_employee',[HRController::class,'update_salary_empl'])->name('update_salary_employee');
//userside
Route::get('employeesalary',[EmployeeController::class,'employeesalary']);

// Route::group(['middleware'=>['AuthCheck']],function(){
    

    Route::view('/employ_dashboard', 'employe_section/dashboard')->name('employ_dashboard');



// !............Product Section......................!
Route::get('/product',[ProductController::class,'showproducts'])->name('showproducts');
Route::get('/productform',[ProductController::class,'productform'])->name('productform');
Route::post('/addproduct',[ProductController::class,'addproduct'])->name('addproduct_data');
Route::get('/editproduct/{ProductID}',[ProductController::class,'editproduct']);
Route::post('/updateproduct',[ProductController::class,'updateproduct'])->name('updateproduct');
Route::get('/deleteproduct/{ProductID}',[ProductController::class,'deletproduct']);
Route::get('/productedetail/{ProductID}',[ProductController::class,'view_product']);

//HR side
Route::get('/employeeleaves',[HRController::class,'employeeleaves'])->name('employeeleaves');


Route::post('/aprove_leave',[HRController::class,'aprove_leave'])->name('aprove_leave');
Route::get('employeeleaves/delete_leave/{LeaveID}',[HRController::class,'delete_leave']);

Route::get('/reports',[HRController::class,'departmentreports'])->name('departreports');
Route::post('/reports_fetch',[HRController::class,'departmentreports_fetch'])->name('departmentreports_fetch');
Route::post('/reports_fetch_between',[HRController::class,'departmentreports_fetch_between'])->name('departmentreports_fetch_between');

Route::get('/employeereport/{id}',[HRController::class,'singlereport']);


Route::get('/LeaveType',[HRController::class,'EmployeeLeaveType']);
Route::get('/LeaveTypeDelete/{LeaveTypeID}',[HRController::class,'EmployeeLeaveTypeDelete']);
Route::post('/LeaveTypeAdd',[HRController::class,'LeaveTypeadd'])->name('LeaveTypeAdd'); 
Route::get('/LeaveTypeEdit/{LeaveTypeID}',[HRController::class,'LeaveTypeedit']);
Route::post('/LeaveTypeUpdate',[HRController::class,'LeaveTypeupdate'])->name('LeaveTypeUpdate');


// ................!ProductInvoice Section!....................
//invoice
Route::get('/saleinvoice' , [WorkController::class, 'saleinvoice'])->name('saleinvoice');
//getitems in saleinvoice
Route::post('/getitems' , [WorkController::class, 'saleinvoiceitems']);

// ................!Service Invoice Section!....................
//Service invoice
Route::get('/serviceSaleInvoice' , [WorkController::class, 'ServiceSaleInvoice'])->name('serviceSaleInvoice');
//getitems in saleinvoice
Route::post('/getServiceItems' , [WorkController::class, 'ServiceSaleInvoiceItems']);

Route::get('/PettyCash' , [WorkController::class, 'PettyCash'])->name('PettyCash');



// *********************************************** [ Alamgir ]***********************************************************




Route::get('addNewNotice', [NoticeBoardController::Class ,'addNewNotice']);
Route::get('datatable', [NoticeBoardController::Class ,'datatable']);
Route::get('viewAllNotices', [NoticeBoardController::Class ,'viewAllNotices']);
Route::get('getAllNotice/{id}', [NoticeBoardController::Class ,'getAllNotice']);
Route::post('UploadData', [NoticeBoardController::Class ,'saveNoticeInDB']);
// Route::post('logincheck', 'LoginController@logincheck');
// Route::get('logout', 'LoginController@logout');
// notification
Route::get('fetch_notifications', [DashboardController::Class,'fetch_notifications']);
Route::get('getNotification', [DashboardController::Class,'getNotification']);
Route::get('getRelatedNotice/{id}', [DashboardController::Class,'getRelatedNotice']);
Route::get('updateNoticeStatus/{id}', [DashboardController::Class,'updateNoticeStatus']);


// chart of account
Route::get('chartofaccount',[chartOfAccount::Class,'index']);
Route::post('SaveChartOfAccount',[chartOfAccount::Class,'StoreChartOfAccountID_L1']);
Route::post('SaveChartOfAccount_l2',[chartOfAccount::Class,'StoreChartOfAccountID_L2']);

Route::get('EditChartOfAccountID_L1/{ChartOfAccountID}', [chartOfAccount::Class,'EditChartOfAccountID_L1'])->name('EditChartOfAccountID_L1.show');
Route::get('UpdateChartOfAccountID_L1/{ChartOfAccountID}', [chartOfAccount::Class,'UpdateChartOfAccountID_L1']);
Route::get('DeleteChartOfAccountID/{ChartOfAccountID}',[chartOfAccount::Class,'DeleteChartOfAccountID']);




// Testing Ajax Request and storing in database using datalist
Route::get('test', [chartOfAccount::Class,'test']);
// ====================================END AJAX========================================



// ===================================Supplier module================================================= 

Route::get('supplierCreate', [Supplier::Class,'supplierCreate']);
Route::post('supplierInsert', [Supplier::Class,'supplierInsert']);
Route::get('supplierEdit/{SupplierID}', [Supplier::Class,'supplierEdit']);
Route::post('supplierUpdate', [Supplier::Class,'supplierUpdate']);
Route::get('supplierDelete/{SupplierID}',[Supplier::Class,'supplierDelete']);

// ===================================Customer module================================================= 

Route::get('customerCreate',[Customer::Class,'customerCreate']);
Route::post('customerInsert',[Customer::Class,'customerInsert']);
Route::get('customerEdit/{PartyID}', [Customer::Class,'customerEdit']);
Route::post('customerUpdate', [Customer::Class,'customerUpdate']);
Route::get('customerDelete/{PartyID}', [Customer::Class,'customerDelete']);

// ===================================Add User module================================================= 

Route::get('userCreate',[AddUser::Class,'userCreate']);
Route::post('userInsert', [AddUser::Class,'userInsert']);
Route::get('userEdit/{UserID}', [AddUser::Class,'userEdit']);
Route::post('userUpdate', [AddUser::Class,'userUpdate']);
Route::get('userDelete/{UserID}', [AddUser::Class,'userDelete']);

// =================================== User Profile ================================================= 

Route::get('userProfile', [Profile::Class,'userProfile']);
// Route::get('userProfileEdit/{UserID}', [Profile::Class,'userProfileEdit']);
Route::post('userProfileUpdate', [Profile::Class,'userProfileUpdate']);


Route::get('/Item',[HRController::class,'Item']);
Route::get('/Voucher',[HRController::class,'Voucher']);
Route::get('/JournalVoucher',[HRController::class,'Journal_Voucher']);