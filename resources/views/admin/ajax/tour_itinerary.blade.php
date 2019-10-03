<script>

    $(document).ready(function () {
        var url = $('#public_path').val();
        //get csrf token to send it with request
        var csrf = $("meta[name='csrf-token']").attr("content");



        /**itinerary**/

        $(".new_itinerary").click(function () {
            var html = $(".itinerary_clone").html();
            $(".increment_itinerary").after(html);

            dailyTablesCounter++;

            $('#itinerary_container>:last-child').find('.wysihtml5').each(function () {
                $elm = $(this);
                $elm.html('');
                $elm.html('<textarea id="textarea-' + dailyTablesCounter + '" class="textarea"></textarea>');
                // $('#textarea-' + dailyTablesCounter).wysihtml5();


                var test = document.getElementById('textarea-' + dailyTablesCounter);
                test.remove();
                test.wysihtml5();

            });


        });

        $("body").on("click", ".remove_itinerary", function () {
            $(this).parents(".control-group-itinerary").remove();
        });


    });

</script>
