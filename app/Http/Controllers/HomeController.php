<?php

namespace App\Http\Controllers;
use App\Models\Markaz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $Markaz = Markaz::get();
        return view('home',compact('Markaz'));
    }

    public function show($id){
        $Markaz = Markaz::find($id);
        $response = Http::get($Markaz['link'].'/api/setting', [
            'login' => 'elshodatc1116',
            'parol' => 'Elshod1997/*',
        ])->json();
        $setting = $response['setting'];
        $sms = $response['sms'];
        $active = $response['active'];
        
        return view('show',compact('Markaz','setting','sms','active'));
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
