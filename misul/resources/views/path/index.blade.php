@include('nav_bar')
<section class="page-section" id="about">
    <div class="container">
	
        <div class="text-center">
            <br>
            <div class="button-container">
				<a href="{{ route('qna.index')}}" class="btn btn-link">자주 묻는 질문</a>
				<a href="{{ route('usageGuide.index')}}" class="btn btn-link">이용 안내</a>
				<a href="{{ route('path.index')}}" class="btn btn-secondary">오시는 길</a>
			</div>
            <br>
        
		<h2 class="section-heading text-uppercase">오시는 길</h2>
        </div>
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1579.8766764858658!2d127.05351061404825!3d37.63148917021396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357cbbe5f3843891%3A0x2a334389e7cd7a44!2z7J24642V64yA7ZWZ6rWQ!5e0!3m2!1sko!2skr!4v1701931911299!5m2!1sko!2skr" frameborder="0" style="border:0; width: 100%; padding-top: 20px; margin-bottom: 20px; height: 400px; overflow: hidden;" allowfullscreen=""></iframe>
		
		<div class="place-desc-large"> <div jstcache="24" class="place-name" jsan="7.place-name">인덕대학교</div> 
		<div jstcache="25" class="address" jsan="7.address">주소 : 서울특별시 노원구 초안산로 12</div> </div>
		<div jstcache="25" class="address" jsan="7.address">전화번호 : 02-950-7000</div>
		<div jstcache="25" class="address" jsan="7.address">팩스 : 02-906-5340</div>

		<div class="division aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"> </div>
		<br> 
	<!--<p class="headLine1" style="font-size: 28px; font-weight: bold;">승용차(자가용) 이용 시</p>
    <style>
	   .tit {
		  font-weight: bold;
		  margin-bottom: 2px; /* 첫 번째 bold체와 다음 문장의 간격을 줄여줍니다 */
	   }      
	</style>
	<br>-->
<style>
  .line1 {
    background-color: blue;
    color: white;
    border-radius: 8px;
    padding: 2px 6px;
  }
  
  .lineGreen {
    background-color: green;
    color: white;
    border-radius: 8px;
    padding: 2px 6px;
  }
  
  .lineSky {
    background-color: skyblue;
    color: white;
    border-radius: 8px;
    padding: 2px 6px;
  }
  
  .lineBrown {
    background-color: brown;
    color: white;
    border-radius: 8px;
    padding: 2px 6px;
  }
  
  .lineSeven {
    background-color: rgb(100, 120, 5);
    color: white;
    border-radius: 8px;
    padding: 2px 6px;
  }
</style>

	<h2>승용차(자가용) 이용시</h2>

<div class="txtWrap">

<p class="txt2 txt2Color">동부간선도로 의정부 → 시내방면</p>
<ul>
	<li>의정부-녹천교-우측 미아삼거리, 북서울꿈의 숲 방향 진출-월계지하차도(200m)-인덕대학교 입구에서 우회전 &rarr; <strong>인덕대학교</strong></li>
</ul>

<p class="txt2 txt2Color">동부간선도로 시내 → 의정부방면</p>
<ul>
	<li>우측 하계역 방면 진출-(300m앞 유턴) &rarr; (300m앞 유턴) &rarr; 월계1교(200m) &rarr; 인덕대학교 입구에서 우회전 &rarr; <strong>인덕대학교</strong></li>
</ul>

<p class="txt2 txt2Color">미아사거리 → 상계동 방면</p>
<ul>
	<li>미아사거리 &rarr; 창문여고 &rarr; 북서울꿈의 &rarr; 월계사거리(300m) &rarr; 인덕대학교 입구에서 우회전 &rarr; <strong>인덕대학교</strong></li>
</ul>

<p class="txt2 txt2Color">노원(통일로) → 공릉동 방면</p>
<ul>
	<li>상계동 &rarr; 하계역 사거리(지하철7호선) &rarr;미아사거리, 북서울꿈의 숲 방면 우회전(300m) &rarr; 월계1교(200m) &rarr; 월계지하차도(200m) &rarr; 인덕대학교 입구에서 우회전 &rarr; <strong>인덕대학교</strong></li>
</ul>

<p class="txt2 txt2Color">공릉동(통일로) → 노원 방면</p>
<ul>
	<li>공릉지하차도(200m) &rarr; 하계역 사거리(지하철7호선) &rarr; 미아사거리, 북서울꿈의 숲 방면 좌회전(300m) &rarr; 월계1교(200m) &rarr; 월계지하차도(200m)&rarr; 인덕대학교 입구에서 우회전 &rarr; <strong>인덕대학교</strong></li>
</ul>
<br>


	<h2>버스 이용시</h2>

<p class="tit">
                  <span class="line1">간선</span>100번
    </p>
<ul>
	<li>중계역-하계역-<strong>인덕대학교</strong>-북서울꿈의 숲-미아리고개-혜화동-용산역 </li>
</ul>

<p class="tit">
                  <span class="line1">간선</span>172번
    </p>
<ul>
	<li>하계역-인덕대학교-장위동고개-미아리고개-을지로입구 </li>
</ul>

<p class="tit">
                  <span class="lineGreen">지선</span>1137번
    </p>
<ul>
	<li>상계중앙시장-중계역-하계역-인덕대학교-장위동고개-미아삼거리 </li>
</ul>

<p class="tit">
                  <span class="lineGreen">지선</span>1140번
    </p>
<ul>
	<li>중계역-하계역-인덕대학교</li>
</ul>

<p class="tit">
                  <span class="lineGreen">지선</span>1161번
    </p>
<ul>
	<li>하계역-월계역-인덕공고-인덕대학교-청백아파트</li>
</ul>
<br>
	
	<h2>지하철 이용시</h2>

<p class="tit">
  <span class="line1">1호선</span>
  <span class="lineSky">4호선</span>
  <span class="lineBrown">6호선</span>
  월계(인덕대)역
</p>
<ul>
	<li>1호선: 월계(인덕대)역 하차 도보 5분거리 </li>
</ul>
<ul>
	<li>4호선: 창동역에서 1호선 인천방향 환승, 월계(인덕대)역 하차 도보 5분거리</li>
</ul>
<ul>
	<li>6호선: 석계역에서 1호선 의정부방향 환승, 월계(인덕대)역 하차 도보 5분거리 </li>
</ul>


<p class="tit">
    <span class="lineSeven">7호선</span>석계역
    </p>
<ul>
	<li>하계역 하차 5번출구 100,172,111,1161번 버스 이용(10분 거리) </li>
</ul>
	
		</div>
    </div>
</section>
@include('footer')