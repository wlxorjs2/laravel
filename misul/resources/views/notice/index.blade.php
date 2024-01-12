@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <br>
            <h2 class="section-heading text-uppercase">공지사항</h2>
            <br>
        </div>
        <script>
            use App\Models\Member;
            function find_text() {
                form1.action="";
                form1.submit();
            }
        </script> 
        <form name="form1" action="" method="GET">
            <div class="row justify-content-end">
                <div class="col-8 ml-auto" style="margin-bottom: -20px;">      
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="제목검색" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('title') }}">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="find_text()">검색</button>
                    </div>
                </div>
                <div class="col-4 d-md-flex justify-content-md-end">   
                    @if(session('rank') == 1)      
                        <a class="btn btn-default" style="border: 1px solid;" href="{{ route('notice.create')}}">글쓰기</a>
                    @endif
                </div>
            </div>
        </form>
        <br>
        <table class = "table table-sm">
            <tbody>
                @foreach($notices as $notice)
                <tr>
                    <td class = "col-10">                     
                        <a href="{{ route('notice.show', $notice->id) }}">
                            {{ $notice->title }}
                        </a>
                    </td>
                    <td class = "col-2">{{ $notice->writeday }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $notices->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $notices->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @foreach(range(1, $notices->lastPage()) as $page)
                <li class="page-item {{ ($notices->currentPage() == $page) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $notices->url($page) }}">{{ $page }}</a>
                </li>
                @endforeach
                <li class="page-item {{ $notices->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $notices->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        
    </div>
</section>
@include('footer')
