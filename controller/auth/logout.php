<?php
session_start();
session_destroy();

header("location:../../view/home/login.php?pesan=logout");
