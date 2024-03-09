<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;
use App\Mail\TaskMail;
use App\Models\Task;
use App\Models\User;
use App\Models\Task_catagory;
use Carbon\Carbon;
use DateTime;



class DashboardController extends Controller
{
    //
    public function everyControll(Request $req){
        $tasks=Task::all();
        $catagories = Task_catagory::all();
        $search = $req->keyword ?? "";
        $catagory = $req->catagory ?? "";
        $status = $req->status ?? "";
        $due_date_start = $req->due_date_start ?? "";
        $due_date_end = $req->due_date_end ?? "";
        $keyTasks = [];
        if($search == ""){
            $keyTasks = $tasks;
        }
        else{
            foreach ($tasks as $task) {
                // Check if task_name partially matches the search term
                if (str_contains(strtolower($task->title), strtolower($search)) || str_contains(strtolower($task->description), strtolower($search))) {
                    array_push($keyTasks, $task);
                }
            }
        }
        $catArr=[];
        if($catagory == ''){
            $catArr = $keyTasks;
        }else{
                    foreach($keyTasks as $t){
                        if (str_contains(strtolower($t->catagory), strtolower($catagory))) {
                            array_push($catArr, $t);
                        }
                    }
        }
        $stArr=[];
        if($status == ""){
            $stArr=$catArr;
        }else{
            foreach($catArr as $t){
                if (str_contains(strtolower($t->status), strtolower($status))) {
                    array_push($stArr, $t);
                }
            }
        }
        $dateArr=[];
        if(($due_date_start == "") and ($due_date_end == "" )){
            $dateArr= $stArr;
        }
        else{
            $startDateTime = new DateTime($due_date_start);
            $endDateTime = new DateTime($due_date_end);
            foreach($stArr as $t){
                $checkDateTime = new DateTime($t->due_date);
                if ($checkDateTime >= $startDateTime && $checkDateTime <= $endDateTime) {
                    array_push($dateArr, $t);
                }
            }
        }

        return view('dashboard', ['allTasks'=> $dateArr,'catagories'=>$catagories]);
    
    }

    public function docShow($id){
        $task = Task::find($id);
        return view('docShow', ['task'=>$task]);
    }

    public function docDownload($id){
        $task = Task::find($id);
        // $file =  asset('storage/'.$task->attach_file);
        $fileName='larael'.time();
        $file = $task->attach_file;
        $filePath = storage_path('app/public/'.$file);
        return response()->download($filePath);
    }

}
