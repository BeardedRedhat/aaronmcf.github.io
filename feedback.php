<?php
/**
 * Created by PhpStorm.
 * User: AaronMcf
 * Date: 26/09/2016
 * Time: 10:43
 */

$errors = '';
$myemail = 'aaron.mcfarland@isarc.co.uk';
if(empty($_POST['fullname'])  ||
    empty($_POST['email']) ||
    empty($_POST['subject']) ||
    empty($_POST['feedback']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['fullname'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$feedback = $_POST['feedback'];
if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Feedback form submission: $name";
    $email_body = "You have received a new feedback message. ".
        " \n\n Name: $name \n\n ".
        "Email: $email_address\n\n ".
        "Subject: $subject \n\n ".
        "Feedback: $feedback";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);

    header('Location: feedbackSuccess.html');
} else {
    var_dump($errors);
}