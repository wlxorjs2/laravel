@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">구분</div>
		
		<form name="form1" method="post" action="{{route('gubun.update',$row->id)}}{{$tmp}}">
		@csrf
		@method('PATCH')
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"> 번호</td>
				<td width="80%" align="left">{{ $row->id }}</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 구분명</td>
				<td align="left">					
					<div class="fd-inline-flex col-7">
						<input  type="컨트롤종류" name="name32" size="20" value = "{{$row->name32}}" 
								   class="form-control form-control-sm">
					</div>
					@error('name32') {{ $message }} @enderror
				</td>
			</tr>
		</table>
		<div align="center">
			<a href="#" class="btn btn-sm hmycolor1"></a>
			<form action="{{ route('gubun.store') }}{{$tmp}}">
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('저장할까요 ?');">저장</button> &nbsp;
			</form>
			<!--<input type="button" value="저장" class="btn mycolor1 btn-sm hmycolor1">-->
			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection
