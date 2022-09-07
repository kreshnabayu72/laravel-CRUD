<x-layout>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <p>Sudah punya akun? <a href="/login">Login</a></p>
        <input type="submit" value="Register">
    </form>
</x-layout> 