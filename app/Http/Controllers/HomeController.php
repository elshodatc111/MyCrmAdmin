<?php

namespace App\Http\Controllers\Api;
use App\Models\Setting;
use App\Models\SmsCounter;
use App\Models\Guruh;
use App\Models\GuruhUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller{

    public function activuser(){
        $t = 0;
        $return = array();
        for($a=-11;$a<1;$a++){
            $StartDates = date("Y-m",strtotime($a.' month',time()))."-01 00:00:00";
            $EndDates = date("Y-m",strtotime($a.' month',time()))."-31 23:59:59";
            $Guruhsss = Guruh::where('guruh_start','<=',$EndDates)->where('guruh_end','>=',$StartDates)->get();
            $ActivUser = array();
            foreach ($Guruhsss as $key => $value) {
                $GuruhUsersss = GuruhUser::where('guruh_id',$value->id)->get();
                foreach ($GuruhUsersss as $key11 => $item) {
                    $userss_id = $item->user_id;
                    $km = 0;
                    foreach ($ActivUser as $keyaaaas => $valueaaaas) {
                        if($valueaaaas==$userss_id){
                            $km++;
                        }
                    }
                    if($km==0){
                        array_push($ActivUser, $userss_id);
                    }   
                }
            }
            $ActivStudent = count($ActivUser);
            $t = $t+1;
            $return[$t]['count'] = $ActivStudent;
            $return[$t]['data'] = date("Y-M",strtotime($a.' month',time()));
        }
        return $return;
    }
    public function setting(Request $request){
        $Username = $request->login;
        $Password = $request->parol;
        if($Username=='elshodatc1116' AND $Password=='Elshod1997/*'){
            $response = [
                'setting' => [
                    'EndData' => Setting::first()->EndData,
                    'Username' => Setting::first()->Username,
                    'Status' => Setting::first()->Status,
                    'Summa' => Setting::first()->Summa,
                    'created_at' => Setting::first()->created_at,
                    'updated_at' => Setting::first()->updated_at,
                    'message' => 'Sozlamalar'
                ],
                'sms' => [
                    'maxsms' => SmsCounter::first()->maxsms,
                    'counte' => SmsCounter::first()->counte
                ],
                'active' => $this->activuser()
            ];
        }else{
            $response = [
                'error' => 'xatolik'
            ];
        }
        return $response;
    }

    public function update(Request $request){
        $Login = $request->login;
        $parol = $request->parol;
        
        if($Login=='elshodatc1116' AND $parol=='Elshod1997/*'){
            $Setting = Setting::first();
            $Setting->EndData = $request->EndData;
            $Setting->Username = $request->Username;
            $Setting->Status = $request->Status;
            $Setting->save();
            $response = [
                'status' => [
                    'code' => 200,
                    'message' => "Filial Sozlamalari sozlandi"
                ]
            ];
        }else{
            $response = [
                'error' => 'xatolik'
            ];
        }
        return $response;
    }

    public function smsCountPlus(Request $request){
        $Login = $request->login;
        $parol = $request->parol;
        
        if($Login=='elshodatc1116' AND $parol=='Elshod1997/*'){
            $SmsCounter = SmsCounter::first();
            $SmsCounter->maxsms = $SmsCounter->maxsms + $request->maxsms;
            $SmsCounter->save();
            $response = [
                'status' => [
                    'code' => 200,
                    'plus' => $request->maxsms,
                    'maxsms' => $SmsCounter->maxsms,
                    'counte' => $SmsCounter->counte,
                    'message' => "Filialga sms qo'shildi"
                ]
            ];
        }else{
            $response = [
                'error' => 'xatolik'
            ];
        }
        return $response;
    }

}
