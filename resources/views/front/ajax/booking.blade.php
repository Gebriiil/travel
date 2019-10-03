<script>

    $(document).ready(function () {



        //submit message request
        $('#button_submit').on('click', function (e) { //use on if jQuery 1.7+
            e.preventDefault();  //prevent form from submitting

            var tour_id = $('#tour_id').val();
            var checkin = $('#check_in_date').val();
            var checkout = $('#check_out_date').val();
            var adults = $('#adults').val();
            var childrens = $('#childrens').val();
            var name = $('#namez').val();
            var email = $('#emailz').val();
            var phone = $('#phonez').val();
            var nationality = $('#nationality').val();
           var message = $('#message').val();




            if (!tour_id.length > 0) {
                //alert('insert tour id');
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            if (!checkin.length > 0) {
                //alert('insert checkin');
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!checkout.length > 0) {
                //alert('insert checkout');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!adults.length > 0) {
                //alert('insert adults');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!childrens.length > 0) {
               // alert('insert childrens');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!name.length > 0) {
                //alert('insert name');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!email.length > 0) {
                //alert('insert email');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!phone.length > 0) {
                //alert('insert phone');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!nationality.length > 0) {
                //alert('insert nationality');

                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } 
            else if (!message.length > 0) {
                $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            }
            else {
                $.ajax({
                    type: "POST",
                    accept: 'application/json',
                    url: "{{route('front.ajax.post.booking')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'tour_id': tour_id,
                        'arrival_date': checkin,
                        'departure_date': checkout,
                        'adult_number': adults,
                        'children_number': childrens,
                        'name': name,
                        'email': email,
                        'phone': phone,
                        'nationality': nationality,
                        'message': message
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
                    }, error: function (xhr,status,data) {
                        $.each(xhr.responseJSON.errors, function (key, item)
                        {
                            //$('#error-msg').html("<h3 style='word-wrap:break-spaces;display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + item + "</h3>");
                            $("#error-msg").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                        });

                    }
                });
            }
        });

        function clearMessageInputs() {
            $('#check_in_date').val('');
            $('#check_out_date').val('');
            $('#adults').val('');
            $('#childrens').val('');
            $('#namez').val('');
            $('#emailz').val('');
            $('#phonez').val('');
            $('#nationality').val('');
            $('#message').val('');
        }
      
      




    });



</script>


