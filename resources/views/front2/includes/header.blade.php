<!doctype html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>@if(isset($seo->metaTitle)){{$seo->metaTitle}}@else{{$settings->site_name}}@endif</title>
	<meta name="description" content="@if(isset($seo->metaDescription)){{$seo->metaDescription}}@else{{$settings->site_name}}@endif">
	<meta name="keywords" content="@if(isset($seo->metKeywords)){{$seo->metKeywords}}@else{{$settings->site_name}}@endif">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="shortcut icon" href="{{furl()}}/images/ico/favicon.png">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="{{furl()}}/bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="{{furl()}}/css/animate.css" rel="stylesheet">
	<link href="{{furl()}}/css/main.css" rel="stylesheet">
	<link href="{{furl()}}/css/component.css" rel="stylesheet">

	<!-- CSS Font Icons -->
	<link rel="stylesheet" href="{{furl()}}/icons/open-iconic/font/css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="{{furl()}}/icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{furl()}}/icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="{{furl()}}/icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="{{furl()}}/icons/rivolicons/style.css">
	<link rel="stylesheet" href="{{furl()}}/icons/streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="{{furl()}}/icons/around-the-world-icons/around-the-world-icons.css">
	<link rel="stylesheet" href="{{furl()}}/icons/et-line-font/style.css">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,300italic,400italic,700italic' rel='stylesheet' type='text/css'>

	<!-- CSS Custom -->
	<link href="{{furl()}}/css/style.css" rel="stylesheet">
	
	
	<!-- Add your style -->
	<link href="{{furl()}}/css/your-style.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
@if(isset($slider_class))
	<link href="{{furl()}}/css/bootstrap-slider.css" rel="stylesheet">
@endif
	
</head>

<body class="">