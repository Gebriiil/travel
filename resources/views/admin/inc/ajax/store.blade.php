
<!-- Store New Data  -->


<script type="text/javascript">
          
      
  $("#form-add").submit(function(e) 
    {
      var el = $(this); 

         e.preventDefault();
         

         if ($(".ckeditor")[0]){
                    // Do something if class exists
                    for ( instance in CKEDITOR.instances )
                      {
                      CKEDITOR.instances[instance].updateElement();
                      }
        } 

                
        var formData  = new FormData(jQuery('#form-add')[0]);


      $.ajax({
          type: "POST",
          url: "{{ $route }}",
          data:formData,
          contentType: false,
          processData: false,
          beforeSend:function()
          {
              
              $("#coverloading").css("display","block");
              el.find("button").prop( "disabled", true );
          },
          success: function (data) 
          {
              $("#coverloading").css("display","none");
              el.find("button").prop( "disabled", false );
              el.find(".form-group input").val('');
              el.find(".form-group textarea").val('');
              //alert("{{ trans('site.added_success') }}")

              $("#success-container").css("display","block");
              $("#errors-container").css("display","none");
              $("#success").html('');
              $("#success").append("<li class='alert alert-success text-center'>{{ trans('site.added_success') }}</li>")

              $(".privew-image").removeAttr("src");
              $(".privew-image2").removeAttr("src");

          }, error: function (xhr, status, error) 
          {
              $("#success-container").css("display","none");
              $("#errors-container").css("display","block");

              $("#errors").html('');
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
              
                $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
              });
              $("#coverloading").css("display","none");
              el.find("button").prop( "disabled", false );
            
          }
      });

});

</script>
