<!-- pic, title, dec -->

<head>
    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <meta name="csrf_token" content="{{ csrf_token() }}">
</head>
<form enctype="multipart/form-data" id="create-form">
    @csrf
    <input type="text" name="title" placeholder="Enter Title"> <br><br>
    <input type="text" name="description" placeholder="Enter Description"> <br><br>
    <input type="file" name="image"> <br><br>
    <button type="submit" id="btn">Submit</button>
</form>
<script src="{{ asset('js/ajax.js') }}"></script>

<!-- action="{{ route('blog.create') }}" method="post" -->