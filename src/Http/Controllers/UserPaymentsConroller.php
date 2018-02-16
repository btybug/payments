<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;
use Illuminate\Http\Request;

class UserPaymentsConroller extends Controller
{
    public function getIndex ()
    {
        return view('payments::user_payments.index');
    }
    public function saveShippingAddress(Request $request){
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $data = $request->except("_token");

        $saveable = json_decode($user->shipping_address,true);

        if(!count($saveable)){
            $saveable = [0 => $data];
        }else{
            $saveable[] = $data;
        }
        $encode = json_encode($saveable,true);
        $user->shipping_address = $encode;
        $user->save();

        return redirect()->back();
    }
    public function editShippingAddress($key){
        $data = json_decode(auth()->user()->shipping_address,true);
        $data = $data[$key];
        return response()->json([
            "key" => $key,
            "data" => $data
        ]);
    }

    public function editShippingAddressSave(Request $request,$key){
        dd($request->all());
        $data = json_decode(auth()->user()->shipping_address,true);
        $data[$key] = $request->except('_token');
        $user = User::where("id",auth()->user()->id)->first();
        $user->shipping_address = json_encode($data);
        $user->save();
        return redirect()->back();
    }

    public function removeShippingAddress($key){
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $data = json_decode($user->shipping_address,true);
        unset($data[$key]);
        $user->shipping_address = json_encode($data);
        $user->save();
        return redirect()->back();
    }
}