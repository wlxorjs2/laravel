@extends("main")
@section("content")

<br>
<div class="alert mycolor1" role="alert">종류별 분포도</div>

<script>
function find_text() {
		form1.action="{{route('chart.index')}}";
		form1.submit();
	}
	$(function() {
		$("#text1").datetimepicker({
			locale: "ko",
			format: "YYYY-MM-DD"
		});
		$("#text2").datetimepicker({
			locale: "ko",
			format: "YYYY-MM-DD"
		});
		$("#text1").on("change.datetimepicker", function(e) {
			find_text();
		});
		$("#text2").on("change.datetimepicker", function(e) {
			find_text();
		});

	});
</script>
		
		<form name="form1" action="" >
			<div class="row">
				<div class="col-12" align="left">      
					<div class = "d-inline-flex">
						<div class="input-group  input-group-sm date" id="text1">
							<span class="input-group-text">날짜</span>
							<input type="text" name="text1" size = "10" value = "{{$text1}}" 
							class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
							<span class = "input-group-text">
								<div class = "input-group-addon">
									<i class = "far fa-calendar-alt fa-lg"></i>
								</div>
							</span>
						</div>
					</div>
					-
					<div class = "d-inline-flex">
						<div class="input-group  input-group-sm date" id="text2">
							<input type="text" name="text2" size = "10" value = "{{$text2}}" 
							class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
							<span class = "input-group-text">
								<div class = "input-group-addon">
									<i class = "far fa-calendar-alt fa-lg"></i>
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</form>
		<br>

		<script src="{{ asset('my/js/chart.min.js') }}"></script>

		<div style = "width: 40%">
			<canvas id = "myChart"> </canvas>
		</div>

		<script>
			const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [ {!! $str_label !!} ],
            datasets: [{
                data: [ {{ $str_data }} ],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.8)",
                    "rgba(255, 159, 64, 0.8)",
                    "rgba(255, 205, 86, 0.8)",
                    "rgba(75, 192, 192, 0.8)",
                    "rgba(153, 102, 255, 0.8)",
                    "rgba(201, 203, 207, 0.8)",
                    "rgba(54, 162, 235, 0.8)",
					
                    "rgba(255, 99, 132, 0.5)",
                    "rgba(255, 159, 64, 0.5)",
                    "rgba(255, 205, 86, 0.5)",
                    "rgba(75, 192, 192, 0.5)",
                    "rgba(153, 102, 255, 0.5)",
                    "rgba(201, 203, 207, 0.5)",
                    "rgba(54, 162, 235, 0.5)"
                ],
            }]
        },
    });
		</script>
@endsection

		{{-- <table class="table  table-bordered  table-sm  table-hover mymargin5">
			<tr class="mycolor2">
				<td width="50%">제품명</td>
				<td width="50%">매출검수</td>
			</tr>
			@foreach($list as $row)
				<tr>
					<td align = "left">{{ $row->gubuns_name32 }}</td>
					<td align = "right">{{ number_format($row->cnumo) }}</td>
				</tr>
			@endforeach
		</table>
		<!--
			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-sm justify-content-center mymargin5">
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				  </a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				  </a>
				</li>
			  </ul>
			</nav>
		-->
		<div class = "row">
			<div class = "col">
				{{ $list->links('mypagination') }}
			</div>
		</div>
<!-- 해야  할 것 : 추가, 수정, paginate 그냥 다 처음부터 다시 -->
@endsection("content") --}}