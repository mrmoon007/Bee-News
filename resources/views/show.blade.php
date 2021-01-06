@extends('home')

@section('contents')
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
</div>
    <div class="right">
        <div class="mycollection-container">
            <div class="section">
                <h2>My Collections</h2>
            </div>
            <div class="bnews">
                <div class="card">
                    @foreach ( $allpost as $item)
                        @if (auth::user()->name == $item->author)
                            <h2 class="card-title">
                                {{$item->title}}
                            </h2>
                            <p class="card-discription">{{$item->descrption}} </p>
                            <div>
                                <h4 class="card-author">
                                    {{$item->author}}
                                </h4>
                                <a href="{{ route('post.delete', ['id'=>$item->id]) }}" class="delete"> Delete</a>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>

        <div class="beenews-container">
            <div class="section">
                <h2>Bee News</h2>
            </div>
            <div class="bnews">

                <div class="card">
                    @foreach ( $allpost as $item)
                        <h2 class="card-title">
                            {{$item->title}}
                        </h2>
                        <p class="card-discription">{{$item->descrption}}</p>

                        <h4 class="card-author">
                            {{$item->author}}
                        </h4>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
