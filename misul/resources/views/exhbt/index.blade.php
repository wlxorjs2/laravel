



@include('nav_bar')






<script>
function find_text()
{
      form1.action="{{ route('exhbt.index') }}";
      form1.submit();
}
</script>

















								
								
<!-- Portfolio Grid-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
				<div class="form-group">







		
	


<br>
<br>
                    <div class="text-center">
						<br><br>
                        
                        <br>
						<h2>전시</h2>
						<br><br>
                    </div>
					<!-- 추가버튼-->
					@if (session()->get("rank")==1)
					<button class="btn btn-primary btn-sm text-uppercase ml-auto" id="addButton" type="button" 
					onclick="location.href='{{ route('exhbt.create') }}{{$tmp}}'">추가</button>
					<br>
					<br>
					@endif
					<!-- -->
                    <div class="row">
					@foreach ( $list  as  $count => $row)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" data-bs-target="#portfolioModal{{$count}}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{Str::startsWith($row->exhbtexpic, 'http') ? $row->exhbtexpic : asset('storage/product_img/'.$row->exhbtexpic)}}" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $row->exhbtname }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $row->exhbtbigname }}</div>
									@if (session()->get("rank")==1)
									<form action="{{ route('exhbt.destroy', $row->id) }}">
									
								@csrf
								@method('DELETE')
            <button type="submit" class="btn btn-primary btn-sm text-uppercase ml-auto"
                    onClick="">관리</button> &nbsp;
        </form>
		@endif
                                </div>
								
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
				
				<!-- 검색창 -->
				<br>
				<br>
				
							<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form name="form1" method="get" action="">
                <div class="row">
                    <div class="col-9" align="center">
                        <div class="input-group input-group-sm">
                            
                            <input class="form-control flex-grow-1 mr-2" id="name" type="text" name="text1" value="{{ $text1 }}" 
                                placeholder="" data-sb-validations="required" 
                                onkeydown="if (event.keyCode == 13) { find_text(); }">
                        
                            
                            <button class="btn btn-primary btn-sm text-uppercase disabled ml-auto" id="submitButton" type="button" 
                                onClick="find_text();">검색</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<br>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ $list->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $list->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @foreach(range(1, $list->lastPage()) as $page)
            <li class="page-item {{ ($list->currentPage() == $page) ? 'active' : '' }}">
                <a class="page-link" href="{{ $list->url($page) }}">{{ $page }}</a>
            </li>
        @endforeach
        <li class="page-item {{ $list->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $list->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>





			
            </section>
			
			
			





@include('footer')



  <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        @foreach ( $list  as  $count => $row)
        <div class="portfolio-modal modal fade" id="portfolioModal{{$count}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
				
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="" /></div>

					<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">{{ $row->exhbtname }}</h2>
                                    <p class="item-intro text-muted">{{ $row->exhbtbigname }}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{Str::startsWith($row->exhbtexpic, 'http') ? $row->exhbtexpic : asset('storage/product_img/'.$row->exhbtexpic)}}" alt="..." />
                                    <p>{{ $row->exhbtex }}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>지점:</strong>
                                            {{ $row->jijeom }}
                                        </li>
                                        <li>
                                            <strong>전시 일정: {{ $row->exhbtdate }}</strong>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        닫기
                                    </button>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



<script>
    function find_text()
    {
        form1.action="#";
        form1.submit();
    }
</script>  