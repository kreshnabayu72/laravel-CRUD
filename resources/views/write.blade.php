<x-layout>
    <form action="/post" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul">
        <input type="file" name="image">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>
</x-layout> 