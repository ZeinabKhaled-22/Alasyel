// create 
$('#create-form').on('submit', function (e) {
    e.preventDefault();
    let form = $('#create-form')[0];
    let formData = new FormData(form);
    $.ajax({
        url: "/blog/create",
        method: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log('create blog successfully', response);
        },
        error: function (error) {
            console.log(error);
        }
    })
})


// update
$('#update_form').on('submit', function (e) {
    e.preventDefault()

    let id = $(this).data('id')

    let form = $('#update_form')[0]
    let formData = new FormData(form)
    formData.append('_method', 'PUT')

    $.ajax({
        url: "/blog/update/" + id,
        method: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log('update blog successfully', response);
        },
        error: function (error) {
            console.log(error);
        }
    })
})