<?php

namespace App\Http\Controllers;

use App\Models\Important;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportantController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if($search){
            $data = Important::where('user_id', Auth::id())->where('is_done', false)->where('name', 'LIKE', '%'.$search.'%')->get();
            $done = Important::where('user_id', Auth::id())->where('is_done', true)->where('name', 'LIKE', '%'.$search.'%')->get();
        }else{
            $data = Important::where('user_id', Auth::id())->where('is_done', false)->get();
            $done = Important::where('user_id', Auth::id())->where('is_done', true)->get();
        }

        return view('important', compact(['data', 'done', 'search']));
    }

    public function create(){
        return view('important_create');
    }

    public function store(Request $request){
        $data = Important::create([
            'name' => $request->name,
            'date' => $request->date,
            'user_id' => Auth::id(),
            'is_done' => false,
            'is_fav' => false
        ]);

        return redirect('important');
    }

    public function favourite($id){
        $data = Important::where('id', $id)->first();
        $data->is_fav = !$data->is_fav;
        $data->save();

        return redirect()->back();
    }

    public function done($id){
        $data = Important::where('id', $id)->first();
        $data->is_done = !$data->is_done;
        $data->save();

        return redirect()->back();
    }
}
