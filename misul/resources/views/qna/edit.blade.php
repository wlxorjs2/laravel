@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <br>
            <h2 class="section-heading text-uppercase">자주 묻는 질문 수정</h2>
            <br>
        </div>
    </div>
    <div class="container" style = "border: solid 1px; border-radius : 20px; height : 60%;">
        <form method="POST" action="{{ route('qna.update', $qna->id) }}">
            @csrf
            @method('PUT')
            <!--<input type="hidden" name="writeday" value="{{ $qna->writeday }}">-->
            <nav id="navbar-example2" class="navbar bg-light px-3 mb-3" style = "margin-top: 20px">
                <div class="input-group mb-3" style = "height: 30px;">
                    <span class="input-group-text" style = "margin-bottom: -30px;" id="inputGroup-sizing-default">질문 : </span>
                    <input type="text" name="question" class="form-control" style = "margin-bottom: -30px" value="{{ $qna->question }}" readonly aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    @error('question')
                    <div class="alert" style="position: absolute; right: 0; background-color: rgba(248, 215, 218, 0.7); color: #721c24; padding: 10px; border-radius: 5px;">{{ $message }}</div>
                    @enderror
                </div>
            </nav>
            <div data-bs-spy="" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                <div class="input-group">
                    <span class="input-group-text">답변 : </span>
                    <textarea class="form-control" name="answer" style="height : 480px;" aria-label="With textarea">{{ $qna->answer }}</textarea>
                    @error('answer')
                    <div class="alert" style="position: absolute; right: 0; background-color: rgba(248, 215, 218, 0.7); color: #721c24; padding: 10px; border-radius: 5px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3 mb-3">
                <button type="submit" class="btn btn-default" style = "border: 1px solid;">저장</button>
                <a href="{{ url()->previous() }}" class="btn btn-default" style = "border: 1px solid; margin-left: 10px;">이전</a>
            </div>
        </form>
    </div>
</section>
@include('footer')
