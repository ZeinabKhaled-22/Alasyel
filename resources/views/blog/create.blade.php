<!-- pic, title, dec -->
 <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Enter Title"> <br><br>
    <input type="text" name="description" placeholder="Enter Description"> <br><br>
    <input type="file" name="image"> <br><br>
    <button type="submit">Submit</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif