<?php

  session_start();


  $_SESSION = array();


  session_destroy();

  header('location: store-login.php');
  exit;