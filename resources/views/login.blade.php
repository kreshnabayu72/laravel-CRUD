<x-layout>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <p>Belum punya akun? <a href="/register">Daftar</a></p>
        <input type="submit" value="Login">
    </form>
</x-layout> 