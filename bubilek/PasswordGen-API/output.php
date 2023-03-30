<?php
include "xml.php";

function quit($report) {
    $arr = array("report" => $report->value, "data" => $_SESSION["data"]);
    header('Content-Type: application/json; charset=utf-8');

    if ($_SESSION["data"]["output"] == "json") {
        header('Content-Type: application/json; charset=utf-8');
        die(json_encode($arr));
    }
    else if ($_SESSION["data"]["output"] == "xml") {
        header('Content-Type: text/xml');
        die(XMLSerializer::generateValidXmlFromArray($arr));
    }
}
?>