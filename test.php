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
$sql = "SELECT id, tweet, time, user, vote, avatar FROM tbl_tweets ORDER BY id DESC";


// indien er een esultaat uitkomt doe dan.
$result = mysqli_query($link, $sql);


//print_r($result);

$htmlOutput ="<table><tr><th>id</th><th>tweet</th><th>time</th><th>user</th><th>vote</th><th>avatar</th></tr>";
while($row = mysqli_fetch_array($result)){
	// laat de inoud van de tabel zien.
	$htmlOutput .= "<tr><td>".$row["id"]."</td><td>".$row["tweet"]."</td><td>".$row["time"]."</td><td>".$row["user"]."</td><td> <div class=\"vote\" data-tweet-id=\"".$row["id"]."\">+</div><span class=\"votecount\">".$row["vote"]."</span></td><td><img src=".$row["avatar"]." width=\"130px\" height=\"130px\"></td></tr>";
}
$htmlOutput .= "</tabe>";

?>

<html>
<head>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
    	$(document).ready(function () {
		    $('.vote').on('click', function () {
		    	var tweet = $(this);
		    	tweetid = $(this).attr('data-tweet-id');
				
				
		    	$.post("vote.php", { 'tweetid': tweetid }, function (data) {
		    		if(data == 1)
		    		{
		    			
		    			var span = tweet.parent().children('.votecount');

		    			span.text(parseInt(span.text()) + 1);
		    		}
		    	} );
		    });
    	});



    </script>

<title>adjancency</title>
<style>
table {
	width:600px;
	border:1px solid black;
}
th {
	text-align: left;
}

.vote{
color:red;
}
</style>
</head>

<body>
	<?php echo($htmlOutput); ?>

</body>
</html>