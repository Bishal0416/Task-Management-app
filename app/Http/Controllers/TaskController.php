<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Chat;
use App\Models\Task_catagory;
use App\Models\User;


use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(){
        $catagories = Task_catagory::all();
        $user_name = User::select('name','role')->get();
        return view('tasks.addtask', ['catagories'=>$catagories, 'user_name'=>$user_name]);
    }

    public function save(Request $req){
        $validated = $req->validate([
            'task_title' => 'required',
            'desc' => 'required',
            'attach_file' => 'max:5120|nullable',
        ]);    
        $temp = $req->all();
        $catagory = $temp['catagory'];
        $assigne = $temp['assign'];
        $task = new Task();
        if(!is_null($req->file('task_file'))){
            $imagePath = $req->file('task_file')->store('images', 'public');
            $task->attach_file = $imagePath;
        }
        else{
            $task->attach_file =null;
        }
        $task->user_id=auth()->user()->id;
        $task->title=$req->input('task_title');
        $task->description=$req->input('desc');
        $task->due_date=$req->input('due_date');
        $task->status=$req->input('status');
        $task->catagory=implode(',',$catagory);
        // $task->catagory=$req->input('catagory');
        $task->assign_to=implode(',',$assigne);
        $task->save();
        return redirect('/dashboard');
    }

    public function show($task_id){
        $details = Task::find($task_id);
        $str = $details->assign_to;
        $assigne = explode(",",$str);        
        $chats = Chat::select('message', 'user_id')->where('task_id', $task_id)->get();
        return view('tasks.showtask', ['task_details'=>$details, 'chats'=>$chats, 'assigne'=>$assigne]);
    }

    public function edit($task_id){
        $current_task = Task::find($task_id);
        $catagories = Task_catagory::all();
        $user_name = User::select('name','role')->get();
        return view('tasks.updatetask', ['current_task' => $current_task,'catagories'=>$catagories, 'user_name'=>$user_name]);
    }

    public function update(Request $req, $task_id){
        $validated = $req->validate([
            'task_title' => 'required',
            'desc' => 'required',
            'attach_file' => 'max:5120|nullable',
        ]);    
        $temp = $req->all();
        $catagory = $temp['catagory'];
        $assigne = $temp['assign'];
        // $task = new Task();
        $task = Task::where('id', $task_id)->first();
        if(!is_null($req->file('task_file'))){
            $imagePath = $req->file('task_file')->store('images', 'public');
            $task->attach_file = $imagePath;
        }
        else{
            $task->attach_file =null;
        }
        $task->user_id=auth()->user()->id;
        $task->title=$req->input('task_title');
        $task->description=$req->input('desc');
        $task->due_date=$req->input('due_date');
        $task->status=$req->input('status');
        $task->catagory=implode(',',$catagory);
        // $task->catagory=$req->input('catagory');
        $task->assign_to=implode(',',$assigne);
        $task->save();
        return redirect('/dashboard');
    }

    public function delete($task_id){
        $current_task = Task::find($task_id);
        if(!is_null($current_task)){
            $current_task->delete();
        }
        return redirect('/dashboard');
    }

    // public function filter_search(Request $req){

    //     $search = $req->search;
    //     $task = Task::where(function($query) use ($search){
    //         $query->where('title', "like", "%$search%")
    //         ->orwhere('description', 'like', "%$search%");
    //     })->get();
    //     dd($task);

    //     $tasks = $tasks->paginate(10);

    //     return view('tasks.showtask', compact('tasks'));

    // }




    public function demo(){
        dd(auth()->user()->id);
    }
}
