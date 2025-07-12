     $(document).on("change", "#image", function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#showImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });