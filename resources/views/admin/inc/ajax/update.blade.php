
<!-- Edit Data  -->



<script type="text/javascript">

  
  $("#form-edit").submit(function(e) 
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
                



        var formData  = new FormData(jQuery('#form-edit')[0]);


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

              $("#errors-container").css("display","none");
              $("#success-container").css("display","block");
              $("#success").html('');
              $("#success").append("<li class='alert alert-success text-center'>{{ trans('site.updated_success') }}</li>")

             // alert("{{ trans('site.updated_success') }}");

          }, error: function(xhr, status, error) 
          {
              $("#success-container").css("display","none");
              $("#errors-container").css("display","block");
              $("#coverloading").css("display","none");
              el.find("button").prop( "disabled", false );

              $("#errors").html('');
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
              });
            
          }
      });

});

</script>
