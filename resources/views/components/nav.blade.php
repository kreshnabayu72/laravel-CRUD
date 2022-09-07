
<nav>
    <h1>
        <a href="/">Logo</a>
    </h1>
    <ul>
        @auth
        @if (auth()->user()->isAdmin == 1)
        <li>
            <a href="/admin">Admin</a>
        </li>
        @endif
        <li>
            <a href="/write">Tulis</a>
        </li>
        <li>
            <form action="/logout" method="POST">
                @csrf
                <a href='#' onclick='this.parentNode.submit();'>Logout</a>
            </form>
        </li>
        @else
        <li>
            <a href="/login">Login</a>
        </li>
        @endauth
        
    </ul>
</nav>