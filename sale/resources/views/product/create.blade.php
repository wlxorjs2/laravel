@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">제품</div>
		
		<form name="form1" method="post" action="{{ route('product.store') }}{{ $tmp }}"
			enctype="multipart/form-data">
			@csrf
		
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"> 번호</td>
				<td width="80%" align="left"></td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 구분명</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<select name="gubuns_id32" class="form-select form-select-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row)
								@if ( $row->id == old('gubuns_id32') )
									<option value="{{ $row->id }}" selected>{{ $row->name32 }}</option>
								  @else
									<option value="{{ $row->id }}">{{ $row->name32 }}</option>
								@endif
							@endforeach
						</select>
					</div>
					@error('gubuns_id32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 제품명</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="name32" size="30" maxlength="50" value = "{{old('name32')}}" 
								   class="form-control form-control-sm">
					</div>
					@error('name32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 단가</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="price32" size="20" maxlength="20" value = "{{old('price32')}}" 
								   class="form-control form-control-sm">
					</div>
					@error('price32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 재고</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="jaego32" size="20" value = "" 
								   class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 사진</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="file" name="pic32" value = "" 
								   class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			
		</table>
		<div align="center">
			<a href="#" class="btn btn-sm hmycolor1"></a>
			<form action="{{ route('product.store') }}{{$tmp}}">
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('저장할까요 ?');">저장</button> &nbsp;
			</form>
			<!--<input type="button" value="저장" class="btn mycolor1 btn-sm hmycolor1">-->
			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection