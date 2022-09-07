<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <x-nav/>
    <main>
        <article>
            <img src={{$post->image?asset('/storage/'.$post->image):asset("noimg.jpg")}} alt="">
            <h1>{{$post? $post->title: "Placeholder aja"}}</h1>
            <p>{!!$post?nl2br($post->content):"non"!!}</p>
        </article>
    </main>
</body>
</html>
    
