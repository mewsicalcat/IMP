<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="default.css" />

    <title>Reimbursement approval</title> 
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
//echo("<p>Record to approve is ".$choice.".</p>");

$con = mysql_connect("localhost","imptech","rockimp");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("imptech_simple", $con);

$sql="UPDATE expenseitem SET HOHVerify=1 WHERE ExpenseItemID='$choice'";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<p>Record ".$choice." approved!</p><br/>";
echo "<p><a href='http://www.incentivementoringprogram.org/simple/admin2.php'>Return to main page.</a></p>";

mysql_close($con);
?>
		  

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
