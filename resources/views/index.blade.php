<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        
        <title>BabyCare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>

	</head>
	<body>
		<nav>
			@include('layouts.navbar')
		</nav>
		<div class="container" style="margin-top: 70px;">
            <div class="row">
                <div class="cold-md-10 cold-md-offset2 col-xs-10 col-xs-offset-1">
                
                    @include('layouts._errors')

                    @include('layouts._messages')
                
                    @yield('content')
                </div>
            </div>
        </div>
        

	</body>
</html>