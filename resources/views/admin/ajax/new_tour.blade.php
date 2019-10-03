<script>

    $(document).ready(function () {
        var url = $('#public_path').val();
        //get csrf token to send it with request
        var csrf = $("meta[name='csrf-token']").attr("content");


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
                url: "{{route('admin.ajax.get.category.sub')}}",
                data: {
                    'category_id': category
                },
                dataType: 'json',
                success: function (data) {
                    if (data != '') {
                        if (data.length > 0) {

                             $('#sub_category_container').show();
                           // $('#sub_category_id').append('<optgroup label="All Sub Categories">');
                            $.each(data, function (i, item) {
                                $('#sub_category_id').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                            });
                            $('#sub_category_id').append('  </optgroup>');
                        } else {
                             $('#sub_category_container').hide();
                            clearSubCategries();
                        }

                    } else {
                         $('#sub_category_container').hide();
                        clearSubCategries();
                    }
                },
                error: function (data) {
                    //alert(JSON.stringify(data));
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
            });
        }
    });


</script>
