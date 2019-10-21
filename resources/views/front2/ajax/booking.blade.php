<script>

    $(document).ready(function () {



        //submit message request
        $('#button_submit_booking').on('click', function (e) { //use on if jQuery 1.7+
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
                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            if (!checkin.length > 0) {
                //alert('insert checkin');
                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!checkout.length > 0) {
                //alert('insert checkout');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!adults.length > 0) {
                //alert('insert adults');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!childrens.length > 0) {
               // alert('insert childrens');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");
            }
            else if (!name.length > 0) {
                //alert('insert name');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!email.length > 0) {
                //alert('insert email');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!phone.length > 0) {
                //alert('insert phone');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } else if (!nationality.length > 0) {
                //alert('insert nationality');

                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

            } 
            else if (!message.length > 0) {
                $('#booking-error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h3>");

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
                    beforeSend: function(data){
                        $('#button_submit_booking').attr('disabled','disabled');
                    }, 
                    success: function (data) {
                        if (data.code == 1) {
                            // clearMessageInputs();
                            // $('#error-msg').html("<h3 style='display: block;text-align: center'  class='btn btn-success'><i class='fa fa-info'></i> " +  + "</h3>");
                            Swal.fire({
                                title: '{{trans("site.success")}}',
                                html: data.msg,
                                type: 'success',
                                 showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                 confirmButtonText: '{{trans("site.ok")}}'
                             });
                             $('#button_submit_booking').attr('disabled',false);
                             clearMessageInputs();
                        } else {
                            Swal.fire({
                                title: '{{trans("site.error")}}',
                                html: data.msg,
                                type: 'error',
                                 showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                 confirmButtonText: '{{trans("site.ok")}}'
                             });
                        }
                    }, error: function (xhr,status,data) {
                        
                            //$('#error-msg').html("<h3 style='word-wrap:break-spaces;display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + item + "</h3>"); 
                            // $("#booking-error-msg").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                            var errorsMsg;
                            $.each(xhr.responseJSON.errors, function (key, item){
                                errorsMsg += item+'<br/>';
                                
                            });
                        Swal.fire({
                            title: '{{trans("site.email_error")}}',
                            html: errorsMsg,
                            type: 'error',
                             showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                             confirmButtonText: '{{trans("site.ok")}}'
                         });

                    }
                });
            }
        });

        function clearMessageInputs() {
            $('#tour_id').val('');
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


