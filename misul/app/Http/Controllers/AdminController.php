<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function members() {
    $members = Member::all(); // User는 회원 모델이어야 합니다.
    return view('admin.members', ['members' => $members]);
}

public function show($id)
{
    // 멤버와 관련된 예약 내용을 조회합니다.
    $reservations = Reservation::where('member_id', $id)->get();

    // 예약 내용을 뷰에 전달합니다.
    return view('admin.show', compact('reservations'));
}
}
