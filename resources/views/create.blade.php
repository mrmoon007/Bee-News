@extends('layouts.master')

@section('contents')
<div>
    <form method="post" action="{{route('post.store')}}">
        @csrf
        <input type="text" name="title" placeholder="title">
        <br>
        <br>
        <input type="text" name="description" placeholder="description">
        <br> <br>
        <input type="text" name="category" placeholder="category">
        <br> <br>
        <input type="submit" >
    </form>
</div>

@endsection

