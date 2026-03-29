$('form').on('submit', function (e) {
    e.preventDefault()
})


$.ajaxSetup({
    headers: {
        'X_CSRF_TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
    },
})
$.ajax({
    url: "create",
    method: "POST",
    data: $(this).serialize(),
    success: function (response) {
        console.log(response);
        alert('create blog successfully')
    },
    error: function (error) {
        console.log(error);
    }
})