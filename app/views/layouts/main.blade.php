<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Books Project</title>

		{{ HTML::style('css/design.css') }}
		{{ HTML::script('java/jquery-1.11.1.min.js') }}
        {{ HTML::script('java/jquery-ui.min.js') }}
        {{ HTML::script('java/deletePopup.js') }}


    </head>

	<body>
    <div id="visible"></div>
    <div class="bigestwrapper ">


       		@yield('content')
        <div class="footer">~~~  created by tamar kavalerchik  ~~~</div>
</div>
	</body>

</html>