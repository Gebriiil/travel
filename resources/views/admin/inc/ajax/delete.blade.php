<script type="text/javascript">
  
$(document).on("click",".delete-row",function(){

  var el = $(this);
  var route = $(this).attr("data-route")
  $.ajax({
      type: "GET",
      url: route,
      cache: false,
      beforeSend:function()
      {
          $("#coverloadingTable").css("display","block");
          el.prop("disabled", true );
      },
      success: function (data) 
      {
          $("#coverloadingTable").css("display","none");
          el.parents("tr").remove();
          Swal.fire(
				{
					position: 'top-end',
					type: 'success',
					title: "{{trans('admin.msg.deletedSuccess')}}",
					showConfirmButton: false,
					timer: 2000
				})

      }, error: function (data) 
      {
          $("#coverloadingTable").css("display","none");
          el.prop( "disabled", false );
        
      }
  });



});

</script>