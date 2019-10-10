@extends('front2.master')
@section('content')
	@if(isset($category))
		<div class="not-home">
			<!-- start Main Wrapper -->
			<div class="main-wrapper">

				<div class="breadcrumb-wrapper">

					<div class="container">

						<div class="row">

							<div class="col-xs-12 col-sm-8">
								<ol class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li><a href="#">Destinations</a></li>
									<li class="active">Destination</li>
								</ol>
							</div>

						</div>

					</div>

				</div>

				<div class="two-tone-layout left-sidebar">

					<div class="equal-content-sidebar">
						<div class="container">
							<div class="sidebar-wrapper">
								<aside>
									<div class="result-search-form-wrapper clearfix">

										<h3>Search Your Trip</h3>
										<div class="inner">
											<form class="gap-10">
												<div class="col-xs-12 col-sm-12">
													<div class="form-group form-icon-right mb-10">
														<label> Destination ?</label>
														<input type="text" class="form-control mb-0" placeholder="City or Airport" >
														<i class="fa fa-map-marker"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>Check-in</label>
														<input name="arrival_date" class="form-control mb-0" id="dpd1" placeholder="Check-in" type="text">
														<i class="fa fa-calendar"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>Check-out</label>
														<input name="departure_date" class="form-control mb-0" id="dpd2" placeholder="Check-out" type="text">
														<i class="fa fa-calendar"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="form-group">
														<label>Rooms</label>

														<select class="custom-select" id="change-search-room">
															<option value="0">Room</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4‎</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-sm-4">
													<div class="form-group">
														<label>Adults</label>
														<select class="custom-select" id="change-search-adult">
															<option value="0">Adult</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4‎</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-sm-4">
													<div class="form-group">
														<label>Children</label>
														<select class="custom-select" id="change-search-child">
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
													<button class="btn btn-block btn-primary btn-icon mt-5">Search <span class="icon"><i class="fa fa-search"></i></span></button>
												</div>

												<div class="clear mb-10"></div>

												<div class="tooltip-light">
													<p class="price-guarantee text-center hoover-help mb-0" data-toggle="tooltip" data-placement="top" title="Had denoting properly jointure you occasion directly raillery. In said to of poor full be post face snug."><i class="fa fa-check-square-o text-success"></i> EXTRETION price guarantee</p></div>

												<div class="clear"></div>

											</form>
										</div>
									</div>
									<div class="result-filter-wrapper clearfix">

										<h3><span class="icon"><i class="fa fa-sliders"></i></span> Filter</h3>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Price</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="range-slider-wrapper">
														<input id="price_range" />
													</div>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Star Rating</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="range-slider-wrapper">
														<input id="star_rating_range" />
													</div>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Amenities</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-1" name="filter_amenities" type="checkbox" class="checkbox" checked="checked" />
														<label class="" for="filter_amenities-1">Any</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-2" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-2">Shared outdoor pool</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-3" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-3">Hot tub/Jacuzzi</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-4" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-4">Satellite or cable TV</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-5" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-5">Parking</label>
													</div>
													<div id="amenities-more-less" class="collapse">
														<div class="inner">
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-6" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-6">A/C or climate control</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-7" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-7">Smoking allowed</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-8" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-8">Microwave</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-9" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-9">Dishwasher</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-10" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-10">Refrigerator</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-11" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-11">Grill</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-12" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-12">Patio / Balcony</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-13" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-13">Fitness Room</label>
															</div>
														</div>
													</div>
													<button class="btn btn-more-less" data-toggle="collapse" data-target="#amenities-more-less">Show more</button>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Room Facility</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-1" name="filter_facility" type="checkbox" class="checkbox" checked="checked" />
														<label class="" for="filter_facility-1">Any</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-2" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-2">Bathtub</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-3" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-3">Flat-screen TV</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-4" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-4">Kitchen/kitchenette</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-5" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-5">Patio</label>
													</div>
													<div id="facility-more-less" class="collapse">
														<div class="inner">
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-6" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-6">Private pool</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-7" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-7">Soundproof</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-8" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-8">Spa tub</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-9" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-9">Terrace </label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-10" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-10">Washing machine</label>
															</div>
														</div>
													</div>
													<button class="btn btn-more-less" data-toggle="collapse" data-target="#facility-more-less">Show more</button>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Radio Filter Widget</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="radio-block font-icon-radio">
														<input id="radio_block_1" name="radio_block" type="radio" class="radio" value="First Choice" checked="checked" />
														<label class="" for="radio_block_1">Apart-hotel‎</label>
													</div>

													<div class="radio-block font-icon-radio">
														<input id="radio_block_2" name="radio_block" type="radio" class="radio" value="Second Choice" />
														<label class="" for="radio_block_2">Apartment‎</label>
													</div>
													<div class="radio-block font-icon-radio">
														<input id="radio_block_3" name="radio_block" type="radio" class="radio" value="Third Choice" />
														<label class="" for="radio_block_3">Bed and Breakfast‎</label>
													</div>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Select Filter Widget</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="form-group mb-0">
														<select class="custom-select" id="gender">
															<option value="0">Please Select</option>
															<option value="1">Family-friendly‎</option>
															<option value="2">Romantic‎</option>
															<option value="3">Shopping‎</option>
															<option value="4">Spa Hotel‎</option>
															<option value="5">Luxury‎</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-20"></div>
								</aside>
							</div>
							<div class="content-wrapper">

								<div class="result-status">

									<p>found <span class="text-primary font700">256</span> Tours with availability in <span class="text-primary font700">Paris</span>. Showing 1 - 30</p>


								</div>

								<div class="sort-wrapper">

									<ul class="clearfix">

										<li class="text">Sort by: </li>
										<li class="active"><a href="#">Price <i class="fa fa-long-arrow-up"></i></a></li>
										<li><a href="#">Name</a></li>
										<li><a href="#">Rating</a></li>
										<li class="dropdown">
											<a id="area-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sort By <i class="fa fa-caret-down"></i>
											</a>
											<ul class="dropdown-menu" aria-labelledby="area-dropdown">
												<li><a >Downtown</a></li>
												<li><a >City </a></li>
											</ul>
										</li>
										<li class="list-grid active" id="list_btn"><a ><i class="fa fa-align-justify"></i></a></li>
										<li class="list-grid" id="grid_btn"><a ><i class="fa fa-th-large"></i></a></li>
									</ul>

								</div>
								@if($category)
								<div class="top-hotel-grid-wrapper" id="grid_container">

									<div class="row gap-20 min-height-alt" >
										@foreach($subs as $sub)
										@foreach($sub->tours as $tour)
										<div class="col-xss-12 col-xs-12 col-sm-6 col-mdd-6 col-md-4" data-match-height="result-grid" >

											<div class="hotel-item-grid">
										@if($tour->subCategory()->count() &&$tour->subCategory->category()->count() )
												<a href="{{murl($tour->subCategory->category->slug.'/'.$tour->subCategory->slug.'/'.$tour->slug)}}">
										@else
										<a href=""></a>
										@endif
													<div class="image">
														<img src="{{ getImage(TOUR_PATH.$tour->img) }}" alt="{{ json_value($tour,'img_alt') }}" title="{{ json_value($tour,'img_title') }}" style="height: 200px;width: 100%">
													</div>
													<div class="heading">
														<h4>  {{$tour->name}} </h4>
														<p><i class="fa fa-map-marker text-primary"></i> {{$tour->city?$tour->city.',':''}} Egypt</p>
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
																	<div class="hover-underline">324 reviews</div>
																</div>
															</div>
															<div class="col-xs-6 col-sm-6">
																<p class="price"><span class="block">start from</span><span class="number">{{getPrice($tour->price_start_from)}} {{getCurrency()}}</span> / night</p>
															</div>
														</div>
													</div>
												</a>
											</div>

										</div>
										@endforeach
										@endforeach
									</div>
									
								

								</div>
								<div class="hotel-item-list-wrapper mb-40" id="list_container" >
									<div class="hotel-item-list-wrapper mb-40" >

										@foreach($subs as $sub)
										@foreach($sub->tours as $tour)
										<div class="hotel-item-list">
												<div class="image" style="background-image:url('{{ getImage(TOUR_PATH.$tour->img) }}');"></div>
												<div class="content">
													<div class="heading">
														<h4>{{$tour->name}} </h4>
														<p><i class="fa fa-map-marker text-primary"></i> Egypt, Pyramids</p>
													</div>
													<div class="short-info">
														{{$tour->small_desc}}
													</div>
												</div>
												<div class="absolute-bottom">
													<p class="text-primary">
														@if($tour->breakfast==1)
														<i class="fa fa-check-circle"></i> Breakfast Included
														@endif
														@if($tour->wifi==1)
														 <span class="mh-10">|</span> <i class="fa fa-check-circle"></i> Free Wifi in Room</p>
														 @endif
												</div>
												<div class="absolute-right">
													<div class="meta-option">
														<a href="#" class="tripadvisor-module">
															<div class="texting">
																Very Good
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
														</a>
													</div>
													<div class="price-wrapper">
														<p class="price"><span class="block">start from</span><span class="number">{{getPrice($tour->price_start_from)}} {{getCurrency()}}</span> <span class="block">avg / night</span></p>
														@if($tour->subCategory()->count() &&$tour->subCategory->category()->count() )
														<a href="{{murl($tour->subCategory->category->slug.'/'.$tour->subCategory->slug.'/'.$tour->slug)}}" class="btn btn-danger btn-sm">Details</a>
														@endif
													</div>
												</div>
										</div>
										
										@endforeach
										@endforeach
									</div>
								</div>
								

									

								

								@endif
								
								<div class="mb-20"></div>

							</div>
						</div>
					</div>

				</div>
	@else
		<div class="not-home">
			<!-- start Main Wrapper -->
			<div class="main-wrapper">

				<div class="breadcrumb-wrapper">

					<div class="container">

						<div class="row">

							<div class="col-xs-12 col-sm-8">
								<ol class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li><a href="#">Destinations</a></li>
									<li class="active">Destination</li>
								</ol>
							</div>

						</div>

					</div>

				</div>

				<div class="two-tone-layout left-sidebar">

					<div class="equal-content-sidebar">
						<div class="container">
							<div class="sidebar-wrapper">
								<aside>
									<div class="result-search-form-wrapper clearfix">

										<h3>Search Your Trip</h3>
										<div class="inner">
											<form class="gap-10">
												<div class="col-xs-12 col-sm-12">
													<div class="form-group form-icon-right mb-10">
														<label> Destination ?</label>
														<input type="text" class="form-control mb-0" placeholder="City or Airport" >
														<i class="fa fa-map-marker"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>Check-in</label>
														<input name="arrival_date" class="form-control mb-0" id="dpd1" placeholder="Check-in" type="text">
														<i class="fa fa-calendar"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>Check-out</label>
														<input name="departure_date" class="form-control mb-0" id="dpd2" placeholder="Check-out" type="text">
														<i class="fa fa-calendar"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="form-group">
														<label>Rooms</label>

														<select class="custom-select" id="change-search-room">
															<option value="0">Room</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4‎</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-sm-4">
													<div class="form-group">
														<label>Adults</label>
														<select class="custom-select" id="change-search-adult">
															<option value="0">Adult</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4‎</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-sm-4">
													<div class="form-group">
														<label>Children</label>
														<select class="custom-select" id="change-search-child">
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
													<button class="btn btn-block btn-primary btn-icon mt-5">Search <span class="icon"><i class="fa fa-search"></i></span></button>
												</div>

												<div class="clear mb-10"></div>

												<div class="tooltip-light">
													<p class="price-guarantee text-center hoover-help mb-0" data-toggle="tooltip" data-placement="top" title="Had denoting properly jointure you occasion directly raillery. In said to of poor full be post face snug."><i class="fa fa-check-square-o text-success"></i> EXTRETION price guarantee</p></div>

												<div class="clear"></div>

											</form>
										</div>
									</div>
									<div class="result-filter-wrapper clearfix">

										<h3><span class="icon"><i class="fa fa-sliders"></i></span> Filter</h3>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Price</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="range-slider-wrapper">
														<input id="price_range" />
													</div>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Star Rating</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="range-slider-wrapper">
														<input id="star_rating_range" />
													</div>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Amenities</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-1" name="filter_amenities" type="checkbox" class="checkbox" checked="checked" />
														<label class="" for="filter_amenities-1">Any</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-2" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-2">Shared outdoor pool</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-3" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-3">Hot tub/Jacuzzi</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-4" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-4">Satellite or cable TV</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-5" name="filter_amenities" type="checkbox" class="checkbox"/>
														<label class="" for="filter_amenities-5">Parking</label>
													</div>
													<div id="amenities-more-less" class="collapse">
														<div class="inner">
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-6" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-6">A/C or climate control</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-7" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-7">Smoking allowed</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-8" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-8">Microwave</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-9" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-9">Dishwasher</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-10" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-10">Refrigerator</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-11" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-11">Grill</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-12" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-12">Patio / Balcony</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_amenities-13" name="filter_amenities" type="checkbox" class="checkbox"/>
																<label class="" for="filter_amenities-13">Fitness Room</label>
															</div>
														</div>
													</div>
													<button class="btn btn-more-less" data-toggle="collapse" data-target="#amenities-more-less">Show more</button>
												</div>
											</div>
										</div>

										<div class="another-toggle filter-toggle">
											<h4 class="active">Room Facility</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-1" name="filter_facility" type="checkbox" class="checkbox" checked="checked" />
														<label class="" for="filter_facility-1">Any</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-2" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-2">Bathtub</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-3" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-3">Flat-screen TV</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-4" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-4">Kitchen/kitchenette</label>
													</div>
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_facility-5" name="filter_facility" type="checkbox" class="checkbox"/>
														<label class="" for="filter_facility-5">Patio</label>
													</div>
													<div id="facility-more-less" class="collapse">
														<div class="inner">
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-6" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-6">Private pool</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-7" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-7">Soundproof</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-8" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-8">Spa tub</label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-9" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-9">Terrace </label>
															</div>
															<div class="checkbox-block font-icon-checkbox">
																<input id="filter_facility-10" name="filter_facility" type="checkbox" class="checkbox"/>
																<label class="" for="filter_facility-10">Washing machine</label>
															</div>
														</div>
													</div>
													<button class="btn btn-more-less" data-toggle="collapse" data-target="#facility-more-less">Show more</button>
												</div>
											</div>
										</div>

										


									</div>
									<div class="mb-20"></div>
								</aside>
							</div>
							<div class="content-wrapper">

								<div class="result-status">

									<p>found <span class="text-primary font700">256</span> Tours with availability in <span class="text-primary font700">Paris</span>. Showing 1 - 30</p>


								</div>

								<div class="sort-wrapper">

									<ul class="clearfix">

										<li class="text">Sort by: </li>
										<li class="active"><a href="#">Price <i class="fa fa-long-arrow-up"></i></a></li>
										<li><a href="#">Name</a></li>
										<li><a href="#">Rating</a></li>
										<li class="dropdown">
											<a id="area-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sort By <i class="fa fa-caret-down"></i>
											</a>
											<ul class="dropdown-menu" aria-labelledby="area-dropdown">
												<li><a href="#">Downtown</a></li>
												<li><a href="#">City </a></li>
											</ul>
										</li>
										<li class="list-grid"><a href="#"><i class="fa fa-align-justify"></i></a></li>
										<li class="list-grid active"><a href="#"><i class="fa fa-th-large"></i></a></li>
									</ul>

								</div>
								
								<div class="top-hotel-grid-wrapper">

									<div class="row gap-20 min-height-alt">
										There is no data

									</div>

								</div>
								
								<div class="result-paging-wrapper">

									<div class="row">

										<div class="col-sm-6">
											<div class="text-holder">
												Showing 1-30 from 3564
											</div>
										</div>

										<div class="col-sm-6">
											<ul class="paging">
												<li class="disable"><a href="#">&laquo;</a></li>
												<li><a href="#">1</a></li>
												<li class="active"><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#">6</a></li>
												<li><a href="#">&raquo;</a></li>
											</ul>
										</div>

									</div>

								</div>

								<div class="mb-20"></div>

							</div>
						</div>
					</div>

				</div>
				@endif

@endsection