<?php
    function operationHandler() {
        $operation = $_SESSION["data"]["operation"];
        if ($operation == OPERATION::NEW_PASS->value) {
            $_SESSION["data"]["password"] = generatePassword();
            quit(REPORT::OK);
        }
    }

?>