@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">매입</div>
		
		<form name="form1" method="post" action="">
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td class="mycolor2"><font color="red">*</font>날짜</td>
				<td align="left">{{ $row->writeday32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font>제품명</td>
				<td align="left">{{ $row->product_name32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2">단가</td>
				<td align="left">{{ number_format($row->price32)}}</td>
			</tr>
			<tr>
				<td class="mycolor2">수량</td>
				<td align="left">{{ number_format($row->numi32)}}</td>
			</tr>
			<tr>
				<td class="mycolor2">금액</td>
				<td align="left">{{ number_format($row->prices32)}}</td>
			</tr>
			<tr>
				<td class="mycolor2">비고</td>
				<td align="left">{{ $row->bigo32 }}</td>
			</tr>
			

		</table>
		<div align="center">
			<a href = "{{route('jangbui.edit', $row->id)}}{{$tmp}}"  class="btn mycolor1 btn-sm hmycolor1">수정</a>
			<form action="{{ route('jangbui.destroy', $row->id) }}{{$tmp}}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('삭제할까요 ?');">삭제</button>
			</form>

			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection
