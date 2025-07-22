import './cart.js';
var notyf = new Notyf();

$('.subs').on('submit', function(e){
    e.preventDefault();
    let email = $(this).find('input[name="email"]').val();


    $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });


    $.ajax({
        url: config.routes.subscribe,
        method: 'POST',
        data: {
            email: email,
        },
        success: function(data){
            if(data.status === 'success'){
                notyf.success(data.message);
                $('.subs input[name="email"]').val('');
            }
        },
        error: function(xhr){
            console.error('Error:', xhr.responseText);
        }
    })
})



   $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']]
            ]
        });



document.addEventListener("DOMContentLoaded", function() {
  ezShare.execute();
});