var notyf = new Notyf();
$(document).on('click', '.add_to_cart', function(e){
    e.preventDefault();
    let courseId = $(this).data('course-id');
           $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        
    $.ajax({
        url: config.routes.addToCart,
        method: 'POST',
        data: {
            course_id: courseId,
        },
        success: function(data){
            if(data.status === 'success'){
                notyf.success(data.message);
            }
            else if(data.status === 'error'){
                notyf.error(data.message);
            }
        },
        
        error: function(xhr){
            notyf.error(xhr.responseJSON.message);
            console.error('Error:', xhr.responseText);
        }
    })
})