



                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

            </div>
            <!-- END CONTAINER -->





            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2019 &copy; SeoEra Theme By
                    <a target="_blank" href="https://www.seoera.net/"></a> &nbsp;|&nbsp;
                    
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->




        </div>
     
       <!-- BEGIN QUICK NAV -->
      
        
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
        <script src="{{aurl()}}/global/plugins/respond.min.js"></script>
        <script src="{{aurl()}}/global/plugins/excanvas.min.js"></script> 
        <script src="{{aurl()}}/global/plugins/ie8.fix.min.js"></script> 
        <script src="{{aurl()}}/global/plugins/ie8.fix.min.js"></script>

        <![endif]-->
        
        @include('admin.inc._footer._linksFooter')
        

        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            });

        </script>


        @yield('script')

        <script src="{{aurl()}}/seoera/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="{{aurl()}}/seoera/plugins/confirmation/jquery-confirm.min.js"></script>
        <script src="{{aurl()}}/seoera/js/endScript.js" type="text/javascript"></script>





                    </body>

</html>
