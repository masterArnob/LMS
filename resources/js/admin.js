// for changing the profile image in admin panel
$(document).on("change", "#image", function (e) {

    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImage").css("background-image", "url(" + e.target.result + ")");
    };
    reader.readAsDataURL(e.target.files[0]);
});
// for changing the profile image in admin panel



var notyf = new Notyf();

var delete_url = null;

$(document).on("click", ".delete-item", function (e) {
    e.preventDefault();

    let url = $(this).attr("href");
    delete_url = url;
    //alert(url);
    $("#modal-danger").modal("show");
});

$(document).on("click", ".delete-confirm", function (e) {
    e.preventDefault();
    //alert('aaaaaaa');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: delete_url,
        method: "DELETE",
        success: function (data) {
            if(data.status === 'success'){
                 window.location.reload();
            }else if(data.status === 'error'){
                 window.location.reload();
            }
        },
error: function (xhr, status, error) {
    // Log error details to console for debugging
    console.log('Error:', error);
    console.log('Status:', status);
    console.log('XHR:', xhr);

    // Show specific error message
    let errorMessage = xhr.responseJSON?.message || `Error: ${xhr.status} ${xhr.statusText}`;
    notyf.error(errorMessage);
}
    });
});