<?php
// deze functie is geschreven door Orin
// aangepast door Orin & Mees
error_reporting('E_ALL');
// leg connectie met de database : server username wachtwoord database.
$link = mysqli_connect("localhost", "admin_project", "sintlucas123", "admin_project") or die(mysqli_error());

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



// de query die je gaat toepassen op de database.
$sql = "SELECT id, tweet, time, user, vote FROM tbl_tweets ORDER BY id DESC";


// indien er een esultaat uitkomt doe dan.
$result = mysqli_query($link, $sql);


//print_r($result);

$htmlOutput ="<table><tr><th>id</th><th>tweet</th><th>time</th><th>user</th><th>vote</th></tr>";
while($row = mysqli_fetch_array($result)){
	// laat de inoud van de tabel zien.
	$htmlOutput .= "<tr><td>".$row["id"]."</td><td>".$row["tweet"]."</td><td>".$row["time"]."</td><td>".$row["user"]."</td><td>".$row["vote"]."</td></tr>";
}
$htmlOutput .= "</tabe>";

?>


<html>
<head>
<title>adjancency</title>
<style>
table {
	width:600px;
	border:1px solid black;
}
th {
	text-align: left;
}
</style>
</head>

<body>
	<?php echo($htmlOutput); ?>

</body>
</html>