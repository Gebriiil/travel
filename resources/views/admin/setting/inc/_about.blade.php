<h3>About Us</h3>
<hr>

<div class="row">

    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>About Us</label>
                <input type="text" name="about_us_page_title" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'about_us_page_title') }} ">
            </div>
        </div>
    </div>

    
    <div class="col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-image"></i>
                </span>
                <label> Cover </label>
                <input type="file" name="about_cover_img" accept="image/*" onchange="loadFile(event)" class="form-control input-circle-right"></div>
        </div>
    </div>


    <div class="col-sm-12">
        <div class="form-group">
            <img id="output" class="privew-image" @if(site_content($siteContent,'about_cover_img')) src="{{ getImage(SETTINGS_PATH.site_content($siteContent,'about_cover_img')) }}" @endif />
        </div>
    </div>

    



    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>AboutUs Content</label>
                <textarea name="about_content" class="form-control input-circle-right count-text-desc-keywords ckeditor">{{ site_content($siteContent,'about_content') }}</textarea>
            </div>
        </div>
    </div>




</div>