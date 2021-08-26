<?php

if (isset($_POST['submitInstitution'])) {

    $institutionName = $_POST['institutionName'];
    $institutionContact = $_POST['institutionContact'];
    $institutionEmail = $_POST['institutionEmail'];
    $accomodations = $_POST['accomodations'];

    if (empty($institutionName)) {
        echo "Institution's name cannot be left empty";
    } else if (empty($institutionContact)) {
        echo "Institution's contact number cannot be left empty";
    } else if (empty($institutionEmail)) {
        echo "Institution email cannot be left empty";
    } else if (empty($accomodations)) {
        echo "You must select 'yes' or 'no' for accomodations";
    } else if (!filter_var($institutionEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Email invalid";
    } else if (!preg_match("/^[a-zA-Z0-9-.]*$/", str_replace(' ', '', $institutionName))) {
        echo "Institution name invalid!";
    } else if (!preg_match("/^[0-9-+]*$/", str_replace(' ', '', $institutionContact))) {
        echo "Institution's contact info is invalid!";
    } else {
            session_start();
            $_SESSION['institutionName'] = $institutionName;
            $_SESSION['institutionContact'] = $institutionContact;
            $_SESSION['institutionEmail'] = $institutionEmail;
            $_SESSION['accomodations'] = $accomodations;
            $_SESSION['teamNum'] = 1;
            $_SESSION['exists'] = array(" ");
            $_SESSION['newInstitution'] = true;
            echo "<script> window.location = 'main-reg/main-reg.php'; </script>";
    }
} else {
    echo 'An unidentifiable error occured!';
}