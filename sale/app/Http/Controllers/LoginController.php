<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Member;

class LoginController extends Controller
{
    public function check() {
        $uid32 = request('uid32');
        $pwd32 = request('pwd32');

        $row = Member::where('uid32','=',$uid32)->
                       where('pwd32','=',$pwd32)->first();
        if($row) {
            session()->put('uid32', $row->uid32);
            session()->put('rank32', $row->rank32);
        }
        return view('main');
    }

    public function logout() {
        session()->forget('uid32');
        session()->forget('rank32');

        return view('main');
    }
}
