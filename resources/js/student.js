     $(document).on("change", "#image", function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#showImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
});



   $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']]
            ]
        });