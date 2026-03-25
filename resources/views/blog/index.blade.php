<h1>All Blogs</h1>
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
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->description }}</td>
                <td>
                    <img src="{{ asset('images/' . $blog->image) }}" width="100">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>