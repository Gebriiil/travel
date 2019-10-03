<h3>Search Results</h3>
<hr>

<div class="row">

    <div class="col-sm-4">
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-text-width"></i>
                </span>
             
                <label>SEARCH RESULTS </label>
                <input type="text"  name="search_results" class="form-control input-circle-right count-text-desc-keywords"
                value="{{ site_content($siteContent,'search_results') }} "> 
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
              

                    <input type="file" name="search_cover_image" accept="image/*"  onchange="loadFile(event)"
                           class="form-control input-circle-right"></div>
            </div>
    </div>

    <div class="col-sm-12">
            <div class="form-group">
                <img id="output2" class="privew-image2"
                    
                      src="{{ getImage(SETTINGS_PATH.site_content($siteContent,'search_cover_image')) }}"  />
            </div>
    </div>

    
    
    
     
    

</div>








