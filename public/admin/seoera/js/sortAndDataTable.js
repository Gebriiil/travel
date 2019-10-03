    // for make multi check 
// for sortung in tables 
$( init );

function init() {
  $( ".droppable-area1, .droppable-area2" ).sortable({
      connectWith: ".connected-sortable",
      stack: '.connected-sortable ul'
    }).disableSelection();
}






//  for initialize data tables and remove defaut ordring
$('.table-sort').dataTable({
  "ordering": false
});
  

// for make multi check 

$(".table-sort").find('.group-checkable').change(function () {
    var set = jQuery(this).attr("data-set");
    var checked = jQuery(this).is(":checked");
    jQuery(set).each(function () {
        if (checked) {
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
});