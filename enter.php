<?php

//-------------------------Validation--------------------------
$errormsg = "";
if($_POST['Fname']) {
    $Fname = $_POST['Fname'];
} 
else {
    $errormsg = "Please enter your full name.";
}

$house = $_POST['house'];

if($_POST['date']) {
    $date = $_POST['date'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please enter the date of the event.";
    }
    else {
        $errormsg = "Please enter the date of the event.";
    }
}

if($_POST['vendor']) {
    $vendor = $_POST['vendor'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please enter the vendor.";
    }
    else {
        $errormsg = "Please enter the vendor.";
    }
}

if($_POST['amount']) {
    $amount = $_POST['amount'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please enter the amount spent.";
    }
    else {
        $errormsg = "Please enter the amount spent.";
    }
}

if($_POST['amountps']) {
    $amountps = $_POST['amountps'];
}

if($_POST['purpose']) {
    $purpose = $_POST['purpose'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please describe the purpose of the expense.";
    }
    else {
        $errormsg = "Please describe the purpose of the expense.";
    }
}

if($_POST['number']) {
    $number = $_POST['number'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please enter the number of mentors present.";
    }
    else {
        $errormsg = "Please enter the number of mentors present.";
    }
}

if($_POST['student']) {
    $student_array = $_POST['student'];
}
else {
    if($errormsg) {
        $errormsg = $errormsg . "<br/>Please check which student(s) were with you.";
    }
    else {
        $errormsg = "Please check which student(s) were with you.";
    }
}

if (!is_numeric($amount) || !is_numeric($amountps) || $amount<0 || $amountps<0) {
    if($errormsg) {
        $errormsg = $errormsg . "</br>Amount and amount per student must be positive numbers.";
    } 
    else {
        $errormsg = "Amount and amount per student must be positive numbers.";
    }
}
if (!is_numeric($number) || $number < 1 || $number!=round($number)) {
    if($errormsg) {
        $errormsg = $errormsg . "</br>number of mentors present must be a positive integer.";
    } 
    else {
        $errormsg = "number of mentors present must be a positive integer.";
    }
}

if ($errormsg){ //If any errors display them
    echo "<div class=\"box red\">Your reimbursement request has NOT been submitted.</br>Please address the following issues, and re-submit:</div></br>";
    echo "<div class=\"box red\">$errormsg</div>";
    die();
}
//-------------------------Finished validation--------------------------

$con = mysql_connect("localhost","imptech","rockimp");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("imptech_simple", $con);

foreach ($student_array as $one_student) {
    $source .= $one_student.", ";
}
$student = substr($source, 0, -2);

$sql="INSERT INTO expenseitem (MentorName, House, Date, Vendor, Amount, AmountPerStudent, ExpenseText, Number, StudentName)
VALUES
('".mysql_real_escape_string($Fname)."','".
mysql_real_escape_string($house)."','".
mysql_real_escape_string($date)."','".
mysql_real_escape_string($vendor)."','".
$amount."','".
$amountps."','".
mysql_real_escape_string($purpose)."','".
$number."','".
$student."')";

echo "$sql";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<p>Hello ".$Fname.".</p>";
echo "<p>1 record added</p>";

 $to0 = mysql_query("SELECT Email FROM UserInformation WHERE (HouseName='$house' || CommitteeName='$house') && ChairInd=1"); 
 $toarray = mysql_fetch_assoc($to0);
 $to = $toarray['Email'];

 $subject = "Reimbursement request form submitted";
 $body = $Fname." just submitted a reimbursement request for an event on ".$date.".";

 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent to ".$to."!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
echo "<p><a href='http://www.incentivementoringprogram.org/simple/index.html'>Return to main page.</a></p>";

mysql_close($con)
?> 