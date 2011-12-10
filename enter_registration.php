<?php

//-------------------------Validation--------------------------
$errormsg = "";
if($_POST['email']) {
    $email = $_POST['email'];
} 
else {
    $errormsg = "Please enter your email address.";
}

if($_POST['Fname']) {
    $Fname = $_POST['Fname'];
} 
else {
    $errormsg = "Please enter your first name.";
}

if($_POST['Lname']) {
    $Lname = $_POST['Lname'];
} 
else {
    $errormsg = "Please enter your last name.";
}

$house = $_POST['house'];

//-------------------------Finished validation--------------------------

$con = mysql_connect("localhost","imptech","rockimp");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("imptech_simple", $con);

$result = mysql_query("SELECT * FROM User WHERE Email = '$email'");
$user_data = mysql_fetch_row($result);
if(empty($user_data)) 
{

    $sql="INSERT INTO User (Fname, Lname, HouseName, Email) 
    VALUES
    ('".mysql_real_escape_string($Fname)."','".
    mysql_real_escape_string($Lname)."','".
    mysql_real_escape_string($house)."','".
    $email."')";

    echo "$sql";

    if (!mysql_query($sql,$con))
      {
      die('Error: ' . mysql_error());
      }
    echo "<p>Hello ".$Fname.".</p>";
    echo "<p>1 record added</p>";

    $to0 = mysql_query("SELECT Email FROM User WHERE HouseName='$house' && ChairInd=1"); 
    $toarray = mysql_fetch_assoc($to0);
    $to = $toarray['Email'];

    $subject = "New family member registration submitted";
    $body = $Fname." ".$Lname." just registered as being in your family.";

    if (mail($to, $subject, $body)) {
      echo("<p>Message successfully sent to ".$to."!</p>");
     } else {
      echo("<p>Message delivery failed...</p>");
     }
    echo "<p><a href='http://www.incentivementoringprogram.org/simple/index.html'>Go to reimbursement page.</a></p>";
}
else 
{
     $url = "http://www.incentivementoringprogram.org/simple/registration.html";
     echo '<script type="text/javascript"> alert("Sorry! you can\'t register twice.");</script>';
     echo '<script type="text/javascript">top.location.href ="'.$url.'";</script>';
}
mysql_close($con)
?> 