@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">사용자</div>
		
		<form name="form1" method="post" action="{{ route('member.store') }}">
			@csrf
		
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"> 번호</td>
				<td width="80%" align="left"></td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 이름</td>
				<td align="left">					
					<div class="fd-inline-flex col-7">
						<input  type="컨트롤종류" name="name32" size="20" value = "{{old('name32')}}" 
								   class="form-control form-control-sm">
					</div>
					@error('name32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 아이디</td>
				<td align="left">
					<div class="fd-inline-flex col-7">
						<input  type="컨트롤종류" name="uid32"  size ="20" value = "{{old('uid32')}}" 
								   class="form-control form-control-sm">
					</div>
					@error('uid32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td class="mycolor2"><font color="red">*</font> 암호</td>
				<td align="left">
					<div class="fd-inline-flex col-7">
						<input  type="컨트롤종류" name="pwd32"  size = "20"  value = "{{old('pwd32')}}" 
								   class="form-control form-control-sm">
					</div>
					@error('pwd32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td class="mycolor2"> 전화</td>
				<td align="left">
					<div class = "d-inline-flex">
						<input  type="text" name="tel1" size = "3" maxlength="3" value=""
								   class="form-control form-control-sm">-
						<input  type="text" name="tel2" size = "4" maxlength="4" value=""
								   class="form-control form-control-sm">-
						<input  type="text" name="tel3" size = "4" maxlength="4" value=""
								   class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="mycolor2"> 등급</td>
				<td align="left">
					<div class="fd-inline-flex">
						<!--
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
						 <label class="form-check-label" for="flexRadioDefault1">
							직원
						 </label>
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
						<label class="form-check-label" for="flexRadioDefault1">
							관리자
						</label>
					-->
						<input type="radio" name = "rank32" value = "0" checked>&nbsp;직원&nbsp;
						<input type="radio" name = "rank32" value = "1">&nbsp;관리자
					</div>
				</td>
			</tr>
		</table>
		<div align="center">
			<a href="#" class="btn btn-sm hmycolor1"></a>
			<form action="{{ route('member.store') }}{{$tmp}}">
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('저장할까요 ?');">저장</button> &nbsp;
			</form>
			<!--<input type="button" value="저장" class="btn mycolor1 btn-sm hmycolor1">-->
			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection