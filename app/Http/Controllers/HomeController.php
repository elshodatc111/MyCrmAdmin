<?php

namespace App\Http\Controllers;
use App\Models\Markaz;
use App\Models\Tulov;
use App\Models\Sms;
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
        $SmsHistory = Sms::where('markaz_id',$id)->get();
        $Tulov = Tulov::where('markaz_id',$id)->get();
        return view('show',compact('Markaz','setting','sms','active','SmsHistory','Tulov'));
    }
    public function createSms(Request $request){
        $Markaz = Markaz::find($request->id);
        $response = Http::post($Markaz['link'].'/api/sms/plus', [
            'maxsms' => $request->plus,
            'login' => 'elshodatc1116',
            'parol' => 'Elshod1997/*',
        ]);
        if($response->status()==200){
            $Sms = new Sms;
            $Sms->markaz_id = $request->id;
            $Sms->count = $request->plus;
            $Sms->save();
            return redirect()->back();
        }else{
            dd('error');
        }
    }
    public function tulov(Request $request){
        $validated = $request->validate([
            'summa' => 'required',
            'about' => 'required'
        ]);
        $validated['markaz_id'] = $request->id;
        Tulov::create($validated);
        return redirect()->back();
    }
    public function settings(Request $request){
        $Markaz = Markaz::find($request->id);
        $response = Http::post($Markaz['link'].'/api/setting/update', [
            'EndData' => $request->EndData,
            'Status' => $request->Status,
            'Username' => 'elshodatc1116',
            'login' => 'elshodatc1116',
            'parol' => 'Elshod1997/*',
        ]);
        if($response->status()==200){
            return redirect()->back();
        }else{
            dd('error');
        }
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