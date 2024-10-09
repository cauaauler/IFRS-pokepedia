<?php
session_start();
session_destroy();
header("location: /IFRS-Pokepedia/index.php");