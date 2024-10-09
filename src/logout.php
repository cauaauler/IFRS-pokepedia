<?php
session_start();
session_destroy();
header("location: /IFRS-Estudo-Session/index.php");