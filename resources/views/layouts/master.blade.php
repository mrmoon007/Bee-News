<!DOCTYPE html>
<html>
<head>
	<title>Bee News</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

	<div class="main-container">
		<div class="header">
			<h1>News Bee</h1>

        </div>
        <div class="navbar">
            <div class="menu">
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('post.create')}}">Post News</a>
                <a href="">Contact</a>
                @if (Auth::check())
                <form  id="logout-id" method="POST" action="{{ route('logout') }}">@csrf</form>
                <a  href="#" onclick="document.getElementById('logout-id').submit();">Logout</a>
                <a href="{{route('change.password')}}">Change Password</a>

                @else

                <a  href="{{route('login')}}">Login</a>

                <a  href="{{route('register')}}">Register</a>

                @endif
                <form method="get" action="{{route('post.search')}}" class="search">
					<input type="search" name="searchdata">
					<button>search</button>
				</form>

            </div>
        </div>

		<div class="body-container">
            @yield('contents')
        </div>

        <div class="footer">

		</div>

	</div>



</body>
</html>
