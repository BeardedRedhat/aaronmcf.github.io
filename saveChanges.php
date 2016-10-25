<?php
/**
 * Created by PhpStorm.
 * User: AaronMcf
 * Date: 25/10/2016
 * Time: 12:18
 */
$myFile = fopen("logs.txt", "w");
$text = $_POST[newText];

fwrite($myFile, $text);

fclose($myFile);