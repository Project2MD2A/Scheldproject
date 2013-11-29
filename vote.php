<?php
error_reporting(E_ALL);
$link = mysql_connect("localhost", "admin_project", "sintlucas123") or die(mysql_error());
mysql_select_db("admin_project");

$result = mysql_query("SELECT 1 FROM tbl_votes WHERE ip='" . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . "' AND tweetid=" . mysql_real_escape_string($_POST['tweetid']));

if(mysql_num_rows($result) == 0) {
	mysql_query("UPDATE `tbl_tweets` SET `vote` = `vote` + 1 WHERE `id` = " . mysql_real_escape_string($_POST['tweetid']));
	mysql_query("INSERT INTO `tbl_votes` (`tweetid`, `ip`, `time`) VALUES (" . mysql_real_escape_string($_POST['tweetid']) . ", '" . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . "', NOW())");
	
echo "1";

}

else {
echo "0";
}


?>