<!-- WHAT OUR CLIENTS SAY -->
<div class="h4-group-video-testimonial mt-5">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <div class="sc-testimonial style-04">
                    <div class="slider owl-carousel owl-theme">


                        @foreach ($reviews as $review)
                        <div class="item">
                                <div class="description">
                                    {{ $review->desc }}
                                </div>
                                <div class="rating"><span class="rating-star"></span></div>
                                <div class="author clearfix">
                                    <img src="{{ getImage(REVIEW_PATH.$review->img) }}" 
                                    alt="{{ json_value($review,'img_alt') }}" title="{{ json_value($review,'img_title') }}">
                                    <div class="info">
                                        <div class="name">{{ $review->title }}</div>
                                        <div class="regency">{{ $review->name }}</div>
                                    </div>
                                </div>
                            </div>
    
                        @endforeach
                        
                       
                        


                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="sc-video style-02">
                    <div class="background-video">
                        <div class="cover-image"></div>
                        <div class="content container">
                            <i class="video-play ion-ios-play"></i>
                            <h4 class="title-video">{{ json_value($settings,'site_name') }}</h4>
                        </div>
                        <video loop="" class="full-screen-video" data-autoplay="">
                            <source src="{{ getImage(SETTINGS_PATH.json_value($settings,'video')) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
