<!-- pic, title, dec -->
 <form action="{{ route('blog.insert') }}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Enter Title"> <br><br>
    <input type="text" name="body" placeholder="Enter Description"> <br><br>
    <!-- <input type="file" name="image"> -->
    <button type="submit">Submit</button>
</form>