@extends("welcome")
@section('body')
<div class="container mt-2">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ \App\Models\User::query()->where("id",$post->userId)->value("username") }}</td>
                        <td>{{ $post->title }}</td>
                        <td class="d-flex flex-nowrap">{{ $post->body }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
