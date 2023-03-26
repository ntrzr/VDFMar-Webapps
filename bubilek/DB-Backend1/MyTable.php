<?php
    require_once 'C_PDO.php';

    function MyTable() :void {
        $db = new DB(); //store db in session
        $db->connect('localhost', 'root', '', 'db-backend1');

        $rows = $db->select('SELECT * FROM my_table');

        $html = '<table>';
        $html .= '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['id'] . '</td>';
            $html .= '<td>' . $row['name'] . '</td>';
            $html .= '<td>' . $row['email'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        echo $html;
    }
?>