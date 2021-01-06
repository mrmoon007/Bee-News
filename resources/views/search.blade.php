@extends('layouts.master')
@section('contents')
<div>
    @foreach ( $searchitem as $item)
        <div class="blog-post">
            <div class="blog-post-info">
                <div class="blog-post-date">

                </div>
                <h1 class="blog-post-title">{{$item->title}}</h1>
                <p class="blog-post-text">{{$item->descrption}}</p>

                {{-- <a href="" class="blog-post-cta">read more</a> --}}
                <h2>Category: {{$item->category}}</h2>
                <h2 class="authorright">Author: {{$item->author}}</h2>

            </div>
        </div>
    @endforeach
</div>
@endsection

{{-- @foreach ( $searchitem as $item)

<ul>
    <li>{{$item->title}}</li>
    <li>{{$item->descrption}}</li>
    <li>{{$item->author}}</li>
    <li>{{$item->category}}</li>

</ul>


@endforeach --}}
