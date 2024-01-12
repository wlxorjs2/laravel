@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <br>
            <h2 class="section-heading text-uppercase">자주 묻는 질문 상세</h2>
            <br>
        </div>
    </div>
    <div class="container" style = "border: solid 1px; border-radius : 20px; height : 60%;">
        <form>
            <input type="hidden" name="writeday" value="{{ $qna->writeday }}" readonly>
            <nav id="navbar-example2" class="navbar bg-light px-3 mb-3" style = "margin-top: 20px">
                <div class="input-group mb-3" style = "height: 30px;">
                    <span class="input-group-text" style = "margin-bottom: -30px;" id="inputGroup-sizing-default">질문 : </span>
                    <input type="text" name="question" class="form-control" style = "margin-bottom: -30px" value="{{ $qna->question }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                </div>
            </nav>
            <div data-bs-spy="" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                <div class="input-group">
                    <span class="input-group-text">답변 : </span>
                    <textarea class="form-control" name="answer" style="height : 480px;" aria-label="With textarea" readonly>{{ $qna->answer }}</textarea>
                </div>
        </form>
        <div class="d-flex justify-content-end mt-3">
		@if(session('rank')==1)
            <a href="{{ route('qna.edit', $qna->id) }}" class="btn btn-default" style = "border: 1px solid; margin-right: 10px;">수정</a>
            <form action="{{ route('qna.destroy', $qna->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default" style = "border: 1px solid; margin-right: 10px;">글 삭제</button>
            </form>
		@endif 	
            <a href="{{ url()->previous() }}" class="btn btn-default" style = "border: 1px solid;">이전</a>
        </div>
    </div>
</section>
@include('footer')
