$("#id_number").keydown(function () {
    if ($(this).val().length < 12) {
        $(this).addClass("is-invalid");
    } else {
        $(this).removeClass('is-invalid');
    }
});

$("#mobile_number").keydown(function () {
    if ($(this).val().length < 9) {
        $(this).addClass("is-invalid");
    } else {
        $(this).removeClass('is-invalid');
    }
});
