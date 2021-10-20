<?php

if (isset($_GET['event'])) {
    $event = $_GET['event'];
    $source = str_replace(" ", "%20", $event);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- No idea what these meta tags do -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- This icon is basicaly invisible in the tab, try to find a replacement -->
    <link rel = "shortcut icon" href = "../Images/lgoo.ico" />
    
    <title>Innoventions'19</title>
	
	
    <!-- css (Include your own css files here) -->
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" href="../css/events.css">

    <!-- js -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/events.js"></script>
    
    <script src="../js/wow.min.js"></script>
    <script>new WOW().init();</script>
    
    
    <?php
    echo "<style>
        html {
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(".$source.".jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
        
        @media (hover: none) {
            html {
                height: 110vh;
            }
        }
    </style>";
    ?>

</head>

<body>

    <div id="overlay">
    </div>

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
                    <li><a href='../index.html' id='home'>Home</a></li>
                    <li><a href="../index.html#section_events"  id='events'>Events</a></li>
                    <li><a href="../index.html#team" id='ourTeam'>Our Team</a></li>
                    <li><a href="../index.html#footer">Contact Us</a></li>
                </ul>
            </nav>
            <a class="nav__button" href='../registrations/registrations.php'><button>Register Now!</button></a>
            <img class='nav__scienceSociety' src="../Images/abdussalam.png" alt="">
        </div>
    </header>
    <div class="event" data-simplebar>
        <div class="event__flexbox">
            <h1 id='event__title'><?php echo $event; ?></h1>
            <div class="event__heads">
                <div class="event__heads__details">
                    <img src="../Images/DIrectorate/placeholder.jpg">
                    <ul class="event__heads__description">
                        <li>Event Head</li>
                        <li>Name Name</li>
                    </ul>
                </div>
                <div class="event__heads__details">
                    <img src="../Images/DIrectorate/placeholder.jpg" alt="">
                    <ul class="event__heads__description">
                        <li>Event Head</li>
                        <li>Name Name</li>
                    </ul>
                </div>
            </div>
            
            <div class="event__description">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisi risus, imperdiet id molestie id, lacinia non massa. Ut congue ante at ante aliquet, vitae volutpat metus venenatis. Aliquam ultrices sem ut ultrices tempus. Donec eros ante, hendrerit in leo consequat, hendrerit accumsan nunc. Vestibulum a nunc in lorem egestas sollicitudin. Mauris bibendum libero massa, sed maximus lorem porttitor eu. Duis at maximus quam, vel porttitor arcu. Integer nibh sapien, tristique ac sollicitudin id, fringilla sed risus. Sed malesuada lorem sit amet nulla euismod porta lacinia sed diam. Nulla malesuada iaculis dui ac pulvinar. Duis bibendum sit amet enim non dictum. Sed eget ante ultrices, pretium tortor vel, interdum lectus. Vestibulum pellentesque risus sed turpis luctus, id pretium turpis posuere. Aenean eget egestas felis. Maecenas eleifend, turpis id egestas maximus, arcu sem commodo odio, a pulvinar nisi dolor eu purus. Aenean ante elit, consectetur eu nisl at, aliquet faucibus ipsum.<br><br>
                    Mauris ex risus, ullamcorper eget dictum vitae, tincidunt et dui. Vivamus vel nunc est. Praesent convallis est eget finibus rhoncus. In vel consectetur ex, eget feugiat ex. Donec quis massa dictum, suscipit felis ut, finibus augue. Duis eu nulla id risus euismod volutpat sed id lorem. Pellentesque id libero porta, suscipit sapien id, hendrerit risus. Nunc magna mauris, vulputate id tellus id, condimentum dignissim libero. Praesent at nisi eu urna malesuada faucibus non ac felis.
                </p><br>
                <a href="html.pdf">Guide</a>
            </div>
        </div>
    </div>
    
    <div id='top' style='width: 0; height: 0; position: absolute; top: 0;'></div>
    <img src="../Images/top.png" alt="" class="goback">
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
</body>
</html>
<?php

} else {
    header("Location: ../index.html");
    exit;
}