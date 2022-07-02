<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KanbanTaskBoard extends Controller
{
    //
    public function kanbanTaskBoard(){

          $allUsers = DB::table('employee')->where('Active','Y')->get();
          $taskDetail = DB::table('task_detail')->get();
        return view('kanban-board/task_board',compact('allUsers','taskDetail'));
    }

    public function AddNewTask(Request $request)
    {
      
        return redirect('kanbanTaskBoard',compact('allUsers'));
        
    }
}
