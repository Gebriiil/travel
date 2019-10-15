@if($tours)
								<div class="top-hotel-grid-wrapper" id="grid_container">

									<div class="row gap-20 min-height-alt" >
										
										@if($tours->count()!=0)
										@foreach($tours as $tour)
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
										@else
											<h2>There is no data</h2>
										@endif
									</div>
									
								

								</div>
								<div class="hotel-item-list-wrapper mb-40" id="list_container" >
									<div class="hotel-item-list-wrapper mb-40" >

										@if($tours->count()!=0)
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
														<a href="{{murl($tour->subCategory->category->slug.'/'.$tour->subCategory->slug.'/'.$tour->slug)}}" class="btn btn-danger btn-sm">{{ site_content($site_content,'Details') }}</a>
														@endif
													</div>
												</div>
										</div>
										
										
										@endforeach
										@else
											<h2>{{ site_content($site_content,'no_data') }}</h2>
										@endif
									</div>
								</div>
								

									

								

								@else
								<h1>{{ site_content($site_content,'no_data') }}</h1>
								@endif