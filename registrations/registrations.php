<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "shortcut icon" href = "../Images/lgoo.ico" />

    <title>Innoventions'19 | Registration Form</title>

    <link rel="stylesheet" href="registrations.css">

    <script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="registrations.js"></script>

</head>
<body>

    <div id='top' style='width: 0; height: 0;'></div>
    <img src="../Images/top.png" alt="" class="goback">
    <div class="progress__alert">i</div>
    <div class="progress">
        <p id='progress__page'>Page 1 | Institute Info</p>
        <div class="progress__bar">
            <div class="progress__juice"></div>
        </div>
    </div>

    <div id="overlay">
    </div>

    <div class="wrap">
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
                    <li><a>Contact Us</a></li>
                </ul>
            </nav>
            <a id='active' class="nav__button" href='registrations.php'><button>Register</button></a>
            <img class='nav__scienceSociety' src="../Images/abdussalam.png" alt="">
        </div>

        <div class="heading">
            <h1>Innoventions'19 | Registration Form</h1>
        </div>

        <div class="container">
            <div class="form">
                <h2>Welcome!</h2>
                <p id = 'Info'>
                    Please note the following before you continue with the registration:<br><br>
                </p>
                <ol>
                    <li>Delegate Fee: 3000 Rs | Delegation Fee: 3000 Rs</li><br>
                    <li>There are a total of 14 sub-events, divided into four groups:<br><br>
                        <ul id='parent'>
                            <li>
                                Group A:<br>
                                <ul id = 'child'><li>DASSP</li></ul>
                            </li>
                            <li>
                                Group B:<br>
                                <ul id = 'child'>
                                    <li>Mathalon</li>
                                    <li>Panacea</li>
                                    <li>Renaissance</li>
                                    <li>Novum</li>
                                </ul>
                            </li>
                            <li>
                                Group C:<br>
                                <ul id = 'child'>
                                    <li>Artifice</li>
                                    <li>Kryptos</li>
                                    <li>Project X</li>
                                    <li>Enfilade</li>
                                    <li>Fantasm</li>
                                </ul>
                            </li>
                            <li>
                                Group D:<br>
                                <ul id = 'child'>
                                    <li>Crime Conundrum</li>
                                    <li>Bit by Bit</li>
                                    <li>Envirothon</li>
                                    <li>Final Problem</li>
                                </ul>
                            </li>
                        </ul><br>
                    </li><br>
                    <li>Group A is <b>compulsory</b></li><br>
                    <li>Each team must select two sub-events from each group, in order of preference.</li><br>
                    <li>Each team must have 6 members.</li><br>
                    <li>You will have to identify each team distinctively by selecting an arbitrary letter (e.g. team X), making sure you do not select the same letter twice.</li><br>
                    <li>Each entry, in this form, is <b>required</b> - unless otherwise specified.</li><br>
                    <li>It is <b>strongly</b> advised you recheck each entry before submitting the form.</li><br>
                    <li>If you must change your registration info after you've submitted the form, contact us at fake1@mail.com or fake2@mail.com.</li><br>
                    <li>You must follow certain formats in this document (Although you will be informed if you make an error):
                        <ul id = 'formats'>
                            <li>Your institution's name may only contain letters, numbers, dashes, periods and/or spaces.</li><br>
                            <li>Phone numbers may only contain numbers, dashes, spaces and "+", eg: +92 XXX XXXXXXX or 0345-XXXXXXX</li><br>
                            <li>Emails are expected to strictly follow the standard format they generally have</li><br>
                            <li>Names may only contain lowercase/uppercase letters or spaces</li><br>
                            <li>If, however, your information really doesn't follow the specified formats, let us know by contacting us on <a>facebook</a> or one of the emails specified above</li>
                        </ul>
                    </li><br>
                    <li><b>Important:</b> Make sure the institution's name is entered accurately considering our system identifies institutions that are registering additional teams.</li><br>
                    <li>Press 'continue' to register.</li><br>
                </ol><br>
                <?php

                if (isset($_GET['err'])) {
                    echo "<div class = 'err'>";
                    if ($_GET['err'] === 'emptyFields') {
                        echo "<p class = 'err'>All fields are required!</p>";
                    }
                    if ($_GET['err'] === 'invalidEmail') {
                        echo "<p class = 'err'>Invalid Institution Email (Valid format: abc@mail.com)</p>";
                    }
                    if ($_GET['err'] === 'invalidName') {
                        echo "<p class = 'err'>Invalid Institution Name (Letters, numbers, spaces and dashes are allowed)</p>";
                    }
                    if ($_GET['err'] === 'invalidContact') {
                        echo "<p class = 'err'>Invalid Contact Number (Valid examples: +92 302 2348667, 0334-6186451 etc)</p>";
                    }
                }

                ?>
                <div id = 'continue'><a class = 'continue'>CONTINUE</a></div><br>
                <div class="divider"></div>
                <div class="first-form">
                    <form action="gateway.php" method='post'>
                        <p id="error">You cannot leave any field empty</p>
                        <div class="inputbox">
                            <p><span class ='inst-error'>Only letters, numbers, dashes, spaces and periods are allowed!</span></p>
                            <input type="text" name='institutionName' class = 'textinput' autocomplete = 'off'>
                            <label>Institution's Name</label>
                        </div>
                        <div class="inputbox">
                            <p><span class ='instcont-error'>Only numbers, dashes, "+" and spaces are allowed and the valid range is 9 to 16 characters!</span></p>
                            <input type="text" name='institutionContact' class = 'textinput' autocomplete = 'off'>
                            <label>Institution's Contact No.</label>
                        </div>
                        <div class="inputbox">
                            <p><span class ='instemail-error'>Please enter a valid email address!</span></p>
                            <input type="text" name='institutionEmail' class = 'textinput' autocomplete = 'off'>
                            <label>Institution's Email</label>
                        </div>
                        <div>
                            <p id='accom'>Do you require Accomodations?</p>
                            <div class = 'labels'>
                                <label class='container'>Yes
                                    <input type='radio' name='accomodations' value = 'Yes'>
                                    <span class='checkmark'></span>
                                </label>
                                <label class='container'>No
                                    <input type='radio' name='accomodations' value = 'No' checked>
                                    <span class='checkmark'></span>
                                </label>
                            </div>
                        </div>
                        <button id = 'continue' type='submit' name='submit-institution'>CONTINUE</button>
                        <p id="message"></p>
                    </form>
                </div>
                <?php
                if (isset($_GET['err'])) {
                    echo "
                        <script>
                        $('div#continue').hide();
                        $('div#continue a.continue').hide();
                        $('.divider').show();
                        </script>
                        </div><br>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>