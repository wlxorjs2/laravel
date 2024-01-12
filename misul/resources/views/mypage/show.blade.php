@include('nav_bar')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>마이페이지</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="{{asset('my/mypage_template/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('my/mypage_template/css/maincss.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        @if(!session()->has('id'))
        <script type="text/javascript">
            window.location = "{{ url('/') }}";
        </script>
        @endif
    </head>
    <div class="d-flex" id="wrapper" style="margin-top: 5%">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">마이페이지</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('login/mypage')}}">회원정보 수정</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('mypage.show', session()->get('id')) }}">예약 관리</a>

        </div>
    </div>
    <div style="width: 100%; text-align: center;">
        <br>
        <h2>내 예약 내역</h2>
    <table class="table table-striped mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">예약자 이름</th>
            <th scope="col">전화번호</th>
            <th scope="col">예약 날짜</th>
            <th scope="col">예약 시간</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reservations as $reservation)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $reservation->member->name }}</td>
            <td>{{ $reservation->member->tel }}</td>
            <td>{{ date('Y-m-d', strtotime($reservation->date)) }}</td>
            <td>{{ date('H:i', strtotime($reservation->date)) }}</td>
            <td>
                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">취소</button>
                </form>
            </td>
        </tr>        
        @endforeach
        </tbody>
    </table>
    </div>    
    </div>
@include('footer')
