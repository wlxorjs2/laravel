@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <br>
            <h2 class="section-heading text-uppercase">예약</h2>
        </div>
        <script>
            function checkForm(event) {
                var inputs = document.querySelectorAll('input');
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value === '') {
                        event.preventDefault();
                        document.getElementById('warningMessage').style.display = 'block';
                        return false;
                    }
                }
                return true;
            }
        </script>
        <div class="d-flex" id="wrapper" style="margin-top: 5%">
            <div id="page-content-wrapper">
                <div class="container-fluid px-4">
                    <form action="{{ route('reservation.store') }}" method="post" onsubmit="return checkForm(event)">
                        @csrf
                        <div class="form-group">
                            <label for="date">날짜:</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="time">시간:</label>
                            <input type="time" id="time" name="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">전화번호:</label>
                            <input type="text" id="tel" name="tel" class="form-control" value="{{ session('tel', '') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">예약자 성함:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ session('name', '') }}">
                        </div>                    
                        <button type="submit" class="btn btn-primary mt-3">예약하기</button>
                    </form>
                    <div id="warningMessage" style="display: none; color: black; margin-top: 10px;">
                        <p><a href="{{route('login.index')}}">로그인</a> 후 이용해주세요.</p>
                        <p>계정이 없다면 <a href="{{route('login.create')}}">회원가입</a>을 해주세요.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')
