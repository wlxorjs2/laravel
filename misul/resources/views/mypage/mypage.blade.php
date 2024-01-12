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
        <?php
          $route = route('login.index')
        ?>
        @else
        <?php 
          $route = route('login.update', session()->get('id'))
        ?>
        @endif
    </head>
    <body>
        <div class="d-flex" id="wrapper" style="margin-top: 5%">
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">마이페이지</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">회원정보 수정</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('mypage.show', session()->get('id')) }}">예약 관리</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <!-- Page content-->
                <div class="section-MyPage min-height-50vh flex flex-jc-c flex-ai-c ">
                    <!--<form name="form" onsubmit="check(this); return false;" action="#" method="post">-->
                    <form name="member_update_form" method="post" action="{{$route}}">
                        @csrf
                        @method("PATCH")
                      <input type="hidden" name="id" value="${loginedMember.id}">
                      <input type="hidden" name="loginPwReal">
            
                      <div class="section-MyPage-body flex flex-jc-c flex-ai-c">
                        <div>MY PAGE</div>
                        <div class="section-MyPage-body__cell">
                          <div class="MyPage_cell__title">
                            <span>회원번호</span>
                            <div class="MyPage_cell__body">
                              <span>{{session()->get('id')}}</span>
                            </div>
                          </div>
            
                          <div class="MyPage_cell__title">
                            <span>회원ID</span>
                            <div class="MyPage_cell__body">
                              <span>{{session()->get('uid')}}</span>
                            </div>
                          </div>
                          @error('uid'){{$message}} @enderror
                          <div class=MyPage_cell__title>
                            <span>Password</span>
                            <div class=MyPage_cell__body>
                              <input type="password" name="pwd" maxlength="50" placeholder="PW 입력" value="{{session()->get('pwd')}}">
                            </div>
                          </div>
                          @error('pwd'){{$message}} @enderror

                          <div class=MyPage_cell__title>
                            <span>Password Check</span>
                            <div class=MyPage_cell__body>
                              <input type="password" name="pwd2" maxlength="50" placeholder="PW 확인" value="{{session()->get('pwd')}}">
                            </div>
                          </div>
                          @error('pwd2'){{$message}} @enderror

                          <div class="MyPage_cell__title">
                            <span>회원이름</span>
                            <div class=MyPage_cell__body>
                              <input type="text" name="name" value="{{session()->get('name')}}">
                            </div>
                          </div>
                        </div>
                        @error('name'){{$message}} @enderror

                        <div class="section-MyPage-body__cell">
                          <div class=MyPage_cell__title>
                            <span>e-mail</span>
                            <div class=MyPage_cell__body>
                              <input type="text" name="email" value="{{session()->get('email')}}">
                            </div>
                          </div>
                          @error('email'){{$message}} @enderror

                          <div class=MyPage_cell__title>
                            <span>연락처</span>
                            <div class=MyPage_cell__body>
                              <input type="text" name="tel" value="{{session()->get('tel')}}">
                            </div>
                          </div>
                          @error('tel'){{$message}} @enderror

                          <div class=MyPage_cell__title>
                            <span>회원등급</span>
                            <div class=MyPage_cell__body>
                              <span>{{session()->get("rank")==1 ? 'admin' : 'user'}}</span>
                            </div>
                          </div>
            
                          <div class=MyPage_cell__title>
                            <span>회원가입일</span>
                            <div class=MyPage_cell__body>
                              <span>{{session()->get('created_at')}}</span>
                            </div>
                          </div>
                          <div class="section-MyPage-body__option flex flex-jc-fe flex-ai-fe">
                            <button class="btn btn-go" type="submit" onclick="if(confirm('정말 변경하시겠습니까?') == false) {return false;}"><i class="far fa-edit"></i> 변경</button>
                            <button class="cleModifyBtn btn btn-back" type="button" onclick="history.back();"><i class="fas fa-undo"></i> 취소</button>
                            <button class="btn btn-go" type="submit" onclick="if(confirm('정말 탈퇴하시겠습니까?') == false) {return false;}"><i class="far fa-edit"></i> 탈퇴</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('my/mypage_template/js/scripts.js')}}"></script>
        <script src="{{asset('my/mypage_template/js/mainjs.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>
