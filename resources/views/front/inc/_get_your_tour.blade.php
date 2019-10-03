  <!-- Why Choose Us -->
  <div class="h4-count-down text-center">
    <div class="sc-content-overlay">
        <div class="container">
            <div class="empty-space"></div>
            <div class="sc-count-down">
                <h3 class="title">
                        {{ site_content($site_content,'discount_title') }}
                </h3>
                <p class="sub-title">   {{ site_content($site_content,'discount_desc') }}</p>

                @if(strlen(site_content($site_content,'get_your_tour_link'))>0)
                <a target="_blanck" href="{{ site_content($site_content,'get_your_tour_link') }}" class=" btn-get-tour">
                        <i class="fa fa-map-marker"></i>{{ site_content($site_content,'get_your_tour_title') }}</a>
                @endif
               
            </div>
            <div class="empty-space" style="height: 90px;"></div>
        </div>
    </div>
</div>