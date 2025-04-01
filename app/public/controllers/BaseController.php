<?php
require_once(__DIR__ . "/../models/BaseModel.php");

    function isLoggedIn() {
        return isset($_SESSION['user']);
    }
