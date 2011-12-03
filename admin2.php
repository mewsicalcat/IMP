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
$db_host = 'localhost';
$db_user = 'imptech';
$db_pwd = 'rockimp';

$database = 'imptech_simple';
$table = 'expenseitem';

$con = mysql_connect($db_host, $db_user, $db_pwd);
if (!con) {
    die("Can't connect to database. " . mysql_error());
}

if(!mysql_select_db($database, $con))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT ExpenseItemID, SiteName, StudentName, CohortID, ExpenseCategory, ExpenseText, HOHVerify, MentorName, House, Date, Vendor, Amount, AmountPerStudent, Number FROM {$table} WHERE HOHVerify=0");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);

echo "<h1>Reimbursement requests awaiting your approval</h1>";
echo "<table border='1'><tr>";
// printing table headers
$field = mysql_fetch_field($result);
echo "<td></td>";
for($i=1; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    $ncol = count($row);
    echo "<td><form action='update.php' method='get'/>";
    echo "<input type='hidden' name='choice' value=$row[0]>";
    echo "<input type='submit' value='Modify'/>";
    echo "</form>";
    echo "<form action='approve.php' method='get'/>";
    echo "<input type='hidden' name='choice' value=$row[0]>";
    echo "<input type='submit' value='Approve'/>";
    echo "</form>";
    echo "<form action='deny.php' method='get'/>";
    echo "<input type='hidden' name='choice' value=$row[0]>";
    echo "<input type='submit' value='Deny'/>";
    echo "</form></td>";
    foreach(array_slice($row,1,$ncol) as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysql_free_result($result);
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
