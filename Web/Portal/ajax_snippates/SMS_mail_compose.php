<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 02/05/16
 * Time: 9:06 AM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
$enrol=$_POST["enrol"];
$enrol=strtoupper($enrol);
$msg=$_POST['msg'];




//------------------ Date Convert: END -------------------//

$query_string ="SELECT Mobile_Parent,Email_Parent FROM student_data WHERE Eroll_Number = '".$enrol."'";
$result = $conn->query($query_string);
$data=$result->fetch_assoc();
$Mobile_Parent=$data['Mobile_Parent'];
$email_p=$data['Email_Parent'];

$return['status']='False';


IF($Mobile_Parent!='') {
    $uid = '9429000898';
    $pwd = 'rutu007';

    $to = $Mobile_Parent;
    $msg = $msg;


    include($_SERVER['DOCUMENT_ROOT'] . "/Services/sms/sms_sender.php");
    $return['email_status']=email($email_p,$msg);


}


echo json_encode($return);



function email($towhome,$msg){

    require($_SERVER['DOCUMENT_ROOT'] . "/Services/PHPMailer-master/PHPMailerAutoload.php");

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'temp.temp3951@gmail.com';                 // SMTP username
    $mail->Password = 'dhara007';                           // SMTP password
    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('temp.temp3951@gmail.com', 'Mailer');
    $mail->addAddress($towhome, 'Student`s parent');     // Add a recipient
//    $mail->addAddress('karan.sheth60@gmail.com');               // Name is optional
    $mail->addReplyTo('karan.sheth60@gmail.com', 'Information');
    $mail->addCC('karan.sheth60@gmail.com');
//    $mail->addBCC('bcc@example.com');

    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Sent From LDRP Web Portal';
    $mail->Body    = $msg;
    $mail->AltBody = '';

    if(!$mail->send()) {
//        echo 'Message could not be sent.';
//        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
//        echo 'Message has been sent';
        return true;
    }
}
