<?php
    session_start();
    session_unset(); #Session_unset and Session_destroy
    session_destroy();#Will remove all sessions.
    header("location:index.php");#This code will sen du back to the index page
?>