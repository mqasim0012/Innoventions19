/*
To any wannabe hackers who got here:
    Don't even think about disabling the error handlers, there are backup error handlers on the server as well...besides, it only shows your lack of understanding about client-side and server-side scripting...client-side error handlers were just added to make the form more dynamic.
*/
let colored = false;
let navBarColor = "#0f1f47";
let domDone = false;

window.addEventListener("load", function() {
    $('#overlay').fadeOut(500, "linear", function() {
        $(".progress__alert").addClass("shake");
        $(".progress__alert").delay(2500).removeClass("shake");
    });
});

$(document).ready(function() {
    var inputVal = "";
    let valid = false;
    let ext = "";
    let fileSize = "";
    let regex = "";

    initialSetup();

    // The dropdown in mobile-view
    $('.nav__menuBurger').click(function() {
        if (window.innerWidth < 900) {
            let contentHeight = $(window).height();
            if (window.pageYOffset <= contentHeight*0.9) {
                if (!colored) {
                    $(".nav").css("background", navBarColor);
                    $('nav, .nav__button').slideDown(300);
                } else if (colored) {
                    $('nav, .nav__button').slideUp(300, "linear", function() {
                        $(".nav").css("background", "transparent");
                    });
                }
                colored = !colored;
            } else if (window.pageYOffset > contentHeight*0.9) {
                $(".nav").css("background", navBarColor);
                $('nav, .nav__button').slideToggle(300, "linear");
            }
        }
    });

    $('.nav .menu-burger img').click(function() {
        $('.nav .links').slideToggle();
    });

    $('input#id-in').focus(function() {
        $('#id').slideDown();
    });

    // Image checks
    $('.custom-file-input.1').change(function(e){
        $('.fileName1').text("Checking file");

        ext = $('.custom-file-input.1').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.1")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName1").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.1').val("");
            $('.custom-file-input.1').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName1").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1024 KB)!</p>");
            $('.custom-file-input.1').val("");
            $('.custom-file-input.1').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName1').text(fileName);
        }
    });
    $('.custom-file-input.2').change(function(e){
        $('.fileName2').text("Checking file");

        ext = $('.custom-file-input.2').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.2")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName2").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.2').val("");
            $('.custom-file-input.2').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName2").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1024 KB)!</p>");
            $('.custom-file-input.2').val("");
            $('.custom-file-input.2').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName2').text(fileName);
        }
    });
    $('.custom-file-input.3').change(function(e){
        $('.fileName3').text("Checking file");

        ext = $('.custom-file-input.3').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.3")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName3").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.3').val("");
            $('.custom-file-input.3').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName3").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1034 KB)!</p>");
            $('.custom-file-input.3').val("");
            $('.custom-file-input.3').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName3').text(fileName);
        }
    });
    $('.custom-file-input.4').change(function(e){
        $('.fileName4').text("Checking file");

        ext = $('.custom-file-input.4').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.4")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName4").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.4').val("");
            $('.custom-file-input.4').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName4").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1044 KB)!</p>");
            $('.custom-file-input.4').val("");
            $('.custom-file-input.4').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName4').text(fileName);
        }
    });
    $('.custom-file-input.5').change(function(e){
        $('.fileName5').text("Checking file");

        ext = $('.custom-file-input.5').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.5")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName5").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.5').val("");
            $('.custom-file-input.5').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName5").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1024 KB)!</p>");
            $('.custom-file-input.5').val("");
            $('.custom-file-input.5').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName5').text(fileName);
        }
    });
    $('.custom-file-input.6').change(function(e){
        $('.fileName6').text("Checking file");

        ext = $('.custom-file-input.6').val().split('.').pop().toLowerCase();
        fileSize = $(".custom-file-input.6")[0].files[0].size / 1024 / 1024;
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".fileName6").html("<p id = 'fileErr'>Rejected! Only png, jpg and jpeg images are allowed!</p>");
            $('.custom-file-input.6').val("");
            $('.custom-file-input.6').html("");
        } else if (fileSize > 1 || fileSize < 0) {
            $(".fileName6").html("<p id = 'fileErr'>Rejected! Maximum file size is 1 MB (1024 KB)!</p>");
            $('.custom-file-input.6').val("");
            $('.custom-file-input.6').html("");
        } else {
            var fileName = e.target.files[0].name;
            $('.fileName6').text(fileName);
        }
    });

    // team Id check
    /*$("input#id-in").focusout(function() {
        inputVal = $(this).val();
        regex =  /^[A-Z]/;
        valid = regex.test(inputVal);
        if (valid == false || inputVal.length !== 1) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            $('span#error-msg1').slideDown();
        } else if (valid == true && inputVal.length === 1) {
            $(this).css("border-color", "#110149");
            $(this).css("background", "transparent");
            $('span#error-msg1').slideUp();
        }
    });*/

    $("input[type=radio][name=1groupB]").change(function() {
        inputVal = $("input[type=radio][name=1groupB]:checked").val();
        $("input[type=radio][name=2groupB]").attr("disabled", false);
        let secPref = $("input[type=radio][name=2groupB][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });
    $("input[type=radio][name=1groupC]").change(function() {
        inputVal = $("input[type=radio][name=1groupC]:checked").val();
        $("input[type=radio][name=2groupC]").attr("disabled", false);
        let secPref = $("input[type=radio][name=2groupC][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });
    $("input[type=radio][name=1groupD]").change(function() {
        inputVal = $("input[type=radio][name=1groupD]:checked").val();
        $("input[type=radio][name=2groupD]").attr("disabled", false);
        let secPref = $("input[type=radio][name=2groupD][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });

    $("input[type=radio][name=2groupB]").change(function() {
        inputVal = $("input[type=radio][name=2groupB]:checked").val();
        $("input[type=radio][name=1groupB]").attr("disabled", false);
        let secPref = $("input[type=radio][name=1groupB][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });
    $("input[type=radio][name=2groupC]").change(function() {
        inputVal = $("input[type=radio][name=2groupC]:checked").val();
        $("input[type=radio][name=1groupC]").attr("disabled", false);
        let secPref = $("input[type=radio][name=1groupC][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });    $("input[type=radio][name=2groupD]").change(function() {
        inputVal = $("input[type=radio][name=2groupD]:checked").val();
        $("input[type=radio][name=1groupD]").attr("disabled", false);
        let secPref = $("input[type=radio][name=1groupD][value="+inputVal+"]");
        secPref.attr("checked", false);
        secPref.attr("disabled", true);
    });

    // Name Check
    $("input.name").focusout(function() {
        inputVal = $(this).val();
        regex = /^[A-Za-z\s.]*$/;

        valid = regex.test(inputVal);
        if (!valid || inputVal.length < 1) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length >= 1) {
                $(this).prev().prev().text("Only letters, spaces and periods are allowed");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            } else {
                $(this).prev().prev().text("This field may not be left empty!");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            }
        } else if (valid && inputVal.length >= 1) {
            $(this).css("border-color", "#110149");
            $(this).css("background", "transparent");
            $(this).prev().slideUp();
            $(this).prev().prev().slideUp();
        }
    });

    // Contact check
    $("input.contact").focusout(function() {
        inputVal = $(this).val();
        regex = /^[0-9-+\s]*$/;

        valid = regex.test(inputVal);
        if (!valid || inputVal.length < 9 || inputVal.length > 16) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length >= 9 && inputVal.length <= 16) {
                $(this).prev().prev().text("Only letters, dashes spaces and '+' are allowed. E.g: +92 321 8857112/0321-8857112");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            } else if (inputVal.length === 0) {
                $(this).prev().prev().text("This field may not be left empty!");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            } else if (inputVal.length >= 16 || inputVal.length <= 9) {
                $(this).prev().prev().text("Phone numbers may only be 9 to 16 characters long (spaces included)");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            }
        } else if (valid && inputVal.length >= 9 && inputVal.length <= 16) {
            $(this).css("border-color", "#110149");
            $(this).css("background", "transparent");
            $(this).prev().slideUp();
            $(this).prev().prev().slideUp();
        }
    });

    // Email Check
    $("input#email").focusout(function() {
        inputVal = $(this).val();
        regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        valid = regex.test(inputVal);
        if (!valid || inputVal.length < 1) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length >= 1) {
                $(this).prev().prev().text("Enter a valid email address!");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            } else {
                $(this).prev().prev().text("This field may not be left empty!");
                $(this).prev().slideDown();
                $(this).prev().prev().slideDown();
            }
        } else if (valid && inputVal.length >= 1) {
            $(this).css("border-color", "#110149");
            $(this).css("background", "transparent");
            $(this).prev().slideUp();
            $(this).prev().prev().slideUp();
        }
    });

    $('.goback').click(function() {
        $('html, body').animate({
            scrollTop: $("#top").offset().top
        }, 800);
    });
});

$(window).resize(function() {
    let yOffset = window.pageYOffset;
    if (window.innerWidth > 900) {
        $('nav, .nav__button').show();
    } else if (window.innerWidth <= 900) {
        $('nav, .nav__button').hide();
    }
    colored = false;
    if (window.pageYOffset <= 10) {
        $(".nav").css("background", "transparent");
    } else if (window.pageYOffset > 10) {
        $(".nav").css("background", navBarColor);
    }
    if (yOffset >= 20) {
        $(".goback").addClass("in");
        $(".progress, .progress__alert").css("bottom", "50px");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
        $(".progress, .progress__alert").css("bottom", "10px");
    }
});

function initialSetup() {
    let contentHeight = $(window).height();
    let yOffset = window.pageYOffset;

    if (yOffset < contentHeight*0.25) {
        $(".heading").addClass('in');
    } else if (yOffset >= contentHeight*0.25) {
        $(".heading").removeClass('in');
    }

    if (window.pageYOffset > 10) {
        $(".nav").css("background", navBarColor);
    } else if (window.pageYOffset <= 10) {
        if (window.innerWidth > 900) {
            $(".nav").css("background", "transparent");
        }
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
        $(".progress, .progress__alert").css("bottom", "50px");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
        $(".progress, .progress__alert").css("bottom", "10px");
    }
} 

window.onscroll = dedicatedHandler;

function dedicatedHandler() {
    let contentHeight = $(window).height();
    let yOffset = window.pageYOffset;

    $("body").css("background-size", "cover");

    if (window.pageYOffset > 10) {
        $(".nav").css("background", navBarColor);
        if (window.innerWidth <= 900) {
            $('nav, .nav__button').slideUp(300, "linear");
        }
    } else if (window.pageYOffset <= 10) {
        if (window.innerWidth > 900) {
            $(".nav").css("background", "transparent");
        } else if (window.innerWidth <= 900) {
            $(".nav").css("background", "transparent");
            $('nav, .nav__button').slideUp(300, "linear");
        }
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
        $(".progress, .progress__alert").css("bottom", "50px");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
        $(".progress, .progress__alert").css("bottom", "10px");
    }

    if (yOffset < contentHeight*0.25) {
        $(".heading").addClass('in');
    } else if (yOffset >= contentHeight*0.25) {
        $(".heading").removeClass('in');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity(" ");
                e.target.style.background = 'rgba(255, 0, 0, 0.514)';
                if (!domDone) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 1000);
                    domDone = true;
                }
                $("div.submit").delay(1000).slideDown();
            } else {
                $("div.submit").slideUp();
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});