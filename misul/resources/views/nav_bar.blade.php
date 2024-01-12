<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ArtWindow</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('my/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rationale&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('my/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('my/css/video.css')}}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </head>
    <body id="page-top">
        
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style = "background-color : #161A30;">
    <div class="container">
        <a class="atag" href="{{ url('/') }}">ArtWindow</a> <!--<img src="{{asset('my/assets/img/logo.png')}}" alt="??" />-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @if(session()->exists("uid"))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{session()->get('name')}}님 환영합니다!
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('login/mypage')}}">마이페이지</a>
                        @if(session('rank') == 1)   
                        <a class="dropdown-item" href="{{route('admin.members')}}">회원 리스트 보기</a>
                    @endif
                    </div>
                </li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('exhbt.index')}}">전시</a></li>
                @if(!session()->exists("uid"))
                <li class="nav-item"><a class="nav-link" href="{{ route('login.index') }}">로그인</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{url('login/logout')}}">로그아웃</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('notice.index') }}">공지사항</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usageGuide.index') }}">이용안내</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reservation.create') }}">관람예약</a></li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>