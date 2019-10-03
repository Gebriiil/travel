<h3>Contact Us</h3>
<hr>

<div class="row">

    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>CONTACT US</label>
                <input type="text" name="contact_us_page_title" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'contact_us_page_title') }} ">
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
                <input type="file" name="contact_cover_img" accept="image/*" onchange="loadFile(event)" class="form-control input-circle-right"></div>
        </div>
    </div>


    <div class="col-sm-12">
        <div class="form-group">
            <img id="output" class="privew-image" @if(site_content($siteContent,'contact_cover_img')) src="{{ getImage(SETTINGS_PATH.site_content($siteContent,'contact_cover_img')) }}" @endif />
        </div>
    </div>



    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Contact Details</label>
                <input type="text" name="contact_details" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'contact_details') }} ">
            </div>
        </div>
    </div>




    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Call</label>
                <input type="text" name="call" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'call') }} ">
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Fax</label>
                <input type="text" name="fax" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'fax') }} ">
            </div>
        </div>
    </div>



    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>SEND MESSAGE (Form Title)</label>
                <input type="text" name="send_message_title" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'send_message_title') }} ">
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Form Description</label>
                <textarea name="form_desc" class="form-control input-circle-right count-text-desc-keywords">{{ site_content($siteContent,'form_desc') }}</textarea>
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Your Name</label>
                <input type="text" name="your_name" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'your_name') }} ">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Your Country</label>
                <input type="text" name="your_country" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'your_country') }} ">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Your Email</label>
                <input type="text" name="your_email" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'your_email') }} ">
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Your Phone</label>
                <input type="text" name="your_phone" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'your_phone') }} ">
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Message Title</label>
                <input type="text" name="msg_title" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'msg_title') }} ">
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Your Message</label>
                <input type="text" name="your_msg" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'your_msg') }} ">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>

                <label>Send Message Button</label>
                <input type="text" name="send_message_btn" class="form-control input-circle-right count-text-desc-keywords" value="{{ site_content($siteContent,'send_message_btn') }} ">
            </div>
        </div>
    </div>


</div>