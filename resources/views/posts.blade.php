<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is the title</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{$post->slug}}">{{ $post->title }}</a></h1>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach

</body>
</html>
