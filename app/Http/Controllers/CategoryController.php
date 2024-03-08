<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task_catagory;

class CategoryController extends Controller
{
    public function main(){
        $all = Task_catagory::all();
        // dd($all);
        return view('index', ['all'=>$all]);
    }
    public function add(Request $req){
        // $validated = $req->validate([
        //     'cate '=> 'required',
        // ]);
        $cate  = new Task_catagory();
        $cate->catagory_name = $req->input('cate');
        $cate->save();
        return redirect('/category');
        // return('hi');
    }
    public function delete($id){
        $current_category = Task_catagory::find($id);
        if(!is_null($current_category)){
            $current_category->delete();
        }
        return redirect('/category');
    }
}
