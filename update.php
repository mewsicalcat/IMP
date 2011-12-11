<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="default.css" />

    <!--jquery UI files-->
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/separate_file.js"></script>

    <title>Reimbursement INFO</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<!--
<table class="outter" width="100%" align="center"> 
	<tr><td class="banner" colspan="3" align="center"><a href="../">
	<img src="http://www.tizag.com/pics/tizagSugar.jpg" alt="IMP Logo" /></a>
	</td></tr>
</table>
-->
<h1>IMP Reimbursements</h1>
<table class="outter" width="779" align="center"> 
	<tr valign="top">
		<td class="menu">
			<table class="menu"><tr><td>
			<div id="menu">

<!--
			<a href="http://www.tizag.com/" >Home</a>
			<hr/>
			<a href="http://www.tizag.com/htmlT/" >HTML Tutorial</a>
			<br /><b>Scripting</b>
			<a href="http://www.tizag.com/javascriptT/" >Javascript Tutorial</a>

			<b>PHP - HTML Form Example</b>
			<a href="http://www.tizag.com/phpT/examples/formex.php" >Form Building</a>
			<hr />
			<a href="http://www.tizag.com/about/contact.php" >Contact Us</a> 
-->
			</div>
			</td></tr></table>
		</td>
	
		<td width="529">
			<table class="main" cellpadding="8">
			
			<tr><td class="mainIn"><html> 
<?php
$choice = $_GET['choice'];
echo("<p>Record to modify is ".$choice.".</p>");

$con = mysql_connect("localhost","imptech","rockimp");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("imptech_simple", $con);

$result = mysql_query("SELECT * FROM Expense WHERE ExpenseItemID='$choice'");
$result_array = mysql_fetch_assoc($result);
$MentorName = $result_array['MentorName'];
$House      = $result_array['House'];
$Date       = $result_array['Date'];
$Vendor     = $result_array['Vendor'];
$Amount     = $result_array['Amount'];
$AmountPerStudent = $result_array['AmountPerStudent'];
$ExpenseText = $result_array['ExpenseText'];
$Number      = $result_array['Number'];
$StudentName = $result_array['StudentName'];

mysql_close($con);
?>
		  
* Required<br/><br/>
<form method="post" action="enter_update.php"> 
<input type="hidden" name="itemid" value="<?php echo $choice; ?>">

What is your name?*:<br />
(first and last)<br/>
<input type="text" size="12" maxlength="12" name="Fname" value="<?php echo $MentorName; ?>"><br /><br />

What house or committee are you seeking a reimbursement for?*:<br />
<select name="house">
<?php
$houses0 = array("Aile"=>"aile", "Gajok"=>"gajok", "Gesin"=>"gesin", "Iyali"=>"iyali", "Jia Ting"=>"jiating", "Kazoku"=>"kazoku", "Khandaan"=>"khandaan", "Ohana"=>"ohana", "Oikogeneia"=>"oikogeneia", "Pamilya"=>"pamilya", "Parivar"=>"parivar", "Perhe"=>"perhe", "Perodica"=>"perodica", "Rodzina"=>"rodzina", "Semja"=>"semja", "Semejstvo"=>"semejstvo", "Committee--Academic Affairs"=>"academic", "Committee--College Prep"=>"college", "Committee--Community Service"=>"community", "Committee--Events"=>"events");

while($h=current($houses0)) {
  if ($h==$House) {
    echo("<option value=".$h." selected>".key($houses0)."</option>");
  } else {
    echo("<option value=".$h.">".key($houses0)."</option>");
  }
  next($houses0);
} 
?>
</select><br /><br />

Date of Event*:<br />
<input id="datepicker" type="text" name="date" value="<?php echo $Date; ?>"><br /><br />

Name of Vendor*:<br />
e.g., restaurant name<br/>
<input type="text" size="12" maxlength="12" name="vendor" value="<?php echo $Vendor; ?>"><br /><br />

Total Amount Spent*:<br />
Please just write the numeric amount<br/>
<input type="text" size="12" maxlength="12" name="amount" value="<?php echo $Amount; ?>"><br /><br />

Amount Spent per Student:<br/>
Divide the total by the number of students present (if applicable)<br/>
<input type="text" size="12" maxlength="12" name="amountps" value="<?php echo $AmountPerStudent; ?>"><br /><br />

What was the purpose of the expense? * <br/>
<textarea rows="5" cols="20" name="purpose" wrap="physical"><?php echo $ExpenseText; ?></textarea><br /><br />

Number of mentors present, if it was a family event*:<br />
Please just write the numeric amount<br/>
<input type="text" size="12" maxlength="12" name="number" value="<?php echo $Number; ?>"><br /><br />

