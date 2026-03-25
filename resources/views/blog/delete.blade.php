<form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
    @csrf
    <button type="submit">Delete</button>
</form>