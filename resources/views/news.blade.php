<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route('post.store')}}">
        @csrf
        <input type="text" name="title" placeholder="title">
        <br>
        <br>
        <input type="text" name="description" placeholder="description">
        <br> <br>
        <input type="text" name="author" placeholder="author">
        <br> <br>
        <input type="text" name="category" placeholder="category">
        <br> <br>
        <input type="submit" >
    </form>
</body>
</html>
