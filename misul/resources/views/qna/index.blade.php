@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <br>
            <div class="button-container">
				<a href="{{ route('qna.index')}}" class="btn btn-secondary">자주 묻는 질문</a>
				<a href="{{ route('usageGuide.index')}}" class="btn btn-link">이용 안내</a>
				<a href="{{ route('path.index')}}" class="btn btn-link">오시는 길</a>
			</div>
            <br>
        </div>
        <script>
            function find_text() {
                form1.action="";
                form1.submit();
            }
        </script> 
		
		
		<div class="text-center">
		<h2 class="section-heading text-uppercase">자주 묻는 질문</h2>
        </div>
		
		
        <form name="form1" action="" method="GET">
            <div class="row justify-content-end">
                <div class="col-8 ml-auto" style="margin-bottom: -20px;">      
                    <div class="input-group mb-3">
                        <input type="text" name="question" class="form-control" placeholder="제목검색" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('question') }}">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="find_text()">검색</button>
                    </div>
                </div>
                <div class="col-4 d-md-flex justify-content-md-end">           
                    @csrf
                   @if(session('rank')==1)
                        <a class = "btn btn-default" style = "border: 1px solid;" href="{{ route('qna.create')}}">글쓰기</a>
                   @endif 
                        <input type="hidden">
                   
                </div>
            </div>
        </form>
        <br>
        <table class = "table table-sm">
            <tbody>
                @foreach($qnas as $qna)
                <tr>
                    <td class = "col-10">                     
                        <a href="{{ route('qna.show', $qna->id) }}">
                            {{ $qna->question }}
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $qnas->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $qnas->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @foreach(range(1, $qnas->lastPage()) as $page)
                <li class="page-item {{ ($qnas->currentPage() == $page) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $qnas->url($page) }}">{{ $page }}</a>
                </li>
                @endforeach
                <li class="page-item {{ $qnas->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $qnas->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        
    </div>
</section>
@include('footer')
