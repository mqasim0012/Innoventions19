<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel = "shortcut icon" href = "../Images/lgoo.ico" />
    
    <title>Innoventions'19 | Contact Form</title>

    <!-- css -->
    <link rel="stylesheet" href="../css/contact.css">

    <!-- js -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/contact.js"></script>

</head>
<body>

    <div id='top' style='width: 0; height: 0;'></div>
    <img src="../Images/top.png" alt="" class="goback">

    <!-- Just to hide the initial jitter (preloader, a basic version of it) -->
    <div id="overlay"></div>

    <!-- welcome screen -->
    <header>
        <!-- navigation bar -->
        <div class='nav'>
            <a class="nav__logo" href='../index.html'><img src="../Images/lgoo.png" alt="Innoventions Logo" ></a>

            <!-- Mobile view burger -->
            <div class="nav__menuBurger">
                <img src="../Images/menu.png" alt="menu-burger" />
            </div>

            <!-- Navigation links -->
            <nav>
                <ul class='nav__links'>
                    <li><a href='../index.html#top' id='home'>Home</a></li>
                    <li><a href="../index.html#section_events"  id='events'>Events</a></li>
                    <li><a href="../index.html#team" id='ourTeam'>Our Team</a></li>
                    <li  id = 'active'><a href='contactForm.php'>Contact Us</a></li>
                </ul>
            </nav>
            <a class="nav__button" href='../registrations/registrations.php'><button>Register Now!</button></a>
            <img class='nav__scienceSociety' src="../Images/abdussalam.png" alt="">
        </div>
    </header>

    <form class="content__form">
        <h1>Contact Us</h1>
        <div class="form">
            <input type="text" name="name" autocomplete="off"><br>
            <input type="text" name="email" autocomplete="off"><br>
            <div class="labes-container">
                <p id='accom'>Reason for contacting us?</p>
                <div class = 'labels'>
                    <label class='container'>Registration Changes
                        <input type='radio' name='accomodations' value = 'Yes'>
                        <span class='checkmark'></span>
                    </label>
                    <label class='container'>General query
                        <input type='radio' name='accomodations' value = 'No' checked>
                        <span class='checkmark'></span>
                    </label>
                </div>
            </div>
            <textarea type="text" autocomplete="off"></textarea><br>
        </div>
    </form>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="contactForm.js"></script>
</body>
</html>