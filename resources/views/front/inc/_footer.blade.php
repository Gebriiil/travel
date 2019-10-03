<div class="social_me">

    <a href="{{ json_value($settings,'facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="{{ json_value($settings,'twitter') }}" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="{{ json_value($settings,'instagram') }}" target="_blank"><i class="fa fa-instagram"></i></a>
    <a href="{{ json_value($settings,'pinterest') }}" target="_blank"><i class="fa fa-pinterest"></i></a>
    <a href="{{ json_value($settings,'youtube') }}" target="_blank"><i class="fa fa-youtube"></i></a>

</div>

  <!-- Footer -->
  <footer id="colophon" class="site-footer footer_v4">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget-text">
                        <p class="info-text">{{ site_content($site_content,'subscribe_title') }}</p>
                        <div class="widget-newsletter">
                            <form  method="post">
                                <input type="email" id="email" name="EMAIL" placeholder="{{ site_content($site_content,'email') }}" required="">
                                <button type="submit" id="subscribe_btn">{{ site_content($site_content,'subscribe_btn') }}</button>
                                <span id="error-msg"></span>
                            </form>
                        </div>
                        <ul class="social-link">
                            <li><a target="_blank" class="facebook" href="{{ json_value($settings,'facebook') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" class="twitter" href="{{ json_value($settings,'twitter') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" class="instagram" href="{{ json_value($settings,'instagram') }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" class="pinterest" href="{{ json_value($settings,'pinterest') }}"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>


                <?php 
                 $footer_item_count = 0;
                ?>
                @foreach ($categories as $footer_item)
                @if($footer_item->show_in_footer=='yes' &&  $footer_item_count<=3)
                <?php  $footer_item_count++;?>
                <div class="col-sm-2">
                        <div class="widget-menu ">
                            <h3 class="widget-title"><a href="{{ route('front.get.category.index',$footer_item->slug) }}">{{ $footer_item->name }}</a></h3>
                            <ul class="menu column-2 menu-f-new">
                                @foreach($footer_item->sub as $sub_item)
                                <li><a href="{{ route('front.get.subCategory.index',[$footer_item->slug,$sub_item->slug]) }}">{{ $sub_item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                @endif
                @endforeach
               

                


                <div class="col-sm-3">
                    <div class="widget-menu">
                        <h3 class="widget-title">{{ site_content($site_content,'contact_us') }}</h3>
                        <div class="footer-location">
                            <ul class="info">
                                <li class="clearfix"><i class="fa fa-phone"></i><a href="tel:{{ json_value($settings,'phone') }}">{{ json_value($settings,'phone') }}</a></li>
                                <li class="clearfix"><i class="fa fa-envelope"></i><a href="mailto:{{ json_value($settings,'email') }}">{{ json_value($settings,'email') }}</a></li>
                                <li class="clearfix"><i class="fa fa-fax"></i><a href="tel:{{ json_value($settings,'fax') }}">{{ json_value($settings,'fax') }}</a></li>
                                <li class="address clearfix"><i class="fa fa-map-marker"></i> <a>{{ json_value($settings,'address') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="copyright-content col-sm-12">
                    <p class="copyright-text">
                            <a href="https://www.seoera.net/en">SeoEra</a> {{ site_content($site_content,'all_rights_reserved') }}
                   </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="social_new">
    <a href="https://www.tripadvisor.com/Attraction_Review-g294202-d17543611-Reviews-Signature_Tours_egypt-Giza_Giza_Governorate.html?m=55595" target="_blank"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
    <a href="https://wa.me/+201012999366" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
</div>
