<?php 
// Connect To Database with PDO Method
global $db;
$db = new PDO('mysql:host=localhost;dbname=smallblog;charset=utf8mb4','root','');
?>