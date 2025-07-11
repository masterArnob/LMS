// for changing the profile image in admin panel
$(document).on("change", "#image", function (e) {

    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImage").css("background-image", "url(" + e.target.result + ")");
    };
    reader.readAsDataURL(e.target.files[0]);
});
// for changing the profile image in admin panel
