<div class="clear"></div>

			<footer class="main-footer">

				<div class="container">

					<div class="row">

						<div class="col-sm-12 col-sm-4 col-md-4">

							<div class="row">
								<div class="footer-about col-sm-12 col-md-12">
									<div class="footer-logo">
										<a href="#home">{{ site_content($site_content,'Keep_in_touch') }}</a>
									</div>

									<p class="about-us-footer">{{ site_content($site_content,'Keep_in_touch_desc') }}<a href="#" class="font-italic bb-dotted">{{ site_content($site_content,'read_more') }}</a></p>
									<p class="about-us-footer">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										{{ site_content($site_content,'address') }}
									</p>
									<p class="about-us-footer"> <i class="fa fa-phone-square"></i> {{ site_content($site_content,'call') }} </p>
									<p class="about-us-footer"> <i class="fa fa-envelope"></i> {{ site_content($site_content,'email') }} </p>


								</div>
							</div>

						</div>

						<div class="col-sm-12 col-sm-7 col-md-8">

							<div class="row gap-20">
								@foreach ($categories->take(4) as $item)
                				@if($item->sub->count()>0)
								<div class="col-xss-12 col-xs-3 col-sm-3 mt-30-xs">

									<h4 class="footer-title">{{ $item->name }}</h4>

									<ul class="menu-footer">
										@foreach ($item->sub as $sub)
										<li><a href="{{ murl('Category/'.$item->slug.'/'.$sub->slug) }}">{{ $sub->name }}</a></li>
										@endforeach
									</ul>

								</div>
								@endif
								@endforeach

							</div>

						</div>

						<div class="col-sm-12 col-sm-12 col-md-12">
							<div class="copy_right_new">
								<div class="social_footer text-center">
									<a href="{{ json_value($settings,'facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="{{ json_value($settings,'twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a href="{{ json_value($settings,'instagram') }}"><i class="fa fa-google" aria-hidden="true"></i></a>
									<a href="{{ json_value($settings,'pinterest') }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								</div>
								<p class="copy-right font16 text-center"> {{ site_content($site_content,'all_rights_reserved') }}</p>

							</div>
						</div>

					</div>

				</div>

			</footer>



		</div>
		<!-- end Main Wrapper -->

	</div> <!-- / .wrapper -->
	<!-- end Container Wrapper -->




 <!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->


 
<!-- jQuery Cores -->
<script type="text/javascript" src="{{furl()}}/js/jquery-1.11.3.min.js"></script>



<script type="text/javascript" src="{{furl()}}/js/jquery-migrate-1.2.1.min.js"></script>

<!-- Bootstrap Js -->
<script type="text/javascript" src="{{furl()}}/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugins - serveral jquery plugins that use in this template -->
<script type="text/javascript" src="{{furl()}}/js/plugins.js"></script>

<!-- Custom js codes for plugins -->
<script type="text/javascript" src="{{furl()}}/js/customs.js"></script>

<!-- Date Piacker -->
<script type="text/javascript" src="{{furl()}}/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{furl()}}/js/customs-datepicker.js"></script>





	<script type="text/javascript" src="{{furl()}}/js/bootstrap-slider.js"></script>
	<script>
		$("#price_range_2").slider({});
		$("#star_range").slider({});
		// Without JQuery
		$(document).ready(function () {
			console.log($('#price_ranges').val());
		});
	</script>


@if(isset($tour_links))
	<!--  detail page -->
	<script type="text/javascript" src="{{furl()}}/js/infobox.js"></script>
	<script type="text/javascript" src="{{furl()}}/js/customs-detail-page.js"></script>
	@endif
	@include('front2.ajax.subscribe')
@include('front2.ajax.tours')
@include('front2.ajax.booking')

</body>




</html>