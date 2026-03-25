<form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="text" name="title" value="{{ $blog->title }}"><br><br>
    <input type="text" name="description" value="{{ $blog->description }}"><br><br>
    <input type="file" name="image" value="{{ $blog->image }}"><br><br>
    <button type="submit">Update</button>

</form>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif