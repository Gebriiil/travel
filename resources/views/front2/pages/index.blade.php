@extends('front2.master')
@section('content')
	<!-- start Main Wrapper --> 
		<div class="main-wrapper">
		
			<div class="slick-hero-slider-wrapper">
				
				<div class="slider slick-hero-slider slick-slider-center-mode slick-animation slick-inner-dot alt-dot-position">
					@foreach ($sliders as $key=>$slider)

                		
						<div class="slick-item">
						
							<div class="image-bg" style="background-image:url('{{ getImage(SLIDER_PATH.$slider->img)  }}');">
							
								<div class="container">
								
									<div class="row">
					
										<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
							
											<div class="slick-hero-slider-caption">
												<h2 class="animation fromBottom transitionDelay2 transitionDuration4">{{ $slider->title }}</h2>
												<p class="animation fromBottom transitionDelay4 transitionDuration6">{{ $slider->desc }}</p>
												<a href="#" class="animation fromBottom transitionDelay6 transitionDuration8"><span class="bg-primary">More Details</span></a>
											</div>
											
										</div>
										
									</div>
								
								</div>
								
							</div>
							
						</div>
					@endforeach
					
					
					
				</div>

			</div>

			<div class="main-search-wrapper-2 absolute-in-hero-slider">

				<div class="container">

					<form class="inner">

						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-3">

								<div class="typeahead-container form-group form-icon-right">

									<label class="destination-search-3">Destination</label>

									<div class="typeahead-field">
										<input id="destination-search-3" name="destination-search-3" type="search" autocomplete="off" class="form-control" placeholder="City or Airport">
									</div>
									<i class="fa fa-map-marker"></i>
								</div>

							</div>

							<div class="col-xss-12 col-xs-12 col-sm-4">

								<div class="row gap-10">

									<div class="col-xss-12 col-xs-6 col-sm-6">
										<div class="form-group form-icon-right">
											<label for="dpd1">Check-in</label>
											<input name="dpd1" class="form-control" id="dpd1" placeholder="Check-in" type="text" readonly >
											<i class="fa fa-calendar"></i>
										</div>
									</div>

									<div class="col-xss-12 col-xs-6 col-sm-6">
										<div class="form-group form-icon-right">
											<label for="dpd2">Check-out</label>
											<input name="dpd2" class="form-control" id="dpd2" placeholder="Check-out" type="text" readonly>
											<i class="fa fa-calendar"></i>
										</div>
									</div>

								</div>
							</div>

							<div class="col-xss-12 col-xs-12 col-sm-6 col-md-5">

								<div class="row gap-10">
									<div class="col-xss-12 col-xs-4 col-sm-4">

										<div class="form-group form-spin-group">
											<label for="room-amount">Rooms</label>
											<input type="text" class="form-control form-spin" value="1" id="room-amount" name="room-amount"/>
										</div>

									</div>

									<div class="col-xss-12 col-xs-4 col-sm-4">

										<div class="form-group form-spin-group">
											<label for="adult-amount">Adults</label>
											<input type="text" class="form-control form-spin" value="1" id="adult-amount" name="adult-amount"/>
										</div>

									</div>

									<div class="col-xss-12 col-xs-4 col-sm-4">

										<div class="form-group form-spin-group">
											<label for="child-amount">Children</label>
											<input type="text" class="form-control form-spin" value="0" id="child-amount" name="child-amount"/>
										</div>

									</div>
								</div>

							</div>

						</div>

						<div class="btn-absolute">

							<button class="btn btn-block btn-danger">Search</button>

						</div>

					</form>

				</div>

			</div>

			<div class="clear"></div>

			<div class="container pt-50 pb-60">
				<div class="row">

					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

						<div class="section-title">
							<h2>Top Destinations</h2>
							<p>Egypt us tours offers Egypt and Jordan combined tours, check Egypt and jordan different itinerary and enjoy our Egypt Jordan tour packages, also check other multiculture tours</p>
						</div>

					</div>

				</div>
				<div class="top-destination-wrapper">

					<div class="GridLex-gap-20-wrapper">

						<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">

							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/01.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Cairo</h4>
													<p>Egypt</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/02.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Paris</h4>
													<p>France</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/03.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Giza</h4>
													<p>Egypt</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/04.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Rome</h4>
													<p>Italy</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/05.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Dubai</h4>
													<p>Emirate</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/06.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Montreal</h4>
													<p>Canada</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/07.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>London</h4>
													<p>England</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="#">
										<div class="image">
											<img src="images/top-destinations/08.jpg" alt="Top Destinations">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-7 place">
													<h4>Marrakesh</h4>
													<p>Morocco</p>
												</div>

												<div class="col-xs-5 price">
													<p>984 Tours</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
												</div>

											</div>
										</div>
									</a>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="clear"></div>

			<div class="bg-white pt-50 pb-60">

				<div class="container">

					<div class="row">

						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

							<div class="section-title">
								<h2>{{ site_content($site_content,'special_offers') }}</h2>
								<p>{{ site_content($site_content,'special_offers_desc') }}</p>
							</div>

						</div>

					</div>
					<div class="recent-post-wrapper">
						<div class="GridLex-gap-20-wrapper">

							<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
							<?php $x=0; ?>
							@if (count($special_offers)>0)
							@foreach($special_offers as $offer)
							@if($x<=4)


								<div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">

									<div class="recent-post">

										<div class="image" style="background-image:url('images/special-offers/01.jpg');"></div>

										<div class="content">

											<h4> Alamein Tours from Alexandria Port  </h4>
											<div class="review_rating">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</div>

											<p class="price_offers"><span>start from</span><span class="number">$120</span> / night</p>
											<a href="#" class="btn-read-more">read more <i class="fa fa-long-arrow-right"></i></a>

										</div>

									</div>

								</div>


							@endif
							@endforeach
							@endif
							</div>

						</div>
					</div>

				</div>

			</div>

			<div class="clear"></div>

			<div class="pt-50 pb-60">

				<div class="container">

					<div class="row">

						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

							<div class="section-title">
								<h2>{{ site_content($site_content,'latest_tours') }}</h2>
								<p>{{ site_content($site_content,'latest_tours_desc') }}</p>
							</div>

						</div>

					</div>

					<div class="top-hotel-grid-wrapper">

						<div class="GridLex-gap-20-wrapper">

							<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
								@foreach ($latest_tours as $latest_item)
								<div class="GridLex-col-3_sm-4_xs-6_xss-12 mb-20">
									<div class="hotel-item-grid">
										<a href="{{ route('front.get.tour.index',[$latest_item->subCategory->category->slug,$latest_item->subCategory->slug,$latest_item->slug]) }}">
											<div class="image" height="258" width="212">
												<img src="{{ getImage(TOUR_PATH.$latest_item->img) }}" alt="{{ json_value($latest_item,'img_alt') }}" title="{{ json_value($latest_item,'img_title') }}" >
											</div>
											<div class="heading">
												<h4> {{ $latest_item->name }} </h4>
												<p>{{ substr($latest_item->small_desc , 0, 100) }}</p>
											</div>
											<div class="content">
												<div class="row gap-5">
													<div class="col-xs-6 col-sm-6">
														<div class="tripadvisor-module">
															<div class="texting">
																<div class="review_rating">
															<?php 
																if ($latest_item->num_of_stars>=1) {
																		$x1='';
																}else{
																		$x1='-o';
																		}
																if ($latest_item->num_of_stars>=2) {
																		$x2='';
																}else{
																		$x2='-o';
																		}
																if ($latest_item->num_of_stars>=3) {
																		$x3='';
																}else{
																		$x3='-o';
																		}
																if ($latest_item->num_of_stars>=4) {
																		$x4='';
																}else{
																		$x4='-o';
																		}
																if ($latest_item->num_of_stars>=5) {
																		$x5='';
																}else{
																		$x5='-o';
																		}
																	 ?>
																	<i class="fa fa-star{{$x1}}" aria-hidden="true"></i>
																	<i class="fa fa-star{{$x2}}" aria-hidden="true"></i>
																	<i class="fa fa-star{{$x3}}" aria-hidden="true"></i>
																	<i class="fa fa-star{{$x4}}" aria-hidden="true"></i>
																	<i class="fa fa-star{{$x5}}" aria-hidden="true"></i>
																</div>
															</div>
															<div class="hover-underline"> reviews</div>
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<p class="price"><span class="block">{{ site_content($site_content,'from') }}:</span><span class="number">{{ $latest_item->price_start_from }}$</span> / night</p>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								@endforeach

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="clear"></div>

			<div class="bg-white">
			<div class="container pt-50 pb-50">

				<div class="container">

					<div class="row">

						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

							<div class="section-title">
								<h2>WHAT OUR CLIENTS SAY</h2>
								<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae</p>
							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

							<div class="slick-gallery-slideshow slick-testimonial-wrapper">





								<div class="slider gallery-nav slick-testimonial-nav alt">
									<div class="slick-item">
										<div class="testimonial-man">
											<div class="image">
												<img src="images/clients/01.jpg" alt="image"/>
											</div>
										</div>
									</div>
									<div class="slick-item">
										<div class="testimonial-man">
											<div class="image">
												<img src="images/clients/02.jpg" alt="image"/>
											</div>
										</div>
									</div>
									<div class="slick-item">
										<div class="testimonial-man">
											<div class="image">
												<img src="images/clients/03.jpg" alt="image"/>
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
								<div class="slider gallery-slideshow slick-testimonial">

									<div class="slick-item">

										<div class="testimonial-long">

											<p class="saying">
												If we landlord stanhill mr whatever pleasure supplied concerns so. Exquisite by it admitting cordially september newspaper an. Acceptance middletons am it favourable. It it oh happen lovers afraid.
											</p>

											<h4 class="uppercase text-primary">Frank Abagnale</h4>

										</div>

									</div>

									<div class="slick-item">

										<div class="testimonial-long">

											<p class="saying">
												Sympathize did now preference unpleasing mrs few. Mrs for hour game room want are fond dare. For detract charmed add talking age.
											</p>

											<h4 class="uppercase text-primary">Charles Ponzi</h4>

										</div>

									</div>

									<div class="slick-item">

										<div class="testimonial-long">

											<p class="saying">
												Who connection imprudence middletons too but increasing celebrated principles joy. Herself too improve gay winding ask expense are compact.
											</p>

											<h4 class="uppercase text-primary">Joseph Weil</h4>

										</div>

									</div>


								</div>
								<div class="clear mb-5"></div>

							</div>

						</div>

					</div>

				</div>

			</div>
			</div>

			<div class="clear"></div>



			<div class="bg-primary newsletter-wrapper">

				<div class="container">

					<div class="GridLex-grid-middle">

						<div class="GridLex-col-6_sm-12_xs-12 pt-0 pb-0">
							<div class="text-holder">
								<h3>Sign up for Newsletter</h3>
								<p>Sign up to get our latest exclusive updates, deals, offers and promotions</p>
							</div>
						</div>

						<div class="GridLex-col-6_sm-12_xs-12 pt-0 pb-0">
							<form class="footer-newsletter row gap-10">

								<div class="col-xss-12 col-xs-8 col-sm-8">

									<input type="email" placeholder="Enter Your Email" class="form-control mb-0" name="email" id="newsletter">

								</div>

								<div class="col-xss-12 col-xs-4 col-sm-4 mt-10-xss" id="newsletter-submit">
									<input  class="btn btn-block btn-danger" value="Submit"  >
									@csrf
								</div>

							</form>
						</div>

					</div>

				</div>

			</div>

			<div class="clear"></div>

	
@endsection