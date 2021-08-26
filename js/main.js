// Declared here to give it a global scope
let colored = false;
let navBarColor = "#0f1f47";
let clicked = false;

// Hides any possible jitters while screen loads
window.addEventListener("load", function() {
    $('div#overlay').fadeOut(1000, "linear");
});

$(document).ready(function() {
    // This function is meant for any initial animations
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
    // 09/13/2019 00:00 || Sept 13, 2019 00:00:00
    // Fetch and calculate values for the countdown (Poached from w3shool)
    var countDownDate = new Date("09/13/2019 00:00").getTime();
    var countDownFunction = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        if (days < 10) {
            days = "0" + days;
        }
        if (hours < 10) {
            hours = "0" + hours;
        }
        $("div#countdown p#days span.time").text(days);
        $("div#countdown p#hours span.time").text(hours);
        if (distance < 0) {
            // Add something if you want, I'll completely remove the object later, if you decide not to add any alternate message
            $("div#countdown").text("");
        }
    }, 1000);

    $(".seemore").click(function() {
        var event = $(this).next().val();
        $(this).load("events/fetchEvent.php", {
            event: event
        });
    });

    $('.goback').click(function() {
        $('html, body').animate({
            scrollTop: $("#top").offset().top
        }, 800);
    });

    $(".view").click(function() {
        if (!clicked) {
            $(".hbox").slideDown(300, function() {
                $(".view").addClass("clicked");
                $(".hElement").addClass("in");
            });
            $('html, body').animate({
                scrollTop: $(".view").offset().top
            }, 300);
        }
        if (clicked) {
            $(".hbox").slideUp(300, function() {
                $(".view").removeClass("clicked");
                $(".hElement").removeClass("in");
            });
            $('html, body').animate({
                scrollTop: $(".directorate-wrapper").offset().top
            }, 300);
        }
        clicked = !clicked;
    });
});

// Makes sure shit doesn't go haywire if the screen size is arbitrarily changed
$(window).resize(function() {
    // Content height is just the inner height of the viewport window
    let windowHeight = $(window).height();
    let yOffset = window.pageYOffset;
    if (window.innerWidth > 900) {
        $('nav, .nav__button').show();
    } else if (window.innerWidth <= 900) {
        $('nav, .nav__button').hide();
    }
    colored = false;
    if (window.pageYOffset <= windowHeight*0.88) {
        $(".nav").css("background", "transparent");
    } else if (window.pageYOffset > windowHeight*0.88) {
        $(".nav").css("background", navBarColor);
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }

    if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 ) {
        $("#home").css("color", "teal");
    } else {
        $("#home").css("color", "#edf0f1");
    }

    if (($('.events').offset().top - $(window).scrollTop()) <= windowHeight*0.5 && ($('.directorate-wrapper').offset().top - $(window).scrollTop()) >= windowHeight*0.5) {
        $("#events").css("color", "teal");
    } else if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#events").css("color", "#edf0f1");
    }

    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#ourTeam").css("color", "teal");
    }
    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < -windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) > windowHeight*0.5) {
        $("#ourTeam").css("color", "#edf0f1");
    }
});

// Handles 'scroll' events, the function 'scrollHandler()' is a few lines ahead
window.onscroll = scrollHandler;


function initialSetup() {
    // For now, it's only meant to configure the navigation bar's initial properties
    let windowHeight = $(window).height();
    let yOffset = window.pageYOffset;
    
    $(".hbox").hide();

    if (window.pageYOffset > windowHeight*0.88) {
        $(".nav").css("background", navBarColor);
    } else if (window.pageYOffset <= windowHeight*0.88) {
        if (window.innerWidth > 900) {
            $(".nav").css("background", "transparent");
        }
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }

    if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 ) {
        $("#home").css("color", "teal");
    } else {
        $("#home").css("color", "#edf0f1");
    }

    if (($('.events').offset().top - $(window).scrollTop()) <= windowHeight*0.5 && ($('.directorate-wrapper').offset().top - $(window).scrollTop()) >= windowHeight*0.5) {
        $("#events").css("color", "teal");
    } else if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#events").css("color", "#edf0f1");
    }

    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#ourTeam").css("color", "teal");
    }
    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < -windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) > windowHeight*0.5) {
        $("#ourTeam").css("color", "#edf0f1");
    }

    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < -windowHeight*0.5 ) {
        $("#contactUs").css("color", "teal");
    } else {
        $("#contactUs").css("color", "#edf0f1");
    }
}

function scrollHandler() {
    let windowHeight = $(window).height();
    let yOffset= window.pageYOffset;
    $(".wrap").css("background-size", "cover");
    colored = false;
    $(".wrap").css("height", "100vh");

    if (window.pageYOffset > windowHeight*0.88) {
        $(".nav").css("background", navBarColor);
        if (window.innerWidth <= 900) {
            $('nav, .nav__button').slideUp(300, "linear");
        }
    } else if (window.pageYOffset <= windowHeight*0.88) {
        if (window.innerWidth > 900) {
            $(".nav").css("background", "transparent");
        } else if (window.innerWidth <= 900) {
            $(".nav").css("background", "transparent");
            $('nav, .nav__button').slideUp(300, "linear");
        }
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }

    if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 ) {
        $("#home").css("color", "teal");
    } else {
        $("#home").css("color", "#edf0f1");
    }

    if (($('.events').offset().top - $(window).scrollTop()) <= windowHeight*0.5 && ($('.directorate-wrapper').offset().top - $(window).scrollTop()) >= windowHeight*0.5) {
        $("#events").css("color", "teal");
    } else if ( ($('.events').offset().top - $(window).scrollTop()) > windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#events").css("color", "#edf0f1");
    }

    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < windowHeight*0.5 ) {
        $("#ourTeam").css("color", "teal");
    }
    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < -windowHeight*0.5 || ($('.directorate-wrapper').offset().top - $(window).scrollTop()) > windowHeight*0.5) {
        $("#ourTeam").css("color", "#edf0f1");
    }

    if ( ($('.directorate-wrapper').offset().top - $(window).scrollTop()) < -windowHeight*0.5 ) {
        $("#contactUs").css("color", "teal");
    } else {
        $("#contactUs").css("color", "#edf0f1");
    }
}

// smooth scrolling
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});