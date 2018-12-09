<?php include_once 'resource/session.php';
session_destroy();
header('location:../patient_login.php');
