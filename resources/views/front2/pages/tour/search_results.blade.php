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

										<h3>{{ site_content($site_content,'Search_Your_Trip') }}</h3>
										<div class="price">
											<span id="booking-error-msg-sub"></span>
										</div>
										<div class="inner">
											<div class="gap-10">
												<div class="col-xs-12 col-sm-12">
													<div class="form-group form-icon-right mb-10">
														<label> {{ site_content($site_content,'destination') }} ?</label>
														<input type="text" class="form-control mb-0" placeholder="City or Airport" id="destination-in-subpage">
														<i class="fa fa-map-marker"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>{{ site_content($site_content,'from') }}</label>
														<input  name="from" type="number" autocomplete="off" class="form-control" placeholder="Price-start" id="from-in-subpage">
														<i class="fa fa-money"></i>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group form-icon-right mb-10">
														<label>{{ site_content($site_content,'to') }}</label>
														<input  name="to" type="number" autocomplete="off" class="form-control" placeholder="Price-end" id="to-in-subpage">
														<i class="fa fa-money"></i>
													</div>
												</div>
												<!-- <div class="col-xs-12 col-sm-4">
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
												</div> -->

												<div class="clear"></div>

												<div class="col-sm-12">
													<button class="btn btn-block btn-primary btn-icon mt-5" id="search-subpage">{{ site_content($site_content,'search') }} <span class="icon"><i class="fa fa-search"></i></span></button>
												</div>

												<div class="clear mb-10"></div>

												<!-- <div class="tooltip-light">
													<p class="price-guarantee text-center hoover-help mb-0" data-toggle="tooltip" data-placement="top" title="Had denoting properly jointure you occasion directly raillery. In said to of poor full be post face snug."><i class="fa fa-check-square-o text-success"></i> EXTRETION price guarantee</p></div> -->

												<div class="clear"></div>

											</div>
										</div>
									</div>
									<div class="result-filter-wrapper clearfix">

										<h3><span class="icon"><i class="fa fa-sliders"></i></span> Filter</h3>

										<h4 class="active">{{ site_content($site_content,'price') }}</h4>
										<input id="price_range" type="text" class="span2" value="" data-slider-min="10" data-slider-max="2000" data-slider-step="5" data-slider-value="[250,450]"/><br><br><center>
													<button class="btn " data-toggle="collapse" data-target="#amenities-more-less" id="price-filter-tours-btn">{{ site_content($site_content,'Show') }}</button>
												</center>
												<br>
												<h4 class="active">{{ site_content($site_content,'star') }}</h4>
												<input id="star_range" type="text" class="span2" value="" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="[250,450]"/><br><br><center>
													<button class="btn " data-toggle="collapse" data-target="#amenities-more-less" id="star-filter-tours-btn">{{ site_content($site_content,'Show') }}</button>
												</center>
												<br>

										<div class="another-toggle filter-toggle">
											<h4 class="active">{{ site_content($site_content,'amenities') }}</h4>
											<div class="another-toggle-content">
												<div class="another-toggle-inner">
													@foreach($tags as $tag)
													<div class="checkbox-block font-icon-checkbox">
														<input id="filter_amenities-1" name="filter_amenities[]" type="checkbox" class="checkbox" checked="checked" value="{{$tag->id}}" id="filter_amenities" />
														<label class="" for="filter_amenities-1">{{$tag->name}}</label>
													</div>
													@endforeach
													<button class="btn " data-toggle="collapse" data-target="#amenities-more-less" id="tags-filter-tours-btn">{{ site_content($site_content,'Show') }}</button>
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

										<!-- <li class="text">Sort by: </li>
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
										</li> -->
										<li class="list-grid active" id="list_btn"><a ><i class="fa fa-align-justify"></i></a></li>
										<li class="list-grid" id="grid_btn"><a ><i class="fa fa-th-large"></i></a></li>
									</ul>

								</div>
								<div id="tours-containers-ajax">
									@if(count($tours))
									<div class="top-hotel-grid-wrapper" id="grid_container">

										<div class="row gap-20 min-height-alt" >
											@foreach($tours as $tour)
											<div class="col-xss-12 col-xs-12 col-sm-6 col-mdd-6 col-md-4" data-match-height="result-grid" >

												<div class="hotel-item-grid">
											@if($tour->subCategory()->count() &&$tour->subCategory->category()->count() )
													<a href="{{murl($tour->subCategory->category->slug.'/'.$tour->subCategory->slug.'/'.$tour->slug)}}">
											@endif
														<div class="image">
															<img src="{{ getImage(TOUR_PATH.$tour->img) }}" alt="{{ json_value($tour,'img_alt') }}" title="{{ json_value($tour,'img_title') }}">
														</div>
														<div class="heading">
															<h4>  {{$tour->name}} </h4>
															<p><i class="fa fa-map-marker text-primary"></i> {{$tour->city}}, Egypt</p>
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
																		<div class="hover-underline">324 {{ site_content($site_content,'reviews') }}</div>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<p class="price"><span class="block">{{ site_content($site_content,'start_from') }}</span><span class="number">{{$tour->price_start_from}}$</span> / {{ site_content($site_content,'night') }}</p>
																</div>
															</div>
														</div>
													</a>
												</div>

											</div>
											
											@endforeach
										</div>
										
									

									</div>
									<div class="hotel-item-list-wrapper mb-40" id="list_container" >
										<div class="hotel-item-list-wrapper mb-40" >
											@foreach($tours as $tour)
											<div class="hotel-item-list">
													<div class="image" style="background-image:url('{{ getImage(TOUR_PATH.$tour->img) }}');"></div>
													<div class="content">
														<div class="heading">
															<h4>{{$tour->name}} </h4>
															<p><i class="fa fa-map-marker text-primary"></i> Egypt, {{$tour->city}}</p>
														</div>
														<div class="short-info">
															{{$tour->small_desc}}
														</div>
													</div>
													<div class="absolute-bottom">
														<p class="text-primary"><i class="fa fa-check-circle"></i> Breakfast Included <span class="mh-10">|</span> <i class="fa fa-check-circle"></i>{{ site_content($site_content,'free_wifi') }}</p>
													</div>
													<div class="absolute-right">
														<div class="meta-option">
															<a href="#" class="tripadvisor-module">
																<div class="texting">
																	{{ site_content($site_content,'very_good') }}
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
															<p class="price"><span class="block">start from</span><span class="number">{{$tour->price_start_from}}$</span> <span class="block">avg / {{ site_content($site_content,'night') }}</span></p>
															<a href="#" class="btn btn-danger btn-sm">{{ site_content($site_content,'Details') }}</a>
														</div>
													</div>
											</div>
											@endforeach
										</div>
									</div>
									

										

									
									@else
									<h3>{{ site_content($site_content,'no_data') }}</h3>
									@endif
								</div>
								
								<div class="mb-20"></div>

							</div>
						</div>
					</div>

				</div>
	


@endsection