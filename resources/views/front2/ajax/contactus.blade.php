<script>

    $(document).ready(function () {

        //submit message request
        $('#button_submit').on('click', function (e) { //use on if jQuery 1.7+
            e.preventDefault();  //prevent form from submitting


            var name = $('#name').val();
            var country = $('#country').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var title = $('#msg_title').val();
            var message = $('#msg_body').val();


            if (!name.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!email.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            }
            else if (!phone.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!country.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!title.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            }else if (!message.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            }
            else {
                $.ajax({
                    type: "POST",
                    accept: 'application/json',
                    url: "{{route('front.ajax.post.contact')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'name': name,
                        'country': country,
                        'phone': phone,
                        'email': email,
                        'msg_title': title,
                        'msg_body': message
                    }
                    ,
                    dataType: 'JSON',
                    cache: false,
                    success: function (data) {
                        if (data.code == 1) {
                            clearMessageInputs();
                            $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-success'><i class='fa fa-info'></i> " + data.msg + "</h3>");
                        } else {
                            $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + data.msg + "</h3>");
                        }
                    }, error: function (data) {
                        // alert(JSON.stringify(data));
                        $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> Internal Server Error </h3>");
                    }
                });
            }
        });

        function clearMessageInputs() {
            $('#name').val('');
            $('#phone').val('');
            $('#email').val('');
            $('#msg_title').val('');
            $('#msg_body').val('');
        }


    });


</script>
