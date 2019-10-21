<script>

    $(document).ready(function () {

        var first_category = $('#category-select').val();
        getSUbCategories(first_category);


        $('#category-select').change(function () {
            var value = $(this).val();
            clearSubCategries();
            getSUbCategories(value);
        });


        function clearSubCategries() {
            $('#sub_category_id')
                .find('option')
                .remove()
                .end();
        }


        function getSUbCategories(category) {
            $.ajax({
                type: "GET",
                url: "{{route('front.ajax.get.subCategories')}}",
                data: {
                    'slug': category
                },
                dataType: 'json',
                cache: false,
                success: function (data) {
                    if (data != '') {
                        if (data.length > 0) {
                            $.each(data, function (i, item) {
                                $('#sub_category_id').append('<option value="' + data[i].slug + '">' + data[i].name + '</option>');
                            });
                        } else {
                            clearSubCategries();
                        }

                    } else {
                        clearSubCategries();
                    }
                }, error: function (data) {
                    // alert(JSON.stringify(data));
                }
            });
        }

    });


</script>
