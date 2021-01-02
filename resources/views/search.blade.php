@foreach ( $searchitem as $item)

<ul>
    <li>{{$item->title}}</li>
    <li>{{$item->descrption}}</li>
    <li>{{$item->author}}</li>
    <li>{{$item->category}}</li>

</ul>


@endforeach
