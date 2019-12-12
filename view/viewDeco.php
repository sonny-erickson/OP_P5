<?php
$_SESSION = array();
session_destroy();
Header("Location:index.php?page=connection");