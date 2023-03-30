<?php
    require_once("enums.php");
    require_once("output.php");
    require_once("utils.php");
    require_once("operations.php");

    session_start();

    $_SESSION["data"] = acquireData();
    operationHandler();
?>