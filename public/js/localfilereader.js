(function ($) {
    if (!window.FileReader) {
        $("#avatar").hide();
    }

    $("#file").on("change", function (e) {

        var $avatar = $("#avatar");

        var url = e.target.files;

        if (url.length != 1 || !url[0].type.match("image.*")) {
            $(e.target).val("");

            $(".modal").modal("show");
            Holder.run({images: "#avatar"});

            return false;
        }

        var file = url[0];

        var reader = new FileReader();
        reader.onload = function (e) {
            $avatar.attr("src", e.target.result).attr("alt", encodeURI(file.name));
        };

        reader.readAsDataURL(file);
    });
})(jQuery);