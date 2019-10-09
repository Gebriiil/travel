	<div id="introLoader" class="introLoading"></div>


	<!-- start Container Wrapper -->
	<div class="container-wrapper colored-navbar-brand">

		<!-- start Header -->
		<header id="header" class="overflow-x-hidden-xss">
	  
			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-default navbar-fixed-top with-slicknav">
				
				<div class="container">
						
					<div class="navbar-header">
						<a class="navbar-brand" href="{{murl('/')}}"> <img src="{{furl()}}/images/logo.png" class="logo_main"> </a>
					</div>
						
					<div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">
					
						<ul class="nav navbar-nav" id="responsive-menu">
							<li><a href="{{murl('/')}}">Home </a></li>
							<li>
								<a href="#">DAY TOURS</a>
								<ul>
									<li><a href="#">SHARM EL SHEIKH</a></li>
									<li><a href="#">GIZA</a></li>
									<li><a href="#">ALEXANDRIA</a></li>
									<li><a href="#">DAHAB</a></li>
									<li><a href="#">LUXOR</a></li>
									<li><a href="#">ASWAN</a></li>
									<li><a href="#">HURGHADA</a></li>
									<li><a href="#">CAIRO</a></li>

								</ul>
							</li>

							<li><a href="#">SPIRITUAL TOURS <span class="caret"></span> </a>
								<ul>
									<li><a href="#">SHARM EL SHEIKH</a></li>
									<li><a href="#">Egypt Spiritual Tour</a></li>
									<li><a href="#">ALEXANDRIA</a></li>
									<li><a href="#">DAHAB</a></li>
								</ul>
							</li>
							<li><a href="#">EGYPT SHORE EXCURSIONS <span class="caret"></span> </a>
								<ul>
									<li><a href="#">Alexandria Short Excursions</a></li>
									<li><a href="#">Safaga Shore Excursions</a></li>
									<li><a href="#">Port Said Shore Excursions</a></li>
									<li><a href="#">Aqaba Shore Excursions</a></li>
								</ul>
							</li>
							<li><a href="#">EGYPT TRAVEL PACKAGES <span class="caret"></span> </a>
								<ul>
									<li><a href="#">Egypt Classic Tours</a></li>
									<li><a href="#">Red Sea packages</a></li>
									<li><a href="#">Honeymoon Packages</a></li>
									<li><a href="#">Safari Egypt</a></li>
									<li><a href="#">Egypt Short Tours</a></li>
									<li><a href="#">Egypt Budget Tours</a></li>
								</ul>
							</li>
							<li><a href="#">CONTACT US</a></li>

						</ul>
					
					</div><!--/.nav-collapse -->
					
					<div class="pull-right">
					
						<div class="navbar-mini">
							<ul class="clearfix">
								<li class="dropdown bt-dropdown-click">
									<a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="ion-social-usd hidden-xss"></i> Dollar
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="currency-dropdown">
										<li><a href="#"><i class="ion-social-usd"></i> Dollar</a></li>
										<li><a href="#"><i class="ion-social-euro"></i> Europe</a></li>
										<li><a href="#"><i class="ion-social-yen"></i> Yen</a></li>
									</ul>
								</li>
								<li class="dropdown bt-dropdown-click">
									<a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="ion-android-globe hidden-xss"></i> English
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="language-dropdown">
                                    @foreach (languages() as $item)
                                    <li>
                                        <a href="{{ route('front.get.home.switch.language',$item->symbol) }}">
                                        <img style="height: 20px;width:20px;display: inline"
                                        alt="{{ $item->name }}" title="{{ $item->name }}"
                                        src="{{ getImage(LANGUAGE_PATH.$item->icon) }}">
                                        <p style="display: inline">{{ $item->name }}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                  
                                </ul>
								</li>
							</ul>
						</div>
						
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>
		<!-- end Header -->