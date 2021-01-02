<h1>data list</h1>
@foreach ( $apidata as $item)
    <ul>
        <li>{{$item[[pagination].author]}}</li>
        <li>{{$item->descrption}}</li>
        <li>{{$item->author}}</li>
        <li>{{$item->category}}</li>

    </ul>
@endforeach
