<x-layout>

<div class="posts">
    @foreach ($post as $post)
        <a href="/{{$post->id}}">
            <div class="post">
                <img src={{$post->image?asset('/storage/'.$post->image):asset("noimg.jpg")}} alt="">
                <h4>{{$post->title}}</h4>
            </div>
        </a>
    @endforeach
</div>
<div class="pagination">

</div>
</x-layout>