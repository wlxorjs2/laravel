@include('nav_bar')



<br>
<br>
<br>
<br>
<br>
<br>



<div align="center">


<div class="alert mycolor1" role="alert"></div> <!-- 여기까지가 사용자 bar 영역-->
<h2> 전시 관리 </h2>
<br>
<form name="form1" method="post" action="">
			



							
						
			<table class="table table-bordered table-sm mymargin5">
							<tr>
								<td class="mycolor2"><font color="red">*</font> 제목</td>
								<td width="80%" align="left">{{ $row->exhbtname }}</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 부제목</td>
								<td width="80%" align="left">{{ $row->exhbtbigname }}</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 일정</td>
								<td width="80%" align="left">{{ $row->exhbtdate }}</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 설명</td>
								<td width="80%" align="left">{{ $row->exhbtex }}</td>
							</tr>
							<tr>
								<td class="mycolor2"><font color="red"></font> 지점</td>
								<td width="80%" align="left">{{ $row->jijeom }}</td>
							</tr>
							<tr>
								<td width="20%" class="mycolor2"> 사진</td>
								<td width="80%" align="left">
									<b>파일이름</b> : {{ $row->exhbtexpic }} <br>
												@if($row->exhbtexpic)
												   <img src="{{ asset('storage/product_img/' . $row->exhbtexpic) }}"
														 width="200" class="img-fluid img-thumbnail margin5">
												@else
													<img src=" " width="200" class="img-fluid img-thumbnail margin5">
												@endif
									</td>
							</tr>
							
							
							</table>
							
<br>							
					
		<div align="center">
						<!-- <form name="form1" method="post" action="{{route( 'exhbt.show', $row->id ) }}" > -->
						
						<div align="center">
							<a href="{{ route( 'exhbt.edit', $row->id ) }}{{$tmp}}" class="btn btn-primary btn-sm text-uppercase ml-auto">수정</a>
							<form action="{{ route('exhbt.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
            <button type="submit" class="btn btn-primary btn-sm text-uppercase ml-auto" 
                    onClick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
        </form>
		<button type="button" class="btn btn-primary btn-sm text-uppercase ml-auto"
					onClick="history.back();">이전화면</button>
					</div>
						
					
</div>
</form>	



@include('footer')