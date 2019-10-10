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
							@foreach ($categories->take(4) as $item)
                			@if($item->sub->count()>0)
							<li>
								<a href="#">{{ $item->name }}</a>
								<ul>
									@foreach ($item->sub as $sub)
									<li><a href="{{ murl('Category/'.$item->slug.'/'.$sub->slug) }}">{{ $sub->name }}</a></li>
									@endforeach
								</ul>
							</li>
							@endif
							@endforeach
							<li><a href="#">CONTACT US</a></li>

						</ul>
					
					</div><!--/.nav-collapse -->
					
					<div class="pull-right">
					
						<div class="navbar-mini">
							<ul class="clearfix">
								<li class="dropdown bt-dropdown-click">
									<a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="ion-social-usd hidden-xss"></i> {{getCurrency()}}
									</a>
									<ul class="dropdown-menu" aria-labelledby="currency-dropdown">
										<li><a href="/switch-currency/USD"><i class="ion-social-usd"></i> Dollar</a></li>
										<li><a href="/switch-currency/EUR"><i class="ion-social-euro"></i> Europe</a></li>
										<li><a href="/switch-currency/YER"><i class="ion-social-yen"></i> Yen</a></li>
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