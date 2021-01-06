<div>
    <div>
        <form method="GET" action="{{route('post.search')}}">
            <input type="search" name="searchdata">
            <input type="submit">
        </form>
    </div>

    @foreach ( $allpost as $item)

    <ul>
        <li>{{$item->title}}</li>
        <li>{{$item->descrption}}</li>
        <li>{{$item->author}}</li>
        <li>{{$item->category}}</li>

    </ul>


    @endforeach
    <ul>
        <li>title</li>
        <li>description</li>
        <li>category name</li>
        <li>author name</li>
    </ul>
    @foreach ( $allpost as $item)
    @if (auth::user()->name == $item->author)
    <ul>
        <li>{{$item->title}}</li>
        <li>{{$item->descrption}}</li>
        <li>{{$item->author}}</li>
        <li>{{$item->category}}</li>

    </ul>
    @endif

    @endforeach

</div>

