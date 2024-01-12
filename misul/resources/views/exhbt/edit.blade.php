@include('nav_bar')

<br>
<br>
<br>
<br>
<br>
<br>


<div align="center">
<div class="alert mycolor1" role="alert"></div>

<h2> 전시 수정 </h2>
<br>
			

			
						<form name="form1" method="post" action="{{route( 'exhbt.update', $row->id ) }}{{$tmp}}" enctype="multipart/form-data">
						@csrf
						@method('PATCH')

						
						<table class="table table-bordered table-sm mymargin5">
							<tr>
								<td class="mycolor2"><font color="red">*</font> 제목</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="text" name="exhbtname" 
												 class="form-control form-control-sm" value="{{ $row->exhbtname}}" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 부제목</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="text" name="exhbtbigname" 
												 class="form-control form-control-sm" value="{{ $row->exhbtbigname}}" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 일정</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="text" name="exhbtdate" 
												 class="form-control form-control-sm" value="{{ $row->exhbtdate}}" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 설명</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="text" name="exhbtex" 
												 class="form-control form-control-sm" value="{{ $row->exhbtex}}" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 지점</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="text" name="jijeom" 
												 class="form-control form-control-sm" value="{{ $row->jijeom}}" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 사진</td>
								<td align="left">
									<div class="fd-inline-flex">
										<input  type="file" name="exhbtexpic" 
												 class="form-control form-control-sm" value="{{$row->exhbtexpic}}" >
									</div>
								</td>
							</tr>
					</table>
	  
							
							
							
							
							<br>
							
							<div align="center">

							<button type="submit"  class="btn btn-primary btn-sm text-uppercase ml-auto">저장</button> &nbsp;
							<button type="button" class="btn btn-primary btn-sm text-uppercase ml-auto"
							onClick="history.back();">이전화면</button>

						</form>
						</div>


@include('footer')