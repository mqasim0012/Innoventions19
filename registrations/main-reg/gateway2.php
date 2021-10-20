<?php

include 'db.php';
session_start();
$maxSize = 1024*1024;
$countersUpdated = false;

if (isset($_POST['main-reg-submit']) || isset($_POST['main-reg-submit-continue'])) {

if (isset($_SESSION['institutionName']) && isset($_SESSION['institutionContact']) && isset($_SESSION['institutionEmail']) && isset($_SESSION['accomodations']) && isset($_SESSION['teamNum'])) {

    $institutionName = $_SESSION['institutionName'];
    $institutionContact = $_SESSION['institutionContact'];
    $institutionEmail = $_SESSION['institutionEmail'];
    $accomodations = $_SESSION['accomodations'];
    $teamNum = $_SESSION['teamNum'];
    $team_id = $_POST['team-id'];
    $teamPreferences = array($_POST['1groupB'], $_POST['1groupC'], $_POST['1groupD'], $_POST['2groupB'], $_POST['2groupC'], $_POST['2groupD']);
    $emptyPref = false;
    $samePref = false;
    $registrationComplete = false;

    for ($i = 0; $i <= 5; $i++) {
        if (!isset($teamPreferences)) {
            $emptyPref = true;
        } else if (count(array_unique($teamPreferences))<count($teamPreferences)) {
            $samePref = true;
        }
    }

    if (empty($team_id)) {
        header("Location: main-reg.php?err=emptyfields");
        exit();
    } else if (!preg_match("/^[A-Z]/", $team_id)) {
        header("Location: main-reg.php?err=invalidTeamId");
        exit();
    } else if ($emptyPref) {
        header("Location: main-reg.php?err=emptyPref");
        exit();
    } else if ($samePref) {
        header("Location: main-reg.php?err=samePref");
        exit();
    } else {
        $names = array("Unnecessary");
        for ($i = 1; $i <= 6; $i++) {
            $file = $_FILES["image".$i.""];

            $fileName = $_FILES["image".$i.""]["name"];
            $fileTmpName = $_FILES["image".$i.""]["tmp_name"];
            $fileSize = $_FILES["image".$i.""]["size"];
            $fileError = $_FILES["image".$i.""]["error"];
            $fileType = $_FILES["image".$i.""]["type"];
            $name = $_POST["name".$i.""];
            $contactNumber = $_POST["contactNumber".$i.""];
            if ($i === 1) {
                $email = $_POST['email'];
                if (empty($email)) {
                    header("Location: main-reg.php?err=emptyEmail");
                    exit();
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: main-reg.php?err=invalidEmail");
                    exit();
                }
                $hd = "Yes";
            } else {
                $email = "";
                $hd = "No";
            }

            if (empty($fileName) || empty($name) || empty($contactNumber)) {
                header("Location: main-reg.php?err=emptyField&mem=".$i."");
                exit();
            } else if (!preg_match("/^[a-zA-Z.]*$/", str_replace(' ', '', $name))) {
                header("Location: main-reg.php?err=invalidName&mem=".$i."");
                exit();
            } else if (!preg_match("/^[0-9-+]*$/", str_replace(' ', '', $contactNumber))) {
                header("Location: main-reg.php?err=invalidContact&mem=".$i."");
                exit();
            } else {

                array_push($names, $name);

                if (count(array_unique($names))<count($names)) {
                    $name = $name.$i;
                    $names[$i] = $names[$i].$i;
                }

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('png', 'jpg', 'jpeg');
                $fileUploaded = false;

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < $maxSize) {
                            $compressedName = str_replace(' ', '', $name);
                            $compressedInstitutionName = str_replace(' ', '', $institutionName);
                            $fileNameNew = $compressedInstitutionName.$team_id.$compressedName.".".$fileActualExt;
                            $fileDestination = '../../teamImages/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            $fileUploaded = true;
                        } else {
                            header("Location: main-reg.php?err=tooLarge");
                            exit();
                        }
                    } else {
                        header("Location: main-reg.php?err=upload");
                        exit();
                    }
                } else {
                    header("Location: main-reg.php?err=fileExt");
                    exit();
                }

                if ($fileUploaded === true) {
                    //Updating Counts | I, admittedly, used some ugly, redundant code here but if you have a better algorithm...go for it dude
                    
                    if (!$countersUpdated) {
                        //Phase 1: Fetching counters and appropriately incrementing each variable
                        $sqlcount = "SELECT * FROM eventscount;";
                        $result = mysqli_query($conn, $sqlcount);
                        $institutionCount = 0;
                        $teamCount = 0;
                        $participantCount = 0;
                        $Mathalon = 0;
                        $Panacea = 0;
                        $Renaissance = 0;
                        $Novum = 0;
                        $Artifice = 0;
                        $Kryptos = 0;
                        $ProjectX = 0;
                        $Enfilade = 0;
                        $Fantasm = 0;
                        $CrimeConundrum = 0;
                        $BitbyBit = 0;
                        $Envirothon = 0;
                        $FinalProblem = 0;

                        if ($row = mysqli_fetch_assoc($result)) {
                            if ($_SESSION['newInstitution']) {
                                $institutionCount = $row["institutionCount"] + 1;
                            } else {
                                $institutionCount = $row["institutionCount"];
                            }
                            $teamCount = $row['teamCount'] + 1;
                            $participantCount = $row['participantCount'] + 6;
                            if (in_array("Mathalon", $teamPreferences)) {
                                $Mathalon = $row["Mathalon"] + 1;
                            } else {
                                $Mathalon = $row["Mathalon"];
                            }
                            if (in_array("Panacea", $teamPreferences)) {
                                $Panacea = $row["Panacea"] + 1;
                            } else {
                                $Panacea = $row["Panacea"];
                            }
                            if (in_array("Renaissance", $teamPreferences)) {
                                $Renaissance = $row["Renaissance"] + 1;
                            } else {
                                $Renaissance = $row["Renaissance"];
                            }
                            if (in_array("Novum", $teamPreferences)) {
                                $Novum = $row["Novum"] + 1;
                            } else {
                                $Novum = $row["Novum"];
                            }
                            if (in_array("Artifice", $teamPreferences)) {
                                $Artifice = $row["Artifice"] + 1;
                            } else {
                                $Artifice = $row["Artifice"];
                            }
                            if (in_array("Kryptos", $teamPreferences)) {
                                $Kryptos = $row["Kryptos"] + 1;
                            } else {
                                $Kryptos = $row["Kryptos"];
                            }
                            if (in_array("ProjectX", $teamPreferences)) {
                                $ProjectX = $row["ProjectX"] + 1;
                            } else {
                                $ProjectX = $row["ProjectX"];
                            }
                            if (in_array("Enfilade", $teamPreferences)) {
                                $Enfilade = $row["Enfilade"] + 1;
                            } else {
                                $Enfilade = $row["Enfilade"];
                            }
                            if (in_array("Fantasm", $teamPreferences)) {
                                $Fantasm = $row["Fantasm"] + 1;
                            } else {
                                $Fantasm = $row["Fantasm"];
                            }
                            if (in_array("CrimeConundrum", $teamPreferences)) {
                                $CrimeConundrum = $row["CrimeConundrum"] + 1;
                            } else {
                                $CrimeConundrum = $row["CrimeConundrum"];
                            }
                            if (in_array("BitbyBit", $teamPreferences)) {
                                $BitbyBit = $row["BitbyBit"] + 1;
                            } else {
                                $BitbyBit = $row["BitbyBit"];
                            }
                            if (in_array("Envirothon", $teamPreferences)) {
                                $Envirothon = $row["Envirothon"] + 1;
                            } else {
                                $Envirothon = $row["Envirothon"];
                            }
                            if (in_array("FinalProblem", $teamPreferences)) {
                                $FinalProblem = $row["FinalProblem"] + 1;
                            } else {
                                $FinalProblem = $row["FinalProblem"];
                            }
                        }

                        // Posting variables back into the counter
                        $sqlUpdate = "UPDATE eventscount
                                        SET 
                                        institutionCount=$institutionCount, 
                                        teamCount=$teamCount, 
                                        participantCount=$participantCount, 
                                        Mathalon=$Mathalon,
                                        Panacea=$Panacea,
                                        Renaissance=$Renaissance,
                                        Novum=$Novum,
                                        Artifice=$Artifice,
                                        Kryptos=$Kryptos,
                                        ProjectX=$ProjectX,
                                        Enfilade=$Enfilade,
                                        Fantasm=$Fantasm,
                                        CrimeConundrum=$CrimeConundrum,
                                        BitbyBit=$BitbyBit,
                                        Envirothon=$Envirothon,
                                        FinalProblem=$FinalProblem
                                        WHERE e_id=1;";
                        mysqli_query($conn, $sqlUpdate);
                        $countersUpdated = true;
                    }
                    // Count Update done

                    $prefA = $teamPreferences[0].", ".$teamPreferences[1].", ".$teamPreferences[2];
                    $prefB = $teamPreferences[3].", ".$teamPreferences[4].", ".$teamPreferences[5];

                    // Submitting data
                    $sql = "INSERT INTO teams (t_institution, t_institutionContact, t_institutionEmail, t_accomodations, team_id, t_prefA, t_prefB, tm_img, tm_name, tm_hd, tm_contact, tm_email, teamNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: main-reg.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssssssssssssi", $institutionName, $institutionContact, $institutionEmail, $accomodations, $team_id, $prefA, $prefB, $fileNameNew, $name, $hd, $contactNumber, $email, $teamNum);
                        mysqli_stmt_execute($stmt);
                        $registrationComplete = true;
                        if ($i === 6) {
                            $registrationComplete = true;
                        }
                    }
                    // Data Submission Complete
                }
            }

        }
        if ($registrationComplete === true) {
            if (isset($_POST['main-reg-submit'])) {
                header("Location: done.php?teamSubmission=success");
                exit();
            } else if (isset($_POST['main-reg-submit-continue'])) {
                $_SESSION['teamNum'] = $_SESSION['teamNum']; + 1;
                header("Location: main-reg.php?teamSubmission=success");
                exit();
            }
        }
    }

} else {
    header('main-reg.php');
    exit();
}

} else {
    header('main-reg.php');
    exit();
}