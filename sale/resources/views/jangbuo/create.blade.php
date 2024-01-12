@extends('main')
@section('content')

<br>
		<div class="alert mycolor1" role="alert">매출</div>

		<script>
			$(function() {
				$("#writeday32").datetimepicker({
					locale: "ko",
					format: "YYYY-MM-DD",
					defaultDate: moment()
				});
			});

			function select_product() {
				var str;
				str = form1.sel_products_id.value;
				if (str=="") {
					form1.products_id32.value = "";
					form1.price32.value = "";
					form1.prices32.value = "";
				} else {
					str = str.split("^^");
					form1.products_id32.value = str[0];
					form1.price32.value = str[1];
					form1.prices32.value = Number(form1.price32.value) * Number(form1.numo32.value);
				}
			}
			
			function cal_prices() {
				form1.prices32.value=Number(form1.price32.value) * Number(form1.numo32.value);
				form1.bigo32.focus();
			}

			function find_product() {
				window.open("{{ route('findproduct.index') }}","",
					"resizable=yes,scrollbars=yes,width=500,height=600");
			}
		</script>
		
		<form name="form1" method="post" action="{{ route('jangbuo.store') }}{{ $tmp }}"
			enctype="multipart/form-data">
			@csrf
		
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2"><font color = "red">*</font> 날짜</td>
				<td width="80%" align="left">
					<div class = "d-line-flex">
						<div class = "input-group input-group-sm date" id = "writeday32">
							<input type="text" name = "writeday32" size = "10" value="{{ old('writeday32') }}"
							class = "form-control form-control-sm">
							<div class = "input-group-text">
								<div class = "input-group-addon">
									<i class = "far fa-calendar-alt fa-lg"></i>
								</div>
							</div>
						</div>
					</div>
					@error('writeday32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2"><font color="red">*</font> 제품명</td>
				<td width = "80%" align="left">					
					<div class="d-inline-flex">
						<input type="hidden" name = "products_id32" value = "{{ old('products_id32') }}">
						<input type="text" name = "product_name32" value = "" class = "form-control form-control-sm" readonly> &nbsp;
						<input type="button" value = "제품찾기" onclick="find_product();" class = "btn btn-sm mycolor1">
					</div>
					@error('products_id32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2">단가</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="price32" size="20" value = "{{old('price32')}}" 
								   class="form-control form-control-sm" onchange="cal_prices();">
					</div>
					@error('name32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2">수량</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="numo32" size="20" value = "{{old('numo32')}}" 
								   class="form-control form-control-sm" onchange="cal_prices();">
					</div>
					@error('price32') {{ $message }} @enderror
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2">금액</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="prices32" size="20" value = "{{ old('prices32') }}" 
								   class="form-control form-control-sm" readonly>
					</div>
				</td>
			</tr>
			<tr>
				<td width = "20%" class="mycolor2">비고</td>
				<td width = "80%" align="left">					
					<div class="fd-inline-flex col-7">
						<input type="text" name="bigo32" size = "20" value = "{{ old('bigo32') }}" 
								   class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			
		</table>
		<div align="center">
			<a href="#" class="btn btn-sm hmycolor1"></a>
			<form action="{{ route('jangbuo.store') }}{{$tmp}}">
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('저장할까요 ?');">저장</button> &nbsp;
			</form>
			<!--<input type="button" value="저장" class="btn mycolor1 btn-sm hmycolor1">-->
			<input type="button" value="이전화면" onClick = "history.back();" class="btn mycolor1 btn-sm hmycolor1">
		</div>
		</form>
		
@endsection