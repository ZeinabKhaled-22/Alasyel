<!-- get data from db -->
@foreach ($blogs as $blog)
<li>{{ $blog->title }}</li>
<li>{{ $blog->description }}</li>
<li>{{ $blog->path }}</li>

@endforeach