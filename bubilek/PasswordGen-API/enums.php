<?php
    enum REPORT :string{
        case OK = 'OK';
        case ERR_NO_DATA = "ERR_NO_DATA";
        case ERR_MISSING_OUTPUT_MODE = "ERR_MISSING_OUTPUT_MODE";
    }

    enum OPERATION :string {
        case NEW_PASS = "newpass";
    }
?>