<?php
session_start();
session_destroy();
header("Location: login.php?erro3=SIM");
?>