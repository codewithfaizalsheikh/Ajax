<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SweetAlert;
class SweetAlertController extends Controller
{
    public function sweetalert(){
        return view('sweetalert');
    }

    public function sweetalert_email_store(Request $request){
        $store = new SweetAlert();
        $store->email = $request->email;
        $store->save();
        return response()->json(['success'=>'data is being processed.']);
    }
    public function sweetalert_2(){
        
        return view('sweet_alert_2');
    }
}
