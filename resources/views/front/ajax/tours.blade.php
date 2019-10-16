<script>


    $(document).ready(function () {
        showGrid();

        $('#grid_btn').on('click', function (e) {
            e.preventDefault();  //prevent form from submitting
            showGrid();
        });


        $('#list_btn').on('click', function (e) {
            e.preventDefault();  //prevent form from submitting
            showList();
        });

        function showList() {
            $('#list_container').show(1000);
            $('#grid_container').hide(1000);
            $('#list_container').css('display', 'block');
            $('#grid_container').css('display', 'none');
            $('#list_btn').addClass('active');
            $('#grid_btn').removeClass('active');
        }


        function showGrid() {
            $('#list_container').hide(1000);
            $('#grid_container').show(1000);
            $('#list_container').css('display', 'none');
            $('#grid_container').css('display', 'block');
            $('#grid_btn').addClass('active');
            $('#list_btn').removeClass('active');
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

    $(document).ready(function () {

        function showGrid() {
            $('#list_container').hide(1000);
            $('#grid_container').show(1000);
            $('#list_container').css('display', 'none');
            $('#grid_container').css('display', 'block');
            $('#grid_btn').addClass('active');
            $('#list_btn').removeClass('active');
        }
        
        $('#search-subpage').on('click', function (e) {

            var destination = $('#destination-in-subpage').val();
            var from = $('#from-in-subpage').val();
            var to = $('#to-in-subpage').val();

            if (!destination.length > 0) {
                //alert('insert tour id');
                $('#booking-error-msg-sub').html("<h6 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h6>");
            }
            if (from ==null) {
                //alert('insert tour id');
                $('#booking-error-msg-sub').html("<h6 style='display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> {{trans('site.all_fields_are_required')}}</h6>");
            }else{
                $.ajax({
                        type: "POST",
                        accept: 'application/json',
                        url: "{{murl('search-ajax-tour')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'destination': destination,
                            'from': from,
                            'to': to,
                        }
                        ,
                        dataType: 'html',
                        cache: false,
                        success: function (data) {
                            $('#tours-containers-ajax').html(data);
                            showGrid();
                            console.log(data);
                        }, error: function (xhr,status,data) {
                            
                                //$('#error-msg').html("<h3 style='word-wrap:break-spaces;display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + item + "</h3>"); 
                                // $("#booking-error-msg").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                                // var errorsMsg;
                                // $.each(xhr.responseJSON.errors, function (key, item){
                                //     errorsMsg += item+'<br/>';
                                    
                                // });
                            // Swal.fire({
                            //     title: '{{trans("site.email_error")}}',
                            //     html: "errorsMsg",
                            //     type: 'error',
                            //      showCancelButton: false,
                            //     confirmButtonColor: '#3085d6',
                            //      confirmButtonText: '{{trans("site.ok")}}'
                            //  });
                            console.log(xhr.responseJSON);

                        }
                    });
            }

            
        });

        $('#tags-filter-tours-btn').on('click', function (e) {

            let tags = [];
            $('input[name="filter_amenities[]"]').each(function(){
                tags.push($(this).val())
            });
            console.log(tags);
                $.ajax({
                        type: "POST",
                        accept: 'application/json',
                        url: "{{murl('filter-ajax-tour')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'tags': tags,
                        }
                        ,
                        dataType: 'html',
                        cache: false,
                        success: function (data) {
                            $('#tours-containers-ajax').html(data);
                            showGrid();
                            console.log(data);
                        }, error: function (xhr,status,data) {
                            
                                //$('#error-msg').html("<h3 style='word-wrap:break-spaces;display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + item + "</h3>"); 
                                // $("#booking-error-msg").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                                // var errorsMsg;
                                // $.each(xhr.responseJSON.errors, function (key, item){
                                //     errorsMsg += item+'<br/>';
                                    
                                // });
                            // Swal.fire({
                            //     title: '{{trans("site.email_error")}}',
                            //     html: "errorsMsg",
                            //     type: 'error',
                            //      showCancelButton: false,
                            //     confirmButtonColor: '#3085d6',
                            //      confirmButtonText: '{{trans("site.ok")}}'
                            //  });
                            

                        }
                    });
            
        });

        $('#price-filter-tours-btn').on('click', function (e) {
            var prices = $('#price_range').val();
            console.log(prices);
                $.ajax({
                        type: "POST",
                        accept: 'application/json',
                        url: "{{murl('filter-ajax-tour')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'prices': prices,
                        }
                        ,
                        dataType: 'html',
                        cache: false,
                        success: function (data) {
                            $('#tours-containers-ajax').html(data);
                            showGrid();
                            console.log(data);
                        }, error: function (xhr,status,data) {
                            
                                //$('#error-msg').html("<h3 style='word-wrap:break-spaces;display: block;text-align: center'  class='btn btn-danger'><i class='fa fa-info'></i> " + item + "</h3>"); 
                                // $("#booking-error-msg").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                                // var errorsMsg;
                                // $.each(xhr.responseJSON.errors, function (key, item){
                                //     errorsMsg += item+'<br/>';
                                    
                                // });
                            // Swal.fire({
                            //     title: '{{trans("site.email_error")}}',
                            //     html: "errorsMsg",
                            //     type: 'error',
                            //      showCancelButton: false,
                            //     confirmButtonColor: '#3085d6',
                            //      confirmButtonText: '{{trans("site.ok")}}'
                            //  });
                            

                        }
                    });
            
        });
        
    });    
</script>


