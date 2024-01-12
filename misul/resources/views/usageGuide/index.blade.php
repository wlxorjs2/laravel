        <!-- Navigation-->
        @include('nav_bar')
		<section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <br>
                    <!--<h2 class="section-heading text-uppercase">이용안내</h2>-->
                    <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
					<div class="button-container">
						<a href="{{ route('qna.index')}}" class="btn btn-link">자주 묻는 질문</a>
						<a href="{{ route('usageGuide.index')}}" class="btn btn-secondary">이용 안내</a>
						<a href="{{ route('path.index')}}" class="btn btn-link">오시는 길</a>
				    </div>
					<br>
                </div>
				
				<div class="text-center">
		<h2 class="section-heading text-uppercase">이용안내</h2>
        </div>
		
	<style>
    .timeline-image {
        position: relative;
    }

    .timeline-image .overlay-text {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    </style>
		
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/time.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>관람시간</h4>
                                <h5 class="subheading">관람 시간｜화요일~금요일 9:00~18:00<br>토요일~일요일 9:00~20:00<br>매표 마감 시간｜폐관 1시간 전</h5>
                            </div>
                            <div class="timeline-body"><p class="text-muted">휴관일｜매주 월요일, 매년 1월 1일, 음력 설날 및 추석 당일</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/price.jfif" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>관람 요금</h4>
                                <h5 class="subheading">성인 (만 25-64세) 10,000원 <br> 청년 (만 19~24세) 및 대학(원)생 8,000원 <br>
								청소년 (만 7세~18세) 6,000원 <br> 시니어 (만 65세 이상) 6,000원 </h5>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><br> 장애인, 국가유공자 (본인 및 동반 1인) 무료 <br>
								문화누리카드 소지자 무료 <br> 미취학 아동 (~만 6세) 무료<br>
							</p>
							</div>
                        </div>
                    </li>
                    
					<li>
						<div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/mm.PNG" alt="..." /></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4>관람 매너</h4>
								<h5 class="subheading">전시실 내 사진 및 영상 촬영은 지정된 포토존 이외 금지 <br> 전시작품이나 쇼케이스를 만지지 마세요 <br> 핸드폰은 진동모드로 해주시고 대화나 통화는 자제해 주세요 </h5>
							</div>
							<div class="timeline-body">
								<p class="text-muted"></p>
								
							</div>
						</div>
					</li>
					<!-- 구글 지도 추가 
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1579.8766764858658!2d127.05351061404825!3d37.63148917021396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357cbbe5f3843891%3A0x2a334389e7cd7a44!2z7J24642V64yA7ZWZ6rWQ!5e0!3m2!1sko!2skr!4v1701931911299!5m2!1sko!2skr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					<a class="_more_a5p8e_246 _more-link_1usok_217 inverse" 
					ga4-event="{&quot;click_type&quot;: &quot;link&quot;, &quot;component&quot;: &quot;GuggenFooter&quot;, &quot;content_group&quot;: &quot;footer&quot;, &quot;gtm_tag&quot;: &quot;link&quot;, &quot;link_text&quot;: &quot;Get directions on Google Maps&quot;, &quot;link_url&quot;: 
					&quot;https://www.google.com/maps/place/Solomon+R.+Guggenheim+Museum/@40.7829796,-73.9611646,17z/data=!3m1!4b1!4m7!1m4!3m3!1s0x89c258a29a5e9e99:0x4a01c8df6fb3cb8!2sSolomon+R.+Guggenheim+Museum!3b1!3m1!1s0x89c258a29a5e9e99:0x4a01c8df6fb3cb8&quot;}" 
					href="https://www.google.com/maps/place/Solomon+R.+Guggenheim+Museum/@40.7829796,-73.9611646,17z/data=!3m1!4b1!4m7!1m4!3m3!1s0x89c258a29a5e9e99:0x4a01c8df6fb3cb8!2sSolomon+R.+Guggenheim+Museum!3b1!3m1!1s0x89c258a29a5e9e99:0x4a01c8df6fb3cb8" 
					target="_blank" ga-init="">
					<font style="vertical-align: inherit;">
					<!--<font style="vertical-align: inherit;">Google 지도에서 길찾기</font></font></a>					
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/tel.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>전화번호</h4>
                                <h4 class="subheading">TEL 02-950-7000 <br>FAX 02-906-5340</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"></p></div>
                        </div>
                    </li>-->
					<li >
					<!--<div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/time.jpg" alt="..." /></div>-->
					<div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/a1.PNG" alt="..." /></div>
					<!--<class="timeline-inverted"> <div class="timeline-image"><img class="rounded-circle img-fluid" src="my/assets/img/guide/mi.jpg" />  </div> -->
					</li> 

                </ul>
            </div>
        </section>
        @include('footer')