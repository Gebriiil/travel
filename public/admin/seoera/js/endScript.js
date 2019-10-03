// this function return false if user did not choose any item
$(".item-checked").click(function(e)
{
     "use strict";
      var x = 0;
      for(var i = 0; i <= $(".checkboxes:checked").length - 1; i++)
      {
         x = 1;
      };

      if(x == 0)
      {
          swal({
                  text: "Please Choose One Item At Least !",
                })
            e.preventDefault()
      }
      else
      {
           var checkstr =  confirm('are you sure you want to delete this?');
            if(checkstr == true)
            {
          
              return true;
            }
            else
            {
               return false;
            }
      }


         
     
});



//  confirmation message before delete 

$(".conform-delete").click(function(e){


    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
      return true;
    }else{
    return false;
    }

});

$(".confirm-show").click(function(e){
    var checkstr =  confirm('are you sure you want to show this?');
    if(checkstr == true){
        return true;
    }else{
        return false;
    }
});


$(".confirm-hide").click(function(e){
    var checkstr =  confirm('are you sure you want to hide this?');
    if(checkstr == true){
        return true;
    }else{
        return false;
    }

});



//  preview image befor uploading 
var loadFile = function(event) 
{
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;

     $(".privew-image").addClass("img-thumbnail");
  };
  reader.readAsDataURL(event.target.files[0]);
};



var loadFile2 = function(event) 
{
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output2');
    output.src = reader.result;

     $(".privew-image2").addClass("img-thumbnail");
  };
  reader.readAsDataURL(event.target.files[0]);
};

     









