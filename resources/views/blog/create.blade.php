<head>
    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<form enctype="multipart/form-data" id="create-form"  >
    @csrf
    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label" >Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" placeholder="Enter title" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" placeholder="Enter description">
        </div>
    </div>

   <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="image">
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="{{ asset('js/ajax.js') }}"></script> 