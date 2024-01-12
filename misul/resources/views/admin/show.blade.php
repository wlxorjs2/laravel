<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
@include('nav_bar')

<div class="container">
    <h1 class="mt-4">예약 내용</h1>

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
                <td>{{ \Carbon\Carbon::parse($reservation->date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->date)->format('H:i') }}</td>
                <td>
                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">삭제</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>

@include('footer')
