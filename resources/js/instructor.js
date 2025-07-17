$(document).on("change", "#image", function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImage").attr("src", e.target.result);
    };
    reader.readAsDataURL(e.target.files[0]);
});

var notyf = new Notyf();
$(document).on("submit", ".basic-info-form", function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: config.routes.storeBasicInfo,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == "success") {
                notyf.success(data.message);
                window.location.href = data.redirect_route;
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $(`input[name="${key}"], textarea[name="${key}"]`).addClass(
                        "is-invalid"
                    );
                    $(`input[name="${key}"], textarea[name="${key}"]`)
                        .next(".text-danger")
                        .remove();
                    $(`input[name="${key}"], textarea[name="${key}"]`).after(
                        `<span class="text-danger">${value[0]}</span>`
                    );
                });
            }
        },
    });
});

$(document).ready(function () {
    // show hide path input depending on source
    $(document).on("change", ".storage", function () {
        let value = $(this).val();
        $(".source_input").val("");
        console.log("working");
        if (value == "upload") {
            $(".upload_source").removeClass("d-none");
            $(".external_source").addClass("d-none");
        } else {
            $(".upload_source").addClass("d-none");
            $(".external_source").removeClass("d-none");
        }
    });
});



$(document).on('submit', '.more_info_form', function(e){
    e.preventDefault();
    let formData = new FormData(this);

        $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });


    $.ajax({
        url: config.routes.courseUpdate,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
                if(data.status == 'success'){
                    console.log(data.message);
                    window.location.href = data.redirect_route;
                }
                
        },
        error: function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value){
                    $(`input[name="${key}"]`).addClass('is-invalid');
                    $(`input[name="${key}"]`).next('.text-danger').remove();
                    $(`input[name="${key}"]`).after(`<span class="text-danger">${value[0]}</span>`);
                });
            }
        },
    });
});


$(document).on("submit", ".basic-info-update-form", function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: config.routes.courseUpdate,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == "success") {
                notyf.success(data.message);
                window.location.href = data.redirect_route;
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $(`input[name="${key}"], textarea[name="${key}"]`).addClass(
                        "is-invalid"
                    );
                    $(`input[name="${key}"], textarea[name="${key}"]`)
                        .next(".text-danger")
                        .remove();
                    $(`input[name="${key}"], textarea[name="${key}"]`).after(
                        `<span class="text-danger">${value[0]}</span>`
                    );
                });
            }
        },
    });
});



$(document).on('click', '.course-tab', function(e){
    e.preventDefault();
    let step = $(this).data('step');
    $('.course-form').find('input[name=next_step]').val(step);
    $('.course-form').trigger('submit');
})



var loader = `
<div class="modal-content text-center p-3" style="display:inline">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
`;



$('.dynamic-modal-btn').on('click', function(e){
    e.preventDefault();
    $('.dynamic-modal').modal('show');

    let course_id = $('.dynamic-modal-btn').data('id');

    $.ajax({
        url: config.routes.createChapter,
        method: 'GET',
        data: {
            course_id: course_id
        },
        beforeSend: function(){
            $('.dynamic-modal-content').html(loader);
        },
        success: function(data){
             $('.dynamic-modal-content').html(data);
        },
          error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $(`input[name="${key}"], textarea[name="${key}"]`).addClass(
                        "is-invalid"
                    );
                    $(`input[name="${key}"], textarea[name="${key}"]`)
                        .next(".text-danger")
                        .remove();
                    $(`input[name="${key}"], textarea[name="${key}"]`).after(
                        `<span class="text-danger">${value[0]}</span>`
                    );
                });
            }
        },
    })
})