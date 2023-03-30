<?php
    function acquireData() { 
        $data = explode("/", $_SERVER["PATH_INFO"]);
        array_shift($data);
        if (empty($data))
            quit(REPORT::ERR_NO_DATA);

        $operation = $data[0];

        if (empty($data[1]))
            quit(REPORT::ERR_MISSING_OUTPUT_MODE);
            
        $output = $data[1];

        return array(
            "operation" => $operation,
            "output" => $output,
        );
    }

    function generatePassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i <= 32; $i++)
            $pass[] = $alphabet[rand(0, $alphaLength)];

        return implode($pass);
    }
?>