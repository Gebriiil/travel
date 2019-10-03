
<script type="text/javascript">
// $(".count-text").keyup(function(){
//     console.log(this.value.length);
// })

$('.count-text-meta-title').on('keyup', function() 
{
    $(this).parents('.form-group').find('label span').text(this.value.length)
    if(this.value.length > 72)
    {
       $(this).parents('.form-group').find('label span').removeClass('label-success').addClass('label-danger')
    }
    else
    {
       $(this).parents('.form-group').find('label span').removeClass('label-danger').addClass('label-success')
    }
    //console.log(this.value.length);
});


 $('.count-text-desc-keywords').on('keyup', function() 
{
    $(this).parents('.form-group').find('label span').text(this.value.length)
    if(this.value.length > 255)
    {
       $(this).parents('.form-group').find('label span').removeClass('label-success').addClass('label-danger')
    }
    else
    {
       $(this).parents('.form-group').find('label span').removeClass('label-danger').addClass('label-success')
    }
    //console.log(this.value.length);
});
</script>