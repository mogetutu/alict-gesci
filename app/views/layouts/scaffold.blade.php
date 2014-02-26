<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/bootstrap-multiselect.css" rel="stylesheet">
		<link href="/assets/css/datepicker.css" rel="stylesheet">
		<link href="/assets/css/app.css" rel="stylesheet">

		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/bootstrap-multiselect.js"></script>
		<script src="/assets/js/bootstrap-datepicker.js"></script>
		<script src="/assets/js/textareacounter.js"></script>
		<script src="/assets/js/app.js"></script>

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	</head>

	<body>
	<div class="container">
		<div class="header">
      <ul class="nav nav-pills pull-right">
        <li {{(Request::is('/')) ? 'class="active"' : '' }}><a href="/">About</a></li>
        @if (Auth::user())
          <li {{(Request::is('/user/logout')) ? 'class="active"' : '' }}><a href="/user/logout">Logout</a></li>
        @else
          <li {{(Request::is('/login')) ? 'class="active"' : '' }}><a href="/login">Register</a></li>
        @endif
      </ul>
      <h3 class="text-muted">ALICT {{date('Y')}}</h3>
    </div>
	</div>
		<div class="container">
		@if (Auth::user())
			<div class="col-md-4">
				@include('layouts.includes.sidebar')
			</div>
			<div class="col-md-8">
		@endif
			<div class="row">
				@include('layouts.includes.status')
			</div>
				@yield('main')
			</div>
		</div>
		<script type="text/javascript">
		  WebFontConfig = {
		    google: { families: [ 'Roboto+Slab:400,300,700:latin' ] }
		  };
		  (function() {
		    var wf = document.createElement('script');
		    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		    wf.type = 'text/javascript';
		    wf.async = 'true';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(wf, s);
		  })();
		</script>
	</body>

</html>
