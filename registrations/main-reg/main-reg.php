<?php
session_start();
include 'db.php';

if (isset($_SESSION['institutionName']) && isset($_SESSION['institutionContact']) && isset($_SESSION['institutionEmail']) && isset($_SESSION['accomodations']) && isset($_SESSION['teamNum'])) {

$Mathalon = true;
$Panacea = true;
$Renaissance = true;
$Novum = true;
$Artifice = true;
$Kryptos = true;
$ProjectX = true;
$Enfilade = true;
$Fantasm = true;
$CrimeConundrum = true;
$BitbyBit = true;
$Envirothon = true;
$FinalProblem = true;

$sql = "SELECT * FROM eventscount WHERE e_id=1;";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if ($row["Renaissance"] >= 15) {
        $Renaissance = false;
    }
    if ($row["Enfilade"] >= 30) {
        $Enfilade = false;
    }
    if ($row["Mathalon"] >= 24) {
        $Mathalon = false;
    }
    if ($row["Panacea"] >= 25) {
        $Panacea = false;
    }
    if ($row["BitbyBit"] >= 15) {
        $BitbyBit = false;
    }
    if ($row["FinalProblem"] >= 25) {
        $FinalProblem = false;
    }
}


$teamNum = $_SESSION['teamNum'];
$sql1 = "SELECT * FROM teams WHERE t_institution=? AND tm_hd=?;";
$yes = "Yes";
$stmt1 = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt1, $sql1)) {
    echo "An unknown error occurred in our database, please try again later";
} else {
    mysqli_stmt_bind_param($stmt1, "ss", $_SESSION['institutionName'], $yes);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $_SESSION['newInstitution'] = false;
        if ($row1['teamNum'] >= $teamNum) {
            $teamNum = $row1['teamNum'] + 1;
        }
        array_push($_SESSION['exists'], $row1['team_id']);
        if ($_SESSION['institutionContact'] !== $row1['t_institutionContact']) {

        }
        if ($_SESSION['institutionEmail'] !== $row1['t_institutionContact']) {

        }
    }
}

