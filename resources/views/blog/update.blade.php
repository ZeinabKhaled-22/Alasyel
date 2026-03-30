<head>
    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form enctype="multipart/form-data" id="update_form" >
    @csrf
    @method('put')
    <input type="text" name="title" value="{{ $blog->title }}"><br><br>
    <input type="text" name="description" value="{{ $blog->description }}"><br><br>
    <input type="file" name="image" value="{{ $blog->image }}"><br><br>
    <input type="hidden" id="blog_id" value="{{ $blog->id }}" data-id="{{ $blog->id }}">
    <button type="submit" id="xx">Update</button>

</form>
 <script src="{{ asset('js/ajax.js') }}">
 </script>
<!-- action="{{ route('blog.update', $blog->id) }}" method="post" -->