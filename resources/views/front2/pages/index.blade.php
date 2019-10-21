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
												<a href="#" class="animation fromBottom transitionDelay6 transitionDuration8"><span class="bg-primary">{{ site_content($site_content,'discover') }}</span></a> 
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

					<form  action="{{murl('search')}}" method="post">
						@csrf
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-5">

								<div class="typeahead-container form-group form-icon-right">

									<label class="destination-search-3">{{ site_content($site_content,'top_destinations') }}</label>

									<div class="typeahead-field">
										<input id="destination-search-3"  type="search" autocomplete="off" class="form-control" placeholder="City or Airport" name="destination">
									</div>
									<i class="fa fa-map-marker"></i>
								</div>

							</div>

							<div class="col-xss-12 col-xs-12 col-sm-7">

								<div class="row gap-10">

									<div class="col-xss-12 col-xs-6 col-sm-5">
										<div class="form-group form-icon-right">
											<label for="dpd1">{{ site_content($site_content,'from') }}:</label>
											<input  name="from" type="number" autocomplete="off" class="form-control" placeholder="Price-start">
											<i class="fa fa-money"></i>
										</div>
									</div>
									<div class="col-xss-12 col-xs-6 col-sm-5">
										<div class="form-group form-icon-right">
											<label for="dpd2">{{ site_content($site_content,'to') }}:</label>
											<input  name="to" type="number" autocomplete="off" class="form-control" placeholder="Price-end">
											<i class="fa fa-money"></i>
										</div>
									</div>
									<div class="col-xss-12 col-xs-6 col-sm-2 btn-absolute">
										<button type="submit" class="btn btn-block btn-danger">{{ site_content($site_content,'search') }}</button>
									</div>


									<!-- <div class="col-xss-12 col-xs-6 col-sm-6">
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
									</div> -->

								</div>
							</div>



						</div>



					</form>

				</div>

			</div>

			<div class="clear"></div>

			<div class="container pt-50 pb-60">
				<div class="row">

					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

						<div class="section-title">
							<h2>{{ site_content($site_content,'top_destinations') }}</h2>
							<p>{{ site_content($site_content,'top_destinations_desc') }}</p>
						</div>

					</div>

				</div>
				<div class="top-destination-wrapper">

					<div class="GridLex-gap-20-wrapper">

						<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
							@foreach($categories as $category)
							<div class="GridLex-col-3_sm-4_xs-6_xss-12">

								<div class="top-destination-item">
									<a href="{{ route('front.get.category.index',$category->slug) }}">
										<div class="image">
											<img src="
											{{ getImage(CATEGORY_PATH.$category->img) }}" alt="{{ json_value($category,'img_alt') }}" title="{{ json_value($category,'img_title') }}">
										</div>
										<div class="content">
											<div class="row gap-10">

												<div class="col-xs-10 place">
													<h4>{{$category->name?$category->name:''}}</h4>
													<p>{{$category->country?$category->country->name:''}}</p>
												</div>
												<?php
												   $subs=$category->sub?$category->sub->count():0;
												   $sub2=0;
												   foreach($category->sub as $sub){
												   	$sub2+=$sub->tours?$sub->tours()->count():0;
												   }
												   $tour_num=$sub2;
												?>
												<div class="col-xs-2 price">
													<p>{{$tour_num}} {{ site_content($site_content,'tours') }}</p>
													<p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
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
							<?php $x++ ?>
							@if($x<=4)


								<div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">

									<div class="recent-post">

										<div class="image" style="background-image:url('{{ getImage(TOUR_PATH.$special_offers[$x]->img) }}');"></div>

										<div class="content">

											<h4> {{ $offer->name }}  </h4>
											<div class="review_rating">
												<?php 
												for($z=1;$z<=5;$z++){
													if ($special_offers[$x]->num_of_stars>=$z) {
																		$m[$z]='';
																}else{
																		$m[$z]='-o';
																		}
																	
													?>
													<i class="fa fa-star{{$m[$z]}}" aria-hidden="true"></i>
													<?php } ?>
											</div>

											<p class="price_offers"><span>{{ site_content($site_content,'from') }}</span><span class="number">{{getPrice($offer->price_start_from)}} {{getCurrency()}}</span> / {{ site_content($site_content,'night') }}</p>
											<a href="{{murl($offer->subCategory->category->slug.'/'.$offer->subCategory->slug.'/'.$offer->slug)}}" class="btn-read-more">{{ site_content($site_content,'view_more') }}<i class="fa fa-long-arrow-right"></i></a>

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
										<a href="">
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
																for($z=1;$z<=5;$z++){
																	if ($latest_item->num_of_stars>=$z) {
																						$m[$z]='';
																				}else{
																						$m[$z]='-o';
																						}
																					
																	?>
																	<i class="fa fa-star{{$m[$z]}}" aria-hidden="true"></i>
																	<?php } ?>
																</div>
															</div>
															<div class="hover-underline"> {{ site_content($site_content,'reviews') }}</div>
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<p class="price"><span class="block">{{ site_content($site_content,'from') }}:</span><span class="number">{{getPrice($latest_item->price_start_from)}} {{getCurrency()}}</span> / {{ site_content($site_content,'night') }}</p>
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
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							<div class="section-title">
								<h2>{{ site_content($site_content,'client_say') }}</h2>
								<p>{{ site_content($site_content,'client_desc') }}</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							<div class="slick-gallery-slideshow slick-testimonial-wrapper">
								<div class="slider gallery-nav slick-testimonial-nav alt">
									@foreach($clients as $client)
									<div class="slick-item">
										<div class="testimonial-man">
											<div class="image">
												<img src="{{ getImage(REVIEW_PATH.$client->img) }}" alt="image"/>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								<div class="clear"></div>
								<div class="slider gallery-slideshow slick-testimonial">
									@foreach($clients as $client)
									<div class="slick-item">

										<div class="testimonial-long">

											<p class="saying">
												{{$client->desc}}
											</p>

											<h4 class="uppercase text-primary">{{$client->name}}</h4>

										</div>

									</div>
									@endforeach
								</div>
								<div class="clear mb-5"></div>
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
								<h3>{{ site_content($site_content,'subscribe_title') }}</h3>
								<p>{{ site_content($site_content,'subscribe_desc') }}</p>
							</div>
						</div>

						<div class="GridLex-col-6_sm-12_xs-12 pt-0 pb-0">
							<form class="footer-newsletter row gap-10">

								<div class="col-xss-12 col-xs-8 col-sm-8">

									<input type="email" placeholder="Enter Your Email" class="form-control mb-0" name="email" id="newsletter">

								</div>

								<div class="col-xss-12 col-xs-4 col-sm-4 mt-10-xss" id="newsletter-submit">
									<input  class="btn btn-block btn-danger" value=">{{ site_content($site_content,'subscribe_btn') }}"  >
								</div>

							</form>
						</div>

					</div>

				</div>

			</div>

			<div class="clear"></div>

	
@endsection