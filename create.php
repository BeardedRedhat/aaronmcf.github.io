<?php
/**
 * Created by PhpStorm.
 * User: AaronMcf
 * Date: 11/10/2016
 * Time: 16:13
 */

//$txt = "data.rtf";
//$fh = fopen($txt, 'w+');
//if (isset($_POST['fullName']) && isset($_POST['date']) &&
//    isset($_POST['logTitle']) && isset($_POST['textarea'])) { // check if both fields are set
//    $txt=$_POST['fullName'].' - '.$_POST['date'].' - '.$_POST['logTitle'].' - '.$_POST['textarea'];
//    file_put_contents('data.rtf',$txt."\n",FILE_APPEND); // log to data.txt
//    exit();
//}
//fwrite($fh,$txt); // Write information to the file
//fclose($fh); // Close the file

//*********************** V2 ***************************//

$txt = "data.txt";
$fh = fopen($txt, 'w+');

if (isset($_POST['fullName']) && isset($_POST['date']) &&
    isset($_POST['logTitle']) && isset($_POST['textarea']))
{
    $txt='Name:        ' .$_POST['fullName']. "\n" . 'Date:        '
        .$_POST['date']. "\n". 'Log Title:   '
        .$_POST['logTitle']."\n". 'Log Entry:   '
        .$_POST['textarea'];
    $ret = file_put_contents('data.txt', $txt, FILE_APPEND);
    if($ret === false)
    {
        echo '<script language="javacript">';
        echo 'alert("There was an error writing this file")';
        echo '</script>';
        //die('There was an error writing this file');
    }
    else
    {
        echo "$ret bytes written to file";
        header('Location: postEntrySuccess.html');
    }
}
else
{
    die('no post data to process');
}
fwrite($fh,$txt);
fclose($fh);
