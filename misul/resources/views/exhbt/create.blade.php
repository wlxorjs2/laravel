@include('nav_bar')



<br>
<div class="alert mycolor1" role="alert"><br><br></div>
<div align="center">
	<h2> 전시 추가 </h2>
    <form name="form1" method="post" action="{{ route('exhbt.store') }}{{$tmp}}" enctype="multipart/form-data">
	@csrf

        <table class="table table-bordered table-sm mymargin5">

            <tr>
                <td class="mycolor2"><font color="red">*</font> 작품 제목</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="컨트롤종류" name="exhbtname" class="form-control form-control-sm" value="{{old('exhbtname')}}">
                    </div>
					@error('exhbtname'){{$message}} @enderror
                </td>
            </tr>
			<tr>
                <td class="mycolor2"><font color="red"></font> 작품 부제목</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="컨트롤종류" name="exhbtbigname" class="form-control form-control-sm" value="{{old('exhbtbigname')}}">
                    </div>
					@error('exhbtbigname'){{$message}} @enderror
                </td>
            </tr>
			<tr>
                <td class="mycolor2"><font color="red"></font> 전시 일정</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="컨트롤종류" name="exhbtdate" class="form-control form-control-sm" value="{{old('exhbtdate')}}">
                    </div>
					@error('exhbtdate'){{$message}} @enderror
                </td>
            </tr>
			<tr>
                <td class="mycolor2"><font color="red"></font> 설명</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="컨트롤종류" name="exhbtex" class="form-control form-control-sm" value="{{old('exhbtex')}}">
                    </div>
					@error('exhbtex'){{$message}} @enderror
                </td>
            </tr>
			<tr>
                <td class="mycolor2"><font color="red"></font> 지점</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="컨트롤종류" name="jijeom" class="form-control form-control-sm" value="{{old('jijeom')}}">
                    </div>
					@error('jijeom'){{$message}} @enderror
                </td>
            </tr>
			<tr>
                <td class="mycolor2"><font color="red"></font> 사진</td>
                <td align="left">
                    <div class="fd-inline-flex">
                        <input type="file" name="exhbtexpic" class="form-control form-control-sm" value="">
                    </div>
					@error('exhbtexpic'){{$message}} @enderror
                </td>
            </tr>
			
			
        </table>
        <div align="center">
			<button type="submit"  class="btn btn-primary btn-sm text-uppercase ml-auto">저장</button> &nbsp;

            <button type="button" class="btn btn-primary btn-sm text-uppercase ml-auto"
			onClick="history.back();">이전화면</button>
			
        </div>
    </form>
</div>


@include('footer')