$_SESSION['exists'] = array_unique($_SESSION['exists']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "shortcut icon" href = "../../Images/Innoventions.ico" />

    <title>Innoventions'19 | Registration Form</title>

    <link rel="stylesheet" href="main-reg.css">

    <script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="main-reg.js"></script>

</head>
<body>

<div id='top' style='width: 0; height: 0;'></div>
<img src="../../Images/top.png" alt="" class="goback">
<div class="progress__alert">i</div>
<div class="progress">
    <p id='progress__page'>Page 2 | Team Info</p>
    <p id='progress__teamDetails'>
        <u>Insitution Info</u>:<br>
        <?php echo "Name: ".$_SESSION['institutionName']; ?><br>
        <?php echo "Phone Num: ".$_SESSION['institutionContact']; ?><br>
        <?php echo "Email: ".$_SESSION['institutionEmail']; ?><br>
        Team #<?php echo $_SESSION['teamNum']; ?><br>
        <?php if (isset($_SESSION['exists'][1])) { ?>
        Registered Team Id/Ids: <?php
                                $a = 1;
                                while (isset($_SESSION['exists'][$a])) {
                                    if (isset($_SESSION['exists'][$a+1])) {
                                        echo $_SESSION['exists'][$a].", ";
                                    } else if (!isset($_SESSION['exists'][$a+1])) {
                                        echo $_SESSION['exists'][$a];
                                    }
                                    $a++;
                                }
                            ?><br>
        <?php } ?>
    </p>
    <p id="progress__change">
    <?php if ($_SESSION['teamNum'] > 1) { ?>
    Want to change insitution name, contact, email or accomodations status?<br>
    <a>Click here</a><br>
    Your first team's head delegate will recieve an email with a link to a page where the above info can be edited.<br><br>
    For any other changes (specific team info), contact us.
    <?php } else { ?>
    As this institution hasn't completed any team registrations yet, you may just go back and change the details manually.
    <?php } ?></p>
    <div class="progress__bar">
        <div class="progress__juice"></div>
    </div>
</div>

<div id="overlay">
</div>

<div class="wrap">
    <!-- navigation bar -->
    <div class='nav'>
        <a class="nav__logo" href='.../../index.html'><img src="../../Images/lgoo.png" alt="Innoventions Logo" ></a>

        <!-- Mobile view burger -->
        <div class="nav__menuBurger">
            <img src="../../Images/menu.png" alt="menu-burger" />
        </div>

        <!-- Navigation links -->
        <nav>
            <ul class='nav__links'>
                <li><a href='../../index.html#top' id='home'>Home</a></li>
                <li><a href="../../index.html#section_events"  id='events'>Events</a></li>
                <li><a href="../../index.html#team" id='ourTeam'>Our Team</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </nav>
        <a id='active' class="nav__button" href='../registrations.php'><button>Register</button></a>
        <img class='nav__scienceSociety' src="../../Images/abdussalam.png" alt="">
    </div>

    <div class="heading">
        <h1>Innoventions'19 | Registration Form</h1>
    </div>

    <div class="container">
        <div class="form">
                <p id='go-back'><a href = '../registrations.php'>Go Back (To First Page)</a></p>
                <div class="submit">Recheck all highlighted fields.</div>
                <h2>Team #<?php echo $teamNum; ?></h2>
                <form action="gateway2.php" method="post" id = 'team-form' enctype = 'multipart/form-data'>
                    <p id = 'id'>Team ID<br><span id = 'error-msg1'> (Please choose <u>one</u> uppercase letter)</span><span id='error-msg2'>Your institution already registered a team with this id!</span></p>
                    <input type="text" name="team-id" placeholder="Team ID (e.g: A, B, X)" id = 'id-in' onfocusout='checkId()' autocomplete="off" required>
                    <script type='text/javascript'>
                        function checkId() {
                            let inputVal = $("input[name=team-id]").val();
                            let existing = <?php echo json_encode($_SESSION['exists']); ?>;
                            let regex =  /^[A-Z]/;
                            let valid = regex.test(inputVal);

                            if (valid == false || inputVal.length !== 1) {
                                $("input[name=team-id]").css("border-color", "red");
                                $("input[name=team-id]").css("background", "rgba(255, 0, 0, 0.514)");
                                $('span#error-msg1').slideDown();
                                $('span#error-msg2').slideUp();
                            } else if (valid == true && inputVal.length === 1) {
                                $("input[name=team-id]").css("border-color", "#110149");
                                $("input[name=team-id]").css("background", "transparent");
                                $('span#error-msg1').slideUp();
                                if (existing.includes(inputVal)) {
                                    $('span#error-msg2').slideDown();
                                    $('html, body').animate({
                                    scrollTop: 0
                                    }, 100);
                                    $("input[name=team-id]").css("border-color", "red");
                                    $("input[name=team-id]").css("background", "rgba(255, 0, 0, 0.514)");
                                } else {
                                    $('span#error-msg2').slideUp();
                                    $("input[name=team-id]").css("border-color", "#110149");
                                    $("input[name=team-id]").css("background", "transparent");
                                }
                            }
                        }
                    </script>
                    <p class = 'pref'><b>Read the following before you continue:</b><br>
                    Select your first/second preference below.<br>
                    Your cannot select the same preference twice.<br>
                    <span id="red">red</span> = already select as the other preference.<br>
                    If any events are missing from the first preference list, the team-limit for that event has been reached!<br>
                    <br><br>First Preference (One from <b>each</b> group)</p>
                    <div class="labels-wrap">
                        <div class = 'labels'>
                            <p class='group'>Group B</p>
                            <?php if ($Mathalon) { ?>
                            <label class='container'>Mathalon
                                <input type='radio' name='1groupB' value = 'Mathalon'  checked>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            } 
                            if ($Panacea) {
                            ?>
                            <label class='container'>Panacea
                                <input type='radio' name='1groupB' value = 'Panacea'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Renaissance) {
                            ?>
                            <label class='container'>Renaissance
                                <input type='radio' name='1groupB' value = 'Renaissance'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Novum) {
                            ?>
                            <label class='container'>Novum
                                <input type='radio' name='1groupB' value = 'Novum' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            ?>
                        </div>
                        
                        <div class = 'labels'>
                            <p class = 'group'>Group C</p>
                            <?php if ($Artifice) { ?>
                            <label class='container'>Artifice
                                <input type='radio' name='1groupC' value = 'Artifice' checked>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Kryptos) {
                            ?>
                            <label class='container'>Kryptos
                                <input type='radio' name='1groupC' value = 'Kryptos'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($ProjectX) {
                            ?>
                            <label class='container'>Project X
                                <input type='radio' name='1groupC' value = 'ProjectX'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Enfilade) {
                            ?>
                            <label class='container'>Enfilade
                                <input type='radio' name='1groupC' value = 'Enfilade'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Fantasm) {
                            ?>
                            <label class='container'>Fantasm
                                <input type='radio' name='1groupC' value = 'Fantasm' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <?php } ?>
                        </div>
                        
                        <div class = 'labels'>
                            <p class='group'>Group D</p>
                            
                            <?php if ($CrimeConundrum) { ?>
                            <label class='container'>Crime Conundrum
                                <input type='radio' name='1groupD' value = 'CrimeConundrum' checked>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($BitbyBit) {
                            ?>
                            <label class='container' disabled>Bit by Bit
                                <input type='radio' name='1groupD' value = 'BitbyBit'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($Envirothon) {
                            ?>
                            <label class='container'>Envirothon
                                <input type='radio' name='1groupD' value = 'Envirothon'>
                                <span class='checkmark'></span>
                            </label>
                            <?php
                            }
                            if ($FinalProblem) {
                            ?>
                            <label class='container'>Final Problem
                                <input type='radio' name='1groupD' value = 'FinalProblem' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                    <br><br>
                    <p class='pref'>Secondary Preference</p>
                    <div class="labels-wrap">
                    <div class = 'labels'>
                            <p class='group'>Group B</p>
                            <label class='container'>Mathalon
                                <input type='radio' name='2groupB' value = 'Mathalon' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Panacea
                                <input type='radio' name='2groupB' value = 'Panacea'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Renaissance
                                <input type='radio' name='2groupB' value = 'Renaissance'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Novum
                                <input type='radio' name='2groupB' value = 'Novum' checked>
                                <span class='checkmark'></span>
                            </label>
                        </div>
                        
                        <div class = 'labels'>
                            <p class = 'group'>Group C</p>
                            <label class='container'>Artifice
                                <input type='radio' name='2groupC' value = 'Artifice' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Kryptos
                                <input type='radio' name='2groupC' value = 'Kryptos'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Project X
                                <input type='radio' name='2groupC' value = 'ProjectX'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Enfilade
                                <input type='radio' name='2groupC' value = 'Enfilade'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Fantasm
                                <input type='radio' name='2groupC' value = 'Fantasm' checked>
                                <span class='checkmark'></span>
                            </label>
                        </div>
                        
                        <div class = 'labels'>
                            <p class='group'>Group D</p>
                            <label class='container'>Crime Conundrum
                                <input type='radio' name='2groupD' value = 'CrimeConundrum' disabled>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Bit by Bit
                                <input type='radio' name='2groupD' value = 'BitbyBit'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Envirothon
                                <input type='radio' name='2groupD' value = 'Envirothon'>
                                <span class='checkmark'></span>
                            </label>
                            <label class='container'>Final Problem
                                <input type='radio' name='2groupD' value = 'FinalProblem' checked>
                                <span class='checkmark'></span>
                            </label>
                        </div>
                    </div><br><br>
                    <div class="members">
                        <div class="team-m">
                            <h4>Head Delegate</h4>
                            <p>Choose a 1 <b>:</b> 1 photo clearly showing your face</p>
                            <input type="file" name="image1" class="custom-file-input 1"><br><span class = 'fileName1' required></span><br><br>
                            <p class = 'name 1'>Name</p><span class="name-error"></span><br>
                            <input type="text" name='name1' placeholder='Name' class='name' required><br>
                            <p class = 'contact 1'>Contact Number</p><span class="cont-error"></span><br>
                            <input type="text" name='contactNumber1' placeholder='Contact Number' class = 'contact' required><br>
                            <p class = 'email 1'>Email Address</p><span class="em-error"></span><br>
                            <input type="text" name='email' placeholder='Email' id='email' required><br>
                        </div>
                    <?php

                    for ($i = 2; $i <= 6; $i++) {
                        echo "<div class='team-m'>
                                <h4>Delegate #".$i."</h4>
                                <p>Choose a 1 <b>:</b> 1 photo clearly showing your face</p>
                                <input type='file' name='image".$i."' class='custom-file-input ".$i."' required><br><span class = 'fileName".$i."'></span><br><br>
                                <p class = 'name 1'>Name</p><span class='name-error'></span><br>
                                <input type='text' name='name".$i."' placeholder='Name' class='name' required><br>
                                <p class = 'contact 1'>Contact Number</p><span class='cont-error'></span><br>
                                <input type='text' name='contactNumber".$i."' placeholder='Contact Number' class = 'contact' required><br>
                              </div>";
                    }

                    ?>
                    </div>
                    <button type="submit" name = 'main-reg-submit-continue' id = 'main-reg-submit'>Register another Team</button><br>
                    OR<br>
                    <button type="submit" name = 'main-reg-submit' id = 'main-reg-submit'>Submit</button>
                </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
} else {
    header('Location: ../registrations.php');
    exit();
}
?>