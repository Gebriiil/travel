<script>

    $(document).ready(function () {
 
        //submit message request
        $('#newsletter-submit').on('click', function (e) { //use on if jQuery 1.7+
            e.preventDefault();  //prevent form from submitting

            var email = $('#newsletter').val();

           // alert(email)

            if (!email.length > 0) {
                Swal.fire({
                  title: '{{trans("site.email_error")}}',
                  text: "",
                  type: 'error',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: '{{trans("site.ok")}}'
                });
            }
            else { 
                $.ajax({
                    type: "POST",
                    accept: 'application/json',
                    url: "{{route('front.ajax.post.subscribe')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'email': email,
                    }
                    ,
                    dataType: 'JSON',
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        if(data.code==1){     
                            Swal.fire({
                              title: '{{trans("site.success")}}',
                              text: data.msg,
                              type: 'success',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: '{{trans("site.ok")}}'
                            });
                        }
                        if(data.code==0){     
                            Swal.fire({
                              title: '{{trans("site.email_error")}}',
                              text: data.msg,
                              type: 'error',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: '{{trans("site.ok")}}'
                            });
                        }


                    }, error: function (xhr,status,data) {
                        console.log(xhr.responseJSON.errors);
                        
                        $.each(xhr.responseJSON.errors, function (key, item)
                        {
                            Swal.fire({
                              title: '{{trans("site.email_error")}}',
                              text: item,
                              type: 'error',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: '{{trans("site.ok")}}'
                            });
                            console.log(item);
                        });

                    }
                });
            }
        });

        function clearMessageInputs() {
            $('#email').val('');
        }


    });


</script>
