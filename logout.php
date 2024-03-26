<?php
include 'includes/operations.php';
session_destroy();

header('Location: login.php');