Which student(s) were with you?:<br />
Check all that apply<br/>
<?php
$students0 = array("Dante '13"=>"Dante13", "Dariz '13"=>"Dariz13",
"Diamond '13"=>"Diamond13", "Erica '13"=>"Erica13", "Dante '13"=>"Dante13",
"Dante '13"=>"Dante13", "Dante '13"=>"Dante13", "Kayla '13"=>"Kayla13",
"Keith '13"=>"Keith13", "Leroy '13"=>"Leroy13", "Mark '13"=>"Mark13",
"Miguel '13"=>"Miguel13", "Myron '13"=>"Myron13", "Rashad '13"=>"Rashad13",
"Reggie '13"=>"Reggie13", "Rodney '13"=>"Rodney13", "Tolu '13"=>"Tolu13",
"Tyesha '13"=>"Tyesha13", "Tyler '13"=>"Tyler13", 

"Albert '10"=>"Albert10", "Angel '10"=>"Angel10", "Brian '10"=>"Brian10",
"Christina '10"=>"Christina10", "Clarence '10"=>"Clarence10", "Derrell '10"=>"Derrell10",
"Devin '10"=>"Devin10", "Donte '10"=>"Donte10", "Eddie '10"=>"Eddie10",
"Eric '10"=>"Eric10", "Janel '10"=>"Janel10", "Kayla '10"=>"Kayla10",
"Kierra '10"=>"Kierra10", "Shawanda '10"=>"Shawanda10", "Shawn '10"=>"Shawn10",
"Tracee '10"=>"Tracee10",

"Brittany '07"=>"Brittany07", "Dalonte '07"=>"Dalonte07", "Derick '07"=>"Derick07",
"Devin '07"=>"Devin07", "Dhaujee '07"=>"Dhaujee07", "Donnise '07"=>"Donnise07",
"Eric '07"=>"Eric07", "Greg '07"=>"Greg07", "Judy '07"=>"Judy07",
"Kendall '07"=>"Kendall07", "Maurice '07"=>"Maurice07", "Shardae '07"=>"Shardae07",
"Tavon '07"=>"Tavon07", "Terrance '07"=>"Terrance07", "Tynecia '07"=>"Tynecia07",

"Dashia '14"=>"Dashia14", "Devin '14"=>"Devin14", "Dominic '14"=>"Dominic14",
"Emmanuel '14"=>"Emmanuel14", "Gerald '14"=>"Gerald14", "Jamal '14"=>"Jamal14", 
"Jayvon '14"=>"Jayvon14", "Ken'Shawna '14"=>"KenShawna14", "Kori '14"=>"Kori14",
"Lazai '14"=>"Lazai14", "Linaya '14"=>"Linaya14", "Nelson '14"=>"Nelson14",
"Quante '14"=>"Quante14", "Sae-Qwon '14"=>"SaeQwon14", "Tre '14"=>"Tre14",
"Tyia '14"=>"Tyia14",
"General Expense-Not for Student"=>"General");

$student_array = explode(", ", $StudentName);
while($st = current($students0)) {
  if(in_array($st, $student_array)) {
    echo("<input type='checkbox' value=".$st." name='student[]' checked>".key($students0)."<br />");
  }
  else {
    echo("<input type='checkbox' value=".$st." name='student[]'>".key($students0)."<br />");
  }
  next($students0);
}
?>
<input type="submit" value="submit" name="submit">
</form>


<br /><br /><br />
	</td></tr>
			</table>
		</td>
		<td width="100">
<!--
		<table class="rightCol">
			<tr><td>
			<div id="rightMenu">

			<b>Web Reference</b><br />
			<a class="menu"href="http://www.tizag.com/cssT/reference.php">CSS Reference</a>
			<a class="menu"href="http://www.tizag.com/cssT/liveExampleCss/">CSS Examples</a>
			<hr />
			<b>Support Tizag</b><br />
			<a class="menu"href="http://www.tizag.com/about/linkus.php">Link to Tizag</a>
			<hr />
			<a href="http://www.google.com" target="_blank">Google</a>	
		
			</div>
			</td></tr>
		</table>
		<hr/>
-->
		<table class="rightCol">
			<tr><td>
			
				
			</td></tr>
		</table>
		<table class="rightCol">
			<tr><td>
			
			
						</td></tr>
		</table>
		
		</td>
	</tr>
	<tr>
	<td colspan="3">
		<p align="Center">Copyright 2011 Incentive Mentoring Program</p>
	</td></tr>

</table>
</body>
