@extends("main")
@section("content")


<br>
<div class="alert mycolor1" role="alert">사용자</div>

<script>
function find_text() {
		form1.action="{{route('member.index')}}";
		form1.submit();
	}
</script>
		
		<form name="form1" action="" >
			<div class="row">
				<div class="col-3" align="left">      
					<div class="input-group  input-group-sm">
						<span class="input-group-text">이름</span>
						<input type="text" name="text1" value = "{{$text1}}" class="form-control" placeholder="찾을 이름?" onKeydown="if (event.keyCode == 13) { find_text(); }" >
						<button class="btn mycolor1" type="button">검색</button>
					</div>
				</div>
				<div class="col-9" align="right">           

					<a href="{{route('member.create')}}{{$tmp}}" class="btn btn-sm mycolor1" onClick="find_text();">추가</a>
				</div>
			</div>
		</form>

		
		<table class="table  table-bordered  table-sm  table-hover mymargin5">
			<tr class="mycolor2">
				<td width="10%">번호</td>
				<td width="20%">아이디</td>
				<td width="20%">암호</td>
				<td width="20%">이름</td>
				<td width="20%">전화</td>
				<td width="10%">등급</td>
			</tr>
			@foreach ($list as $row)
				<?
						$tel1 = trim(substr($row->tel32,0,3));
						$tel2 = trim(substr($row->tel32,3,4));
						$tel3 = trim(substr($row->tel32,7,4));
						$tel32 = $tel1 . "-" . $tel2 . "-" . $tel3;
						$rank32 = $row->rank32==0 ? '직원' : '관리자';    // 0->직원, 1->관리자 
				?>
			<tr>
				<td>{{$row->id }}</td>
				<td>{{$row->uid32}}</td>
				<td>{{$row->pwd32}}</td>
				<td><a href="{{route('member.show', $row->id)}}{{$tmp}}">{{ $row->name32 }}</a></td>
				<td>{{$tel32}}</td>
				<td>{{$rank32 }}</td>
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