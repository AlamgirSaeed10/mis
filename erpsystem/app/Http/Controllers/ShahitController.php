<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ShahitController extends Controller
{
    public function studentform()
    {
        $courses=DB::table('shahit_courses')->get();

        return view('shahit.addstudents' , compact('courses'));
    }

    public function addstudent(Request $request)
    {
         if ($request->hasFile('StudentPicture')) {
           
            $file = $request->file('StudentPicture');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/studentpictures';
            $storage = $file->move($destinationPath, $fileName);

            $studentpicture = $fileName;
        }
        else
        {
            $studentpicture=Null; 
        }

        $data = array(
                        'StudentFullName' => $request->StudentFullName ,
                         'StudentFatherName' => $request->StudentFatherName ,
                         'StudentGender' => $request->StudentGender ,
                         'StudentDob' => $request->StudentDob,
                         'StudentMartialStatus' => $request->StudentMartialStatus ,
                         'StudentAddress' => $request->StudentAddress ,
                         'StudentPhone' => $request->StudentPhone ,
                         'StudentEmail' => $request->StudentEmail ,
                         'StudentPicture' => $studentpicture ,
                         'StudentGuardianName' => $request->GuardianName ,
                         'StudentGuardianPhone' => $request->GuardianPhone ,   
                         );

                $CourseID=$request->CourseID;
           $StudentID=DB::table('students')->insertGetId($data);

           $course = array(
            'CourseID' => $CourseID ,
             'StudentID' => $StudentID ,
             'CourseFee' => $request->CourseFee ,
             );
             DB::table('student_course')->insert($course);

             $qualification = array(
                 'StudentID' => $StudentID ,
                 'StudentQualification' => $request->StudentQualification ,
                 'Institute' => $request->Institute ,
                 'QualificationFrom' => $request->QualificationFrom ,
                 'QualificationTo' => $request->QualificationTo ,
                 'Result' => $request->Result ,
                 );
                 DB::table('student_qualifications')->insert($qualification);

                 $coursefee = array(
                    'CourseID' => $CourseID ,
                     'StudentID' => $StudentID ,
                     'CourseFeePaid' => $request->CourseFeePaid ,
                     'CourseFeeDate' => $request->CourseFeeDate
                     );
                     DB::table('student_coursefee')->insert($coursefee);


            return redirect('/students')->with('error', 'Student Added successfully')->with('class', 'success');;
    }
    function students()
    {
       $students=DB::table('students')->get();

        return view('shahit.students' , compact('students'));

    }
    public function editstudent($studentid)
    {
        $courses=DB::table('shahit_courses')->get();
        return view('shahit.editstudent' , compact('courses'));
    }
    function deletestudent($StudentID)
    {
        DB::delete('delete from `students` where StudentID = ?', [$StudentID]);
        return redirect()->back()->with('error', ' Deleted Successfully')->with('class', 'danger');
    }
    public function singlestudent($studentid)
    {
          $student =  DB::table('students')->join('student_course' , 'students.StudentID' ,  'student_course.StudentID')->join('student_coursefee' , 'students.StudentID' ,  'student_coursefee.StudentID')->join('shahit_courses' , 'student_coursefee.CourseID' ,  'shahit_courses.CourseID')->where('students.StudentID', $studentid)->get();

        return view('shahit.singlestudent', compact('student'));

    }

    public function studentfee($studentid)
    {
        $student =  DB::table('students')->join('student_course' , 'students.StudentID' ,  'student_course.StudentID')->join('shahit_courses' , 'student_course.CourseID' ,  'shahit_courses.CourseID')->where('students.StudentID', $studentid)->get();

        // dd($student);
        $coursefee=DB::table('student_coursefee')->where('StudentID' , '=' ,  $studentid)->get();

        return view('shahit.studentfee' ,compact('student' , 'coursefee'));
    }

    public function addcoursefee(Request $request)

    {
        $coursefee = array(
            'CourseID' => $request->CourseID ,
             'StudentID' => $request->StudentID ,
             'CourseFeePaid' => $request->CourseFeePaid ,
             'CourseFeeDate' => $request->CourseFeeDate
             );
             DB::table('student_coursefee')->insert($coursefee);

             return redirect()->back()->with('error', 'Fee Added successfully')->with('class', 'success');
             
    }

    public function editcoursefee($CourseFeeID)
    {
        $coursefee=DB::table('student_coursefee')->where('CourseFeeID' , '=' , $CourseFeeID)->get();
        return view('shahit.editstudentfee', compact('coursefee'));
    }

    public function updatecoursefee(Request $request)
    {
        $coursefee = array(
            'CourseFeePaid' => $request->CourseFeePaid ,
             'CourseFeeDate' => $request->CourseFeeDate
        );
        $id = DB::table('student_coursefee')->where('CourseFeeID', $request->CourseFeeID)->update($coursefee);
        return redirect('/studentfee/' . $request->StudentID)->with('error', ' Updated Successfully')->with('class', 'success');

    }
    public function deletecoursefee($CourseFeeID)
    {
        DB::delete('delete from `student_coursefee` where CourseFeeID = ?', [$CourseFeeID]);
        return redirect()->back()->with('error', ' Deleted Successfully')->with('class', 'danger');
    }
    //courses
    function courses()
    {
        $courses=DB::table('shahit_courses')->get();
      return view('shahit.courses' , compact('courses'));
    }

    public function addcourse(Request $request)
    {

        $data = array(
                        'CourseName' => $request->CourseName, 
                        'CourseDuration' => $request->CourseDuration, 
                        'CourseFee' => $request->CourseFee, 
                    );

                    DB::table('shahit_courses')->insert($data);

                    return redirect()->back()->with('error', 'Course Added successfully')->with('class', 'success');

    }

    
    public function editcourse($CourseID)
    {
        $course=DB::table('shahit_courses')->where('CourseID' , '=' , $CourseID)->get();

        return view('shahit.editcourse' , compact('course'));
    }
   

}
