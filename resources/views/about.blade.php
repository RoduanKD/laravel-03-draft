<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Me</title>
</head>
<body>
    <h1>About Me</h1>
    <p>Hello my name is {{ $name }} {!! $lname !!}!!</p>
    @if (count($posts) == 1)
        <p>We have one post</p>
    @elseif (count($posts) > 1)
        <p>We have multiple posts</p>
    @else
        <p>Sorry we don't have any posts</p>
    @endif

    @unless (count($posts) > 5)
        <p>we have a few posts</p>
    @endunless


    @empty ($posts)
        <p>Sorry we don't have any posts</p>
    @empty
    @isset($name123)
        <p>we have a name {{ $name }}</p>
    @endisset
</body>
</html>
