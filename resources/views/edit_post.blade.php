<x-layout>
    <form action="/post/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Judul" value="{{$post->title}}">
        <input type="file" name="image">
        <textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
        <input type="submit" value="Submit">
    </form>
</x-layout> 