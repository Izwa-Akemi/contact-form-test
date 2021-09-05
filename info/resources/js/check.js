$(function () {

    //お名前チェック
    $("#firstname").on("input change", function () {
        if ($("#firstname").val() === "") {
            $('#err-firstname1').css({ "display": "block", "color": "red" });
            $('#err-firstname2').css("display", "none");
        } else if ($(this).val().length > 125) {
            $('#err-firstname2').css({ "display": "block", "color": "red" });
            $('#err-firstname1').css("display", "none");
        } else {
            $('#err-firstname1').css("display", "none");
            $('#err-firstname2').css("display", "none");
        }
    });
    //お名前チェック名前
    $("#lastname").on("input change", function () {
        if ($("#lastname").val() === "") {
            $('#err-lastname1').css({ "display": "block", "color": "red" });
            $('#err-lastname2').css("display", "none");
        } else if ($(this).val().length > 125) {
            $('#err-lastname2').css({ "display": "block", "color": "red" });
            $('#err-lastname1').css("display", "none");
        } else {
            $('#err-lastname1').css("display", "none");
            $('#err-lastname2').css("display", "none");
        }
    });

    //性別チェック
    $('[name="gender"]:radio').on("input change", function () {
        if ($(this).val() === "") {
            $('#err-gender').css({ "display": "block", "color": "red" });
        } else {
            $('#err-gender').css("display", "none");
        }
    });

    //メールアドレスチェック
    $("#email").on("input change", function () {
        if ($("#email").val() === "") {
            $('#err-email1').css({ "display": "block", "color": "red" });
            $('#err-email2').css("display", "none");
        } else if (!$("#email").val().match(/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/)) {
            $('#err-email2').css({ "display": "block", "color": "red" });
            $('#err-email1').css("display", "none");
        } else {
            $('#err-email1').css("display", "none");
            $('#err-email2').css("display", "none");
        }
    });

    //〒番号
    $("#post").on("input change blur", function () {
        if ($(this).val() === "") {
            $('#err-postcode1').css({ "display": "block", "color": "red" });
            $('#err-postcode2').css("display", "none");
            $('#err-postcode3').css("display", "none");
        } else if (!$(this).val().match(/^[0-9]{3}-[0-9]{4}$/)) {
            $('#err-postcode2').css({ "display": "block", "color": "red" });
            $('#err-postcode1').css("display", "none");
            $('#err-postcode3').css("display", "none");
        } else if ($(this).val().length > 9) {
            $('#err-postcode3').css({ "display": "block", "color": "red" });
            $('#err-postcode1').css("display", "none");
            $('#err-postcode2').css("display", "none");
        } else {
            $('#err-postcode1').css("display", "none");
            $('#err-postcode2').css("display", "none");
            $('#err-postcode3').css("display", "none");
        }
    });

    //住所
    $("#address").on("input change", function () {
        if ($("#address").val() === "") {
            $('#err-address1').css({ "display": "block", "color": "red" });
            $('#err-address2').css("display", "none");
        } else if ($("#address").val().length > 256) {
            $('#err-address2').css({ "display": "block", "color": "red" });
            $('#err-address1').css("display", "none");
        } else {
            $('#err-address1').css("display", "none");
            $('#err-address2').css("display", "none");
        }
    });


    //建物チェック
    $("#building_name").on("input change", function () {
        if ($(this).val().length > 256) {
            $('#err-building_name').css({ "display": "block", "color": "red" });
        } else {
            $('#err-building_name').css("display", "none");
        }
    });

    //ご意見
    $("#opinion").on("input change", function () {
        if ($("#opinion").val() === "") {
            $('#err-opinion1').css({ "display": "block", "color": "red" });
            $('#err-opinion2').css("display", "none");
        } else if ($("#opinion").val().length > 121) {
            $('#err-opinion2').css({ "display": "block", "color": "red" });
            $('#err-opinion1').css("display", "none");
        } else {
            $('#err-opinion1').css("display", "none");
            $('#err-opinion2').css("display", "none");

        }
    });
});
