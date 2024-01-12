<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Member;
use Carbon\Carbon;
use App\Http\Controllers\DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $reservations = Reservation::where('user_id', $userId)->get();
    
        return view('reservations.index', ['reservations' => $reservations]);
    }
    

    public function create()
    {
        return view('reservation.index');
    }

    public function store(Request $request) {
        $reservation = new Reservation;
    
        $datetime = $request->date . ' ' . $request->time;
        $datetime = Carbon::createFromFormat('Y-m-d H:i', $datetime);
        $reservation->date = $datetime;
    
        $memberId = $request->session()->get('id');
        $member = Member::find($memberId);
    
        if (!$member) {
            return redirect()->back()->with('error', '회원 정보를 찾을 수 없습니다.');
        }
        
        $reservation->member_id = $member->id;
        $reservation->save();
        return redirect('/');
    }
    
    public function show($id)
    {      
        $userId = request()->session()->get('id');
        if (!$userId) { // 로그인한 사용자가 없는 경우
            return redirect('login'); // 로그인 페이지로 리디렉션
        }
        $user = Member::find($userId);
        $reservations = $user->reservations;
        $reservationDetails = [];
        foreach ($reservations as $reservation) {
            $date = (new \DateTime($reservation->date))->format('Y-m-d'); // 각 예약의 날짜를 가져옴
            $time = (new \DateTime($reservation->date))->format('H:i'); // 각 예약의 시간을 가져옴

        $reservationDetails[] = [ // 배열에 예약 상세 정보 추가
            'date' => $date,
            'time' => $time,
            // 필요한 다른 정보들도 추가할 수 있습니다.
        ];
    }
        return view('mypage.show', compact('reservations')); // 뷰로 변수를 전달
    }
    
    
    // public function show($id) {
    //     $reservations = Reservation::where('member_id', $id)->get();
    //     //$member = $reservation->member;
    //     return view('admin.show', compact('reservation'));
    // }
    public function showForMypage() {
        $reservations = Reservation::where('member_id', auth()->id())->get();
        return view('mypage.show', compact('reservations'));
    }

    public function destroy($id)
{
    $reservation = Reservation::find($id);

    if ($reservation) {
        $reservation->delete();
        return redirect()->back()->with('success', '예약이 성공적으로 삭제되었습니다.');
    } else {
        return redirect()->back()->with('error', '해당 예약을 찾을 수 없습니다.');
    }
}
    public function members() {
        $members = Member::all(); // User는 회원 모델이어야 합니다.
        return view('admin.members', ['members' => $members]);
    }
}
