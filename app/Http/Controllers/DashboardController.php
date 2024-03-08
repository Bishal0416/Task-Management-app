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

class DashboardController extends Controller
{
    //
    public function everyControll(Request $req){
        $tasks=Task::all();
        $catagories = Task_catagory::all();
        $search = $req->keyword ?? "";
        $catagory = $req->catagory ?? "";
        $status = $req->status ?? "";
        // if($search != ""){
        //     $tasks = Task::where('title', 'like', "%$search%")->orwhere('description', 'like', "%$search%")->get();
        // }
        $keyTasks = [];
        // $search == "" ? $keyTasks = $tasks:{};
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
        return view('dashboard', ['allTasks'=> $stArr,'catagories'=>$catagories]);
    
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
