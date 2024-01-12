@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">제품</div>
		
		<form name="form1" method="post" action="{{route('product.update',$row->id)}}{{$tmp}}"
			enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"> 번호</td>
				<td width="80%" align="left">{{ $row->id }}</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 구분명</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<select name="gubuns_id32" class="form-select form-select-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row1)
								@if ( $row->gubuns_id32 == $row1->id )
									<option value="{{ $row1->id }}" selected>{{ $row1->name32 }}</option>
								  @else
									<option value="{{ $row1->id }}">{{ $row1->name32 }}</option>
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
						<input type="text" name="name32" size="30" maxlength="50" value = "{{$row->name32}}" 
								   class="form-control form-control-sm">
					</div>
					@error('name32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 단가</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="price32" size="20" maxlength="20" value = "{{$row->price32}}" 
								   class="form-control form-control-sm">
					</div>
					@error('price32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"> 재고</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="jaego32" size="20" value = "{{$row->jaego32}}" 
								   class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"> 사진</td>
				<td width = "80%" align="left">					
					<div class="d-inline-flex">
						<input type="file" name="pic32" value = "" 
								   class="form-control form-control-sm">
					</div>
					<br><br>
						<b>파일이름</b> : <?= $row->pic32;?> <br>
						@if ($row->pic32)
							<img src="{{ asset('/storage/product_img/'. $row->pic32) }}" width="200"
								class = "img-fluid img-thumbnail mymargin5">
						@else
							<img src="" width="200" height="150" class = "img-fluid img-thumbnail mymargin5">
						@endif
					</td>
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
