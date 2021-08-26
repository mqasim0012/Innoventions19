<?php

if (isset($_POST['event'])) {
    $event = $_POST['event'];
    echo "<script>
    window.location = 'events/event.php?event=".$event."';
    </script>";

}