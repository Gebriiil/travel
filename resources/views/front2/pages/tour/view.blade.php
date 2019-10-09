@extends('front2.master')
@section('content')
<div class="not-home">
			<!-- start Main Wrapper -->
			<div class="main-wrapper">

				<div class="breadcrumb-wrapper">

					<div class="container">

						<div class="row">

							<div class="col-xs-12 col-sm-8">
								<ol class="breadcrumb">
									<li><a href="#">{{ site_content($site_content,'home') }}</a></li>
									<li><a href="#">Destinations</a></li>
									<li class="active">Destination</li>
								</ol>
							</div>

						</div>

					</div>

				</div>

				<div class="two-tone-layout">

					<div class="equal-content-sidebar"> 
						<div class="container">


							<div id="sticky-sidebar" class="sidebar-wrapper ">

								<aside>
									<div class="detail-right-sidebar">
										<div class="box_price">
											<h3>DETAILS TOURS</h3>
											<span>{{$category->name}}</span>
											<p>EGYPT SHORE EXCURSIONS</p>

											<span>PRICE</span>
											<p> {{$tour->price_start_from}}$/ PERSON</p>

											<span>LOCATION</span>
											<p>{{$category->country->name}}</p>

											<span>DATE</span>
											<p>{{$tour->created_at}}</p>

											<span>HOTEL CLASS</span>
											<p>

												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>

											</p>
										</div>

										<div class="price">
											<span class="number text-left">Booking</span>
										</div>
										<div id="booking-error-msg"></div>
										<div class="detail-search-form">
											<div class="inner">
												<form class="gap-10">
													<div class="col-xs-12 col-sm-12">
														<div class="form-group form-icon-right mb-10">
															<label>Name</label>
															<input type="text" class="form-control mb-0" placeholder="name" id="namez">
															<input type="hidden" id="tour_id" value="{{$tour->id}}">
															<i class="fa fa-user"></i>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12">
														<div class="form-group form-icon-right mb-10">
															<label>Email</label>
															<input type="text" class="form-control mb-0" placeholder="Email" id="emailz">
															<i class="fa fa-envelope-o"></i>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12">
														<div class="form-group form-icon-right mb-10">
															<label>Phone</label>
															<input type="text" class="form-control mb-0" placeholder="Phone" id="phonez">
															<i class="fa fa-phone"></i>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group form-icon-right mb-10">
															<label>Nationality</label>
															<select name="custom-select-3" class="form-control styled-select" tabindex="1" id="nationality">
																@include('front.tour.countries_dropdown')
															</select>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12">
														<div class="form-group form-icon-right mb-10">
															<label>Message</label>
															<textarea type="text" class="form-control mb-0" placeholder="" id="message"></textarea>
															<!-- <i class="fa fa-map-marker"></i> -->
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<div class="form-group form-icon-right mb-10">
															<label>Check-in</label>
															<input name="dpd1" class="form-control" id="check_in_date" placeholder="Check-in" type="date"  >
															<i class="fa fa-calendar"></i>
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<div class="form-group form-icon-right mb-10">
															<label>Check-out</label>
															<input name="departure_date" class="form-control mb-0" id="check_out_date" placeholder="Check-out" type="date">
															<i class="fa fa-calendar"></i>
														</div>
													</div>
													<div class="col-xs-4 col-sm-4 col-md-4">

														<div class="form-group">
															<label>Adults</label>
															<select class="custom-select" id="adults">
																<option value="0">Adult</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4‎</option>
																<option value="5">5</option>
															</select>
														</div>
													</div>
													<div class="col-xs-4 col-sm-4">

														<div class="form-group">
															<label>Children</label>
															<select class="custom-select" id="childrens">
																<option value="0">Child</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4‎</option>
																<option value="5">5</option>
															</select>
														</div>
													</div>

													<div class="clear"></div>

													<div class="col-sm-12">
														<button class="btn btn-block btn-icon btn-primary" id="button_submit_booking">Book Now <span class="icon"><i class="fa fa-long-arrow-right"></i></span></button>
													</div>

													<div class="clear mb-10"></div>

													<div class="clear"></div>

												</form>
											</div>

										</div>


									</div>

									<div class="mb-30 mb-5-sm"></div>

								</aside>

							</div>


							<div class="content-wrapper">
								<div class="detail-header">

									<div class="row gap-5">
										<div class="col-xs-12 col-sm-8 col-md-9">
											<h2>{{ $tour->name }}</h2>
											<p class="mb-0">Egypt , Pyramids</p>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="tripadvisor-module text-right">
												<div class="raty-wrapper">
													<div class="texting text-uppercase">{{$tour->num_of_stars}} Excellent</div>
												</div>
												<div class="review_rating">
													<?php 
														for($z=1;$z<=5;$z++){
															if ($tour->num_of_stars>=$z) {
																				$m[$z]='';
																		}else{
																				$m[$z]='-o';
																				}
																					
																	?> 
																	<i class="fa fa-star{{$m[$z]}}" aria-hidden="true"></i>
																	<?php } ?>
												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="detail-content-for-sticky-menu mb-50">
									<div class="clear"></div>
									<div id="detail-content-sticky-nav-01">

										<div class="slick-gallery-slideshow">

											<div class="slider gallery-slideshow">
												@foreach ($gallary as $image)
												<div><div class="image"><img src="{{ getImage(TOUR_PATH.$image->img) }}" alt="Images" /></div></div>
												
												@endforeach

											</div>
											<div class="slider gallery-nav">
												@foreach ($gallary as $image)
												<div><div class="image"><img src="{{ getImage(TOUR_PATH.$image->img) }}" alt="Images" /></div></div>
												
												@endforeach
											</div>

										</div>

									</div>

									<div class="multiple-sticky hidden-sm hidden-xs mb-30 mt-30">

										<div class="multiple-sticky-inner">

											<div class="multiple-sticky-container">

												<div class="multiple-sticky-item clearfix">

													<ul id="multiple-sticky-menu" class="multiple-sticky-nav clearfix">
														<li>
															<a href="#detail-content-sticky-nav-01">Gallery</a>
														</li>
														<li>
															<a href="#detail-content-sticky-nav-02">{{ site_content($site_content,'overview') }}</a>
														</li>
														<li>
															<a href="#detail-content-sticky-nav-03"> {{ site_content($site_content,'itinerary') }}</a>
														</li>
														<li>
															<a href="#detail-content-sticky-nav-05">{{ site_content($site_content,'accommodation') }}</a>
														</li>
													</ul>

												</div>

											</div>

										</div>

									</div>

									<div id="detail-content-sticky-nav-02" class="pt-30">

										<div class="section-title-3 mb-40">
											<h3>Description</h3>
										</div>

										<p>{!! $tour->desc !!}</p>


										<div class="mb-30"></div>

										<h5 class="font400 text-uppercase mb-15 font16">{{ site_content($site_content,'included') }}</h5>
										<ul class="hotel-featured-list">
											{!! $tour->inclusion !!}
										</ul>

										<h5 class="font400 text-uppercase mb-15 font16">{{ site_content($site_content,'excluded') }}</h5>
										{!! $tour->exclusion !!}
										<div class="mb-30"></div>



										<div class=" row gap-20 clearfix">
											<div class="col-xs-12 col-sm-8">
												<h5 class="font400 text-uppercase mb-15 font16">Main amenities</h5>
												<ul class="list-col-2 list-with-icon">
													<li><i class="fa fa-check text-primary"></i> 350 smoke-free guestrooms</li>
													<li><i class="fa fa-check text-primary"></i> Restaurant and bar/lounge</li>
													<li><i class="fa fa-check text-primary"></i> Outdoor pool</li>
													<li><i class="fa fa-times text-danger"></i> Breakfast available</li>
													<li><i class="fa fa-check text-primary"></i> Fitness center</li>
													<li><i class="fa fa-check text-primary"></i> Self parking</li>
													<li><i class="fa fa-times text-danger"></i> 4 meeting rooms</li>
													<li><i class="fa fa-times text-danger"></i> Childcare</li>
													<li><i class="fa fa-check text-primary"></i> 24-hour front desk</li>
													<li><i class="fa fa-check text-primary"></i> Air conditioning</li>
													<li><i class="fa fa-check text-primary"></i> Daily housekeeping</li>
													<li><i class="fa fa-check text-primary"></i> Laundry service</li>
												</ul>
											</div>
											<div class="col-xs-12 col-sm-4">
												<h5 class="font400 text-uppercase mb-15 font16">What’s around</h5>
												<ul class="list-with-icon">
													<li><i class="fa fa-map-marker text-primary"></i> In North Bridge Road</li>
													<li><i class="fa fa-map-marker text-primary"></i> Bugis Junction Shopping Center (0.2 mi / 0.4 km)</li>
													<li><i class="fa fa-map-marker text-primary"></i> National Museum of Singapore (0.5 mi / 0.8 km)</li>
													<li><i class="fa fa-map-marker text-primary"></i> Esplanade Mall (0.7 mi / 1.2 km)</li>
													<li><i class="fa fa-map-marker text-primary"></i> Suntec City (0.8 mi / 1.2 km)</li>
												</ul>
											</div>
										</div>

										<div class="bb mt-10"></div>

									</div>
									<div id="detail-content-sticky-nav-03" class="pt-30">

										<div class="section-title-3">
											<h3>{{ site_content($site_content,'itinerary') }}</h3>
										</div>

										<div class="clear"></div>

										<div class="con_tab_view">
											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												@foreach ($itineraries as $itinerary)
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																{{ $itinerary->title }}
															</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															{!! $itinerary->desc !!}
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>

										<div class="clear"></div>

										<div class="bb mt-30"></div>

									</div>
									

									<div id="detail-content-sticky-nav-05" class="pt-30">

										<div class="section-title-3">
											<h3>Accommodation</h3>
										</div>

										<div class="room-type-wrapper">
											{!! $category->childrens_policy !!}
											<!-- <div class="room-type-item">
												<div class="image">
													<img src="images/detail-gallery/thumb/01.jpg" alt="Image">
												</div>
												<div class="content">
													<h3>Deluxe Room</h3>
													<p><strong>Includes</strong> : Free Parking, Breakfast, VAT</p>
													<p><strong>Maxinum</strong> : 4 Persons</p>
												</div>
												<div class="content-right">
													<span class="number">$187</span>
													Total for 1 room, 2 nights
													<div class="clear"></div>
													<button class="btn btn-sm btn-danger">Select</button>
												</div>
											</div>

											<div class="room-type-item">
												<div class="image">
													<img src="images/detail-gallery/thumb/02.jpg" alt="Image">
												</div>
												<div class="content">
													<h3>Deluxe Room (Executive)</h3>
													<p><strong>Includes</strong> : Free Parking, Breakfast, VAT</p>
													<p><strong>Maxinum</strong> : 4 Persons</p>
													<p class="text-danger absolute"><strong>Hurry up! Only 3 rooms left</strong></p>
												</div>
												<div class="content-right">
													<span class="number">$187</span>
													Total for 1 room, 2 nights
													<div class="clear"></div>
													<button class="btn btn-sm btn-danger">Select</button>
												</div>
											</div>

											<div class="room-type-item">
												<div class="image">
													<img src="images/detail-gallery/thumb/03.jpg" alt="Image">
												</div>
												<div class="content">
													<h3>Executive Deluxe Marina Bay View</h3>
													<p><strong>Includes</strong> : Free Parking, Breakfast, VAT</p>
													<p><strong>Maxinum</strong> : 4 Persons</p>
													<p class="text-danger absolute"><strong>Hurry up! Only 3 rooms left</strong></p>
												</div>
												<div class="content-right">
													<span class="number">$187</span>
													Total for 1 room, 2 nights
													<div class="clear"></div>
													<button class="btn btn-sm btn-danger">Select</button>
												</div>
											</div> -->

										</div>

									</div>



								</div>
							</div>


						</div>

					</div>

				</div>

				<div class="bg-main">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="section-title-related">
									<h2>RELATED TOURS</h2>
									<p>Egypt us tours offers Egypt and Jordan combined tours, check Egypt and jordan different itinerary and enjoy our Egypt Jordan tour packages, also check other multiculture tours</p>
								</div>
							</div>
						</div>
						<div class="top-hotel-grid-wrapper">
							<div class="GridLex-gap-20-wrapper">
								<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
									@foreach($sub_category->tours as $tour)
									<div class="GridLex-col-3_sm-4_xs-6_xss-12 mb-20">
										<div class="hotel-item-grid">
											@if($tour->subCategory()->count() &&$tour->subCategory->category()->count() )
												<a href="{{murl($tour->subCategory->category->slug.'/'.$tour->subCategory->slug.'/'.$tour->slug)}}">
											@else
											<a href="#">
											@endif
												<div class="image">
													<img src="{{ getImage(TOUR_PATH.$tour->img) }}" alt="">
												</div>
												<div class="heading">
													<h4> {{$tour->name}} </h4>
													<p><i class="fa fa-map-marker text-primary"></i> Cairo, Egypt</p>
												</div>
												<div class="content">
													<div class="row gap-5">
														<div class="col-xs-6 col-sm-6">
															<div class="tripadvisor-module">
																<div class="texting">
																	<div class="review_rating">
																		<?php 
																	for($z=1;$z<=5;$z++){
																		if ($tour->num_of_stars>=$z) {
																				$m[$z]='';
																		}else{
																				$m[$z]='-o';
																				}
																					
																	?> 
																	<i class="fa fa-star{{$m[$z]}}" aria-hidden="true"></i>
																	<?php } ?>
																	</div>
																</div>
																<!-- <div class="hover-underline">324 reviews</div> -->
															</div>
														</div>
														<div class="col-xs-6 col-sm-6">
															<p class="price"><span class="block">start from</span><span class="number">{{$tour->price_start_from}}$</span> / night</p>
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
@endsection