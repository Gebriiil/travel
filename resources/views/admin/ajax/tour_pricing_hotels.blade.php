<script>

    $(document).ready(function () {

        //  var first_hotel_category = $('#city-select').val();
        //  alert(first_hotel_category);
        // // getHotels(first_hotel_category);



        $('#city-select').change(function () {
            var value = $(this).val();
            clearHotels();
            for (var i = 0; i < value.length; i++) {
                getHotels(value[i]);
            }
        });


        function getHotels(city) {
            $.ajax({
                type: "GET",
                url: "{{route('admin.ajax.get.city.hotels')}}",
                dataType: 'json',
                cache: false,
                data: {
                    'city_id': city
                },
                success: function (data) {
                    if (data != '') {
                        if (data.length > 0) {
                            $('#hotel_container').show();
                            $.each(data, function (i, item) {
                                $('#hotel_id').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                            });
                        }
                    }
                }
            });
        }


        function clearHotels() {
            $('#hotel_id')
                .find('option')
                .remove()
                .end();
        }


    });


</script>
