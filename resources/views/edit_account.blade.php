<x-layout>
    <h1>Edit akun</h1>
    <form action="/user/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="username" placeholder="username" value="{{$user->username}}">
        <input type="text" name="email" placeholder="email" value="{{$user->email}}">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Edit user">
    </form>
</x-layout> 