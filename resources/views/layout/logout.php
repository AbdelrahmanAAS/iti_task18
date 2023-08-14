<?php
session_start(); // file
session_unset(); // empty file
session_destroy(); // delete 
header("location: ../layout/index.php");