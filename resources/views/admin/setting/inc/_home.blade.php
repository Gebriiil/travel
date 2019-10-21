<h3>@lang('site.home')</h3>
<hr>

<div class="row">

    <h4>Navbar</h4>

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Home</label>
                <input type="text" placeholder="Home" name="home" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'home') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
            <div class="form-group">
                 <div class="input-group">
                     <span class="input-group-addon input-circle-left">
                         <i class="fa fa-text-width"></i>
                     </span>
                  
                     <label>Need Help Call Us Now ?</label>
                     <input type="text" name="need_help" class="form-control input-circle-right count-text-desc-keywords"
                     value="{{ site_content($siteContent,'need_help') }} "> 
                 </div>
             </div>
         </div>
  
         

    <div class="col-sm-4">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Contact</label>
                 <input type="text" placeholder="Contact" name="contact" class="form-control input-circle-right count-text-desc-keywords"
                 value="{{ site_content($siteContent,'contact') }} "> 
             </div>
         </div>
     </div>
  
    
</div>


<div class="row">

    <h4>Section 1 (Search Section)</h4>

    
    <div class="col-sm-4">
            <div class="form-group">
                 <div class="input-group">
                     <span class="input-group-addon input-circle-left">
                         <i class="fa fa-text-width"></i>
                     </span>
                  
                     <label>Discover</label>
                     <input type="text"  name="discover" class="form-control input-circle-right count-text-desc-keywords"
                     value="{{ site_content($siteContent,'discover') }} "> 
                 </div>
             </div>
         </div>

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>FIND YOUR TRIP</label>
                <input type="text"  name="find_your_trip" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'find_your_trip') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>From</label>
                 <input type="text"  name="from" class="form-control input-circle-right count-text-desc-keywords"
                 value="{{ site_content($siteContent,'from') }} "> 
             </div>
         </div>
    </div>
  
    <div class="col-sm-4">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>To</label>
                 <input type="text"  name="to" class="form-control input-circle-right count-text-desc-keywords"
                 value="{{ site_content($siteContent,'to') }} "> 
             </div>
         </div>
    </div>
  
    <div class="col-sm-4">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Search</label>
                 <input type="text"  name="search" class="form-control input-circle-right count-text-desc-keywords"
                 value="{{ site_content($siteContent,'search') }} "> 
             </div>
         </div>
    </div>


</div>




<div class="row">
    <h4>Section 2 (Top Destinations Section)</h4>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Top Destinations Title</label>
                <input type="text"  name="top_destinations" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'top_destinations') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
            <div class="form-group">
                 <div class="input-group">
                     <span class="input-group-addon input-circle-left">
                         <i class="fa fa-text-width"></i>
                     </span>
                  
                     <label>More Info</label>
                     <input type="text"  name="more_info" class="form-control input-circle-right count-text-desc-keywords"
                     value="{{ site_content($siteContent,'more_info') }}"> 
                 </div>
             </div>
         </div>
         
    <div class="col-sm-9">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Top Destinations Description</label>
                 <textarea name="top_destinations_desc"  class="form-control input-circle-right count-text-desc-keywords">{{ site_content($siteContent,'top_destinations_desc') }}</textarea>
             </div>
         </div>
    </div>

   
    
         

</div>




<div class="row">
    <h4>Section 3 (Discount Section)</h4>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Discount Title</label>
                <input type="text"  name="discount_title" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'discount_title') }} "> 
            </div>
        </div>
    </div>

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Get your tour title</label>
                <input type="text"  name="get_your_tour_title" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'get_your_tour_title') }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Get your tour link</label>
                <input type="text"  name="get_your_tour_link" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'get_your_tour_link') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-9">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Discount Description</label>
                 <textarea name="discount_desc"  class="form-control input-circle-right count-text-desc-keywords">{{ site_content($siteContent,'discount_desc') }}</textarea>
             </div>
         </div>
    </div>
</div>







<div class="row">
    <h4>Section 4 (Special Offers  Section)</h4>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Special Offers</label>
                <input type="text"  name="special_offers" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'special_offers') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-9">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Special Offers Description</label>
                 <textarea name="special_offers_desc"  class="form-control input-circle-right count-text-desc-keywords">{{ site_content($siteContent,'special_offers_desc') }}</textarea>
             </div>
         </div>
    </div>
</div>





<div class="row">
    <h4>Section 5 (Latest Tours  Section)</h4>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Latest Tours </label>
                <input type="text"  name="latest_tours" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'latest_tours') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-9">
        <div class="form-group">
             <div class="input-group">
                 <span class="input-group-addon input-circle-left">
                     <i class="fa fa-text-width"></i>
                 </span>
              
                 <label>Latest Tours  Description</label>
                 <textarea name="latest_tours_desc"  class="form-control input-circle-right count-text-desc-keywords">{{ site_content($siteContent,'latest_tours_desc') }}</textarea>
             </div>
         </div>
    </div>
</div>


<div class="row">
    <h4>Footer</h4>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Subscribe Title </label>
                <input type="text"  name="subscribe_title" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'subscribe_title') }} "> 
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Subscribe Button </label>
                <input type="text"  name="subscribe_btn" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'subscribe_btn') }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>Subscribe Desc </label>
                <input type="text"  name="subscribe_desc" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'subscribe_desc') }} "> 
            </div>
        </div>
    </div>
    

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>Email </label>
                <input type="text"  name="email" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'email') }} "> 
            </div>
        </div>
    </div>
    

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>Contact Us </label>
                <input type="text"  name="contact_us" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'contact_us') }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>WHAT OUR CLIENTS SAY</label>
                <input type="text"  name="client_say" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'client_say')?site_content($siteContent,'client_say'):'' }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>CLIENTS SAY Description</label>
                <input type="text"  name="client_desc" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'client_desc')?site_content($siteContent,'client_desc'):'' }} "> 
            </div>
        </div>
    </div>

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>© 2019  All rights reserved </label>
                <input type="text"  name="all_rights_reserved" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'all_rights_reserved') }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>Keep in touch</label>
                <input type="text"  name="Keep_in_touch" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'Keep_in_touch') }} "> 
            </div>
        </div>
    </div>    
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>Keep in touch desc</label>
                <input type="text"  name="Keep_in_touch_desc" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'Keep_in_touch_desc') }} "> 
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
                <label>Address</label>
                <input type="text"  name="address" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'address') }} "> 
            </div>
        </div>
    </div>
    
    
    
</div>


