<x-layout>
    <section>
        <h1>Posts</h1>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <form action="/delete/post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href='#' onclick='this.parentNode.submit();'>Delete</a>
                            </form>
                            <a href="/edit-post/{{$post->id}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1>Users</h1>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->isAdmin == 0)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>
                                <form action="/delete/user/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete">
                                </form>
                                <a href="/edit-user/{{$user->id}}">Edit</a>
                            </td>
                        </tr>                        
                    @endif  
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>