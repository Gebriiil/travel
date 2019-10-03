<script>


    $(document).ready(function () {
        showList();

        $('#grid_btn').on('click', function (e) {
            e.preventDefault();  //prevent form from submitting
            showGrid();
        });


        $('#list_btn').on('click', function (e) {
            e.preventDefault();  //prevent form from submitting
            showList();
        });

        function showList() {
            $('#list_container').show();
            $('#grid_container').hide();
            $('#list_container').css('display', 'block');
            $('#grid_container').css('display', 'none');
        }


        function showGrid() {
            $('#list_container').hide();
            $('#grid_container').show();
            $('#list_container').css('display', 'none');
            $('#grid_container').css('display', 'block');
        }


    });

    //range slide
    $("#range").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 20000,
        from: 0,
        to: 10000,
        prefix: "{{getCurrency()}} "
    });
</script>


