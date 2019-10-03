<script src="{{ asset(mix('js/laravel-mix-all.js')) }}" ></script>
<!-- REVOLUTION JS FILES -->

<script src="{{furl()}}/js/libs/revolution/jquery.themepunch.tools.min.js"></script>
<script src="{{furl()}}/js/libs/revolution/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


@yield('ajax')