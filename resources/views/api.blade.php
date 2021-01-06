<!DOCTYPE html>
<html>
<head>
	<title>Bee News</title>
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>
	<div class="main-container">
		<div class="header">
			<h1>News Bee</h1>

        </div>
        <div class="navbar">
            <div class="menu">
                <a href="">Home</a>
                <a href="{{route('post.create')}}">Post News</a>
                <a href="">Contact</a>
                @if (Auth::check())
                <form  id="logout-id" method="POST" action="{{ route('logout') }}">@csrf</form>
                <a  href="#" onclick="document.getElementById('logout-id').submit();">Logout</a>

                @else

                <a  href="{{route('login')}}">Login</a>

                <a  href="{{route('register')}}">Register</a>

                @endif

            </div>
        </div>

		<div class="body-container">

            <div class="news-container">
                <div class="section">
                    <h2>News</h2>
                </div>
                @foreach ( $data as $item)
                    @if ($item['language']== 'es')
                        <div class="blog-post">

                            {{-- <div class="blog-post-img">

                                <img src="https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/NFOJ7HCOWQI6VFT34B2NGAWH2Q.jpg&w=691">

                            </div> --}}
                            <div class="blog-post-info">
                                <div class="blog-post-date">

                                    <span>Sunday</span>
                                    <span>{{$item['published_at']}}</span>

                                </div>
                                <h1 class="blog-post-title">{{$item['title']}}</h1>
                                <p class="blog-post-text">{{$item['description']}}</p>

                                {{-- <a href="" class="blog-post-cta">read more</a> --}}
                                <h2>Category: {{$item['category']}}</h2>

                            </div>


                        </div>
                    @endif

                @endforeach
            </div>



			<div class="right">
			    @yield('contents')
			</div>

        </div>

        <div class="footer">

		</div>

	</div>



</body>
</html>


{{-- @foreach ( $data as $item)
    @if ($item['language']== 'es')
    <ul>
        <li>{{$item['title']}}</li>
        <li>{{$item['description']}}</li>
        <li>{{$item['author']}}</li>
        <li>{{$item['category']}}</li>

    </ul>

    @endif

@endforeach --}}
