 <!-- Navigation-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('my/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&family=Sunflower:wght@300;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Grandiflora+One&family=Noto+Sans+KR:wght@100&family=Sunflower:wght@300;500&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('my/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('my/css/video.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
@include('nav_bar')

<section class="video-section">
    <div class="video-container">
        <video autoplay loop muted>
            <source src="my/assets/main.mp4" type="video/mp4">
        </video>
        <h1 class="section-heading">이곳은 예술의 세계에 빠져드는 창문입니다.</h1>
        <p class="section-subheading">다양한 작품들을 즐기시고, 아름다운 순간들을 만끽하세요.</p>
        <div class="button-container">
            <a href="{{ route('exhbt.index')}}" class="btn btn-primary" style="background-color: #000000; color: #ffffff; border: 1px solid grey;">작품 둘러보기</a>
            <a href="{{ route('reservation.create')}}" class="btn btn-secondary" style="background-color: #000000; color: #ffffff; border: 1px solid grey;">예약하기</a>
        </div>
    </div>
</section>



            <!-- Masthead-->

    <!-- Footer-->
    @include('footer')
        <!-- Portfolio Modals-->
    </body>
</html>
