<h1>All Blogs</h1>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td class="table-light" >{{ $blog->title }}</td>
                <td class="table-light" >{{ $blog->description }}</td>
                <td class="table-light" >
                    <img src="{{ asset('images/' . $blog->image) }}" width="100">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>