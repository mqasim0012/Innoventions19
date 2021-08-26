let colored = false;
let navBarColor = "#0f1f47";

window.addEventListener("load", function() {
    $('#overlay').fadeOut(1000, "linear");
});

$(document).ready(function() {
    let inputVal;
    let valid = true;
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

    $('div#continue a.continue').click(function() {
        $('.first-form').slideToggle();
        $('div#continue a.continue').hide();
        $('.divider').show();
        $('html, body').animate({
            scrollTop: $(".first-form form").offset().top
        }, 1000);
    });

    $('.first-form form input[type=text]').focus(function() {
        $('.first-form form p.form-label').slideDown();
    });

    $("input[type=text][name=institutionName]").focusout(function() {
        inputVal = $(this).val();
        let regex = /^[A-Za-z0-9-.\s]*$/;
        valid = regex.test(inputVal);
        if (valid === false || inputVal.length < 1) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length === 0) {
                $(this).next().css("z-index", "2");
                $('p#error').slideDown();
            } else {
                $(this).next().css("z-index", "-1");
                $("span.inst-error").slideDown();
            }
        } else if (valid === true && inputVal.length >= 1) {
            $(this).css("border-color", navBarColor);
            $(this).css("background", "transparent");
            $(this).next().css("z-index", "-1");
            $("span.inst-error").slideUp();
        }
        if (inputVal.length >= 1) {
            $('p#error').slideUp();
        }
    });

    $("input[type=text][name=institutionContact]").focusout(function() {
        inputVal = $(this).val();
        let regex = /^[0-9-+\s]*$/;
        valid = regex.test(inputVal);
        if (valid === false || inputVal.length < 9 || inputVal.length > 16) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length === 0) {
                $('p#error').slideDown();
                $(this).next().css("z-index", "2");
            } else {
                $("span.instcont-error").slideDown();
                $(this).next().css("z-index", "-1");
            }
        } else if (valid === true && inputVal.length >= 9 && inputVal.length <= 16) {
            $(this).css("border-color", navBarColor);
            $(this).css("background", "transparent");
            $("span.instcont-error").slideUp();
        }
        if (inputVal.length >= 1) {
            $('p#error').slideUp();
            $(this).next().css("z-index", "-1");
        }
    });

    $("input[type=text][name=institutionEmail]").focusout(function() {
        inputVal = $(this).val();
        let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        valid = regex.test(inputVal);
        if (valid === false || inputVal.length < 5) {
            $(this).css("border-color", "red");
            $(this).css("background", "rgba(255, 0, 0, 0.514)");
            if (inputVal.length === 0) {
                $('p#error').slideDown();
                $(this).next().css("z-index", "2");
            } else {
                $("span.instemail-error").slideDown();
                $(this).next().css("z-index", "-1");
            }
        } else if (valid === true && inputVal.length >= 5) {
            $(this).css("border-color", navBarColor);
            $(this).css("background", "transparent");
            $("span.instemail-error").slideUp();
        }
        if (inputVal.length >= 1) {
            $('p#error').slideUp();
            $(this).next().css("z-index", "-1");
        }
    });

    $( "form" ).submit(function(event) {
        event.preventDefault();
        let institutionName = $("input[type=text][name=institutionName]").val();
        let institutionEmail = $("input[type=text][name=institutionEmail]").val();
        let institutionContact = $("input[type=text][name=institutionContact]").val();
        let accomodations = $("input[type=radio][name=accomodations]").val();
        let submitInstitution = $("button[type=submit]").val();

        $('p#message').load("gateway.php", {
            institutionName: institutionName,
            institutionEmail: institutionEmail,
            institutionContact: institutionContact,
            accomodations: accomodations,
            submitInstitution: submitInstitution
        });
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

window.onscroll = dedicatedHandler;

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

    $(".container .form ol").addClass("in");
}

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Required field!");
            }
        };

        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});

function dedicatedHandler() {
    let contentHeight = $(window).height();
    let yOffset = window.pageYOffset;
    $("body").css("background-size", "cover");
    colored = false;

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






