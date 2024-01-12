@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">사용자</div>
		
		<?
			$tel1 = trim(substr($row->tel32,0,3));
			$tel2 = trim(substr($row->tel32,3,4));
			$tel3 = trim(substr($row->tel32,7,4));
			$tel32 = $tel1 . "-" . $tel2 . "-" . $tel3;
			$rank32 = $row->rank32==0 ? '직원' : '관리자';
		?>

		
		<form name="form1" method="post" action="">
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"> 번호</td>
				<td width="80%" align="left">{{ $row->id }}</</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 이름</td>
				<td align="left">{{ $row->name32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 아이디</td>
				<td align="left">{{ $row->uid32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 암호</td>
				<td align="left">{{ $row->pwd32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2"> 전화</td>
				<td align="left">{{ $tel32 }}</td>
			</tr>
			<tr>
				<td class="mycolor2"> 등급</td>
				<td align="left">{{ $rank32 }}</td>
			</tr>
		</table>
		<div align="center">
			<a href = "{{route('member.edit', $row->id)}}{{$tmp}}"  class="btn mycolor1 btn-sm hmycolor1">수정</a>
			<form action="{{ route('member.destroy', $row->id) }}{{$tmp}}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('삭제할까요 ?');">삭제</button>
			</form>

			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection
