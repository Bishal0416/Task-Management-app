<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Task_catagory;

class DashboardController extends Controller
{
    //
    public function everyControll(Request $req){
        $tasks=Task::all();
        $catagories = Task_catagory::all();
        $search = $req->keyword ?? "";
        $catagory = $req->catagory ?? "";
        $sataus = $req->status ?? "";
        if($search != ""){
            $tasks = Task::where('title', 'like', "%$search%")->orwhere('description', 'like', "%$search%")->get();
        }
        elseif($catagory != ""){
            $tasks = Task::where('catagory', 'like', "%$catagory%")->get();
            // dd($cata);
            // $cata = explode(',', $cata);
        }
        // elseif($status != ""){

        // }
        else{
            $tasks = Task::all();
        }
        return view('dashboard', ['allTasks'=> $tasks,'catagories'=>$catagories]);
    }
}
