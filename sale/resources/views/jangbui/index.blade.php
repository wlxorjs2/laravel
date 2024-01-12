@extends("main")
@section("content")


<br>
<div class="alert mycolor1" role="alert">매입장</div>

<script>
function find_text() {
		form1.action="{{route('jangbui.index')}}";
		form1.submit();
	}
	$(function() {
		$("#text1").datetimepicker({
			locale: "ko",
			format: "YYYY-MM-DD",
			defaultDate: moment()
		});

		$("#text1").on("dp.change", function(e) {
			find_text();
		});
	});
</script>
		
		<form name="form1" action="" >
			<div class="row">
				<div class="col-3" align="left">      
					<div class = "d-inline-flex">
					<div class="input-group  input-group-sm date" id="text1">
						<span class="input-group-text">날짜</span>
						<input type="text" name="text1" size = "10" value = "{{$text1}}" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
						<span class = "input-group-text">
							<div class = "input-group-addon">
								<i class = "far fa-calendar-alt fa-lg"></i>
							</div>
						</span>
					</div>
					</div>
				</div>
					<div class="col-9" align="right">           
						<a href="{{route('jangbui.create')}}{{$tmp}}" class="btn btn-sm mycolor1">추가</a>
					</div>
				</div>
		</form>

		
		<table class="table  table-bordered  table-sm  table-hover mymargin5">
			<tr class="mycolor2">
				<td width="15%">날짜</td>
				<td width="30%">제품명</td>
				<td width="10%">단가</td>
				<td width="10%">수량</td>
				<td width="15%">금액</td>
				<td width="20%">비고</td>
			</tr>
			@foreach ($list as $row)
			<tr>
				<td>{{$row->writeday32 }}</td>
				<td align="left">
					<a href="{{route('jangbui.show', $row->id)}}{{$tmp}}">
						{{ $row->product_name32 }}
					</a>
				</td>
				<td align="right">{{ number_format($row->price32) }}</td>
				<td align="right">{{ number_format($row->numi32) }}</td>
				<td align="right">{{ number_format($row->prices32) }}</td>
				<td align="left">{{$row->bigo32 }}</td>
			</tr>
			@endforeach
	
		</table>
		<!--
			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-sm justify-content-center mymargin5">
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				  </a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				  </a>
				</li>
			  </ul>
			</nav>
		-->
		<div class = "row">
			<div class = "col">
				{{ $list->links('mypagination') }}
			</div>
		</div>
<!-- 해야  할 것 : 추가, 수정, paginate 그냥 다 처음부터 다시 -->
@endsection("content")