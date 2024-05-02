<?php

namespace App\Http\Controllers;
use App\Models\Markaz;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $Markaz = Markaz::get();
        return view('home',compact('Markaz'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'markaz' => 'required',
            'drektor' => 'required',
            'phone' => 'required',
            'link' => 'required',
        ]);
        Markaz::create($validated);
        return redirect()->back();
    }

    public function update (Request $request,$id){
        $Markaz = Markaz::find($id);
        return view('update',compact('Markaz'));
    }
    public function updatePost(Request $request){
        $validated = $request->validate([
            'markaz' => 'required',
            'drektor' => 'required',
            'phone' => 'required',
            'link' => 'required',
        ]);
        $Markaz = Markaz::find($request->id);
        $Markaz->drektor = $request->drektor;
        $Markaz->phone = $request->phone;
        $Markaz->link = $request->link;
        $Markaz->markaz = $request->markaz;
        $Markaz->save();
        return redirect()->route('home');
    }
}
