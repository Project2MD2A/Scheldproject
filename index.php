<?php
// deze functie is geschreven door Orin
// aangepast door Orin & Mees
error_reporting(E_ALL);
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

while($row = mysqli_fetch_array($result)){
	// laat de inoud van de tabel zien.
	$htmlOutput .= '
	<div class="balk1">
	<p id="p1">' . $row["user"] . '</p><div id="pic1"><img src=' .$row["avatar"].' width=\'100px\' height=\'100px\'></div>
	<div id="balkz"><p id="p2">' . $row["tweet"] . '</p></div>
	<div id="knop"><div class=\'vote\' data-tweet-id=\''.$row["id"].'\'><div class=\'dislikeimage\'><img src="images/dislike.png" width=\'20px\' height=\'20px\'></div></div><span id=\'dislike\'>'.$row["vote"].'</span></div>
	<div id="balkdatum"><p>' . $row["time"] . '</p></div></div>'

	;
	//$htmlOutput .= "<div id=\"p2\">".."</div><td>".$row["tweet"]."</td><td>".$row["time"]."</td><td>".$row["user"]."</td><td> <div class=\"vote\" data-tweet-id=\"".$row["id"]."\">+</div><span class=\"votecount\">".$row["vote"]."</span></td><td><img src=".$row["avatar"]." width=\"130px\" height=\"130px\"></td></tr>";
}

?>


<html>
	<head>
		<title>ShameWall.nl</title>
		<link rel="stylesheet"type="text/css" href="style/style.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>


    $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });

    $(document).ready(function () {
		$('.vote').on('click', function () {
		   	var tweet = $(this);
		    tweetid = $(this).attr('data-tweet-id');
				
				
		    $.post("vote.php", { 'tweetid': tweetid }, function (data) {
		    	if(data == 1)
		    	{		
		    	var span = tweet.parent().children('#dislike');
				span.text(parseInt(span.text()) + 1);
		    	}
		    	});
		    });
    	});


        </script>
	</head>
	<body>

		<header><div id="logo"></div></header>
		<div id="menubalk"></div>
		<ul id="mainmenu">
			<li><a href="index.php">Home</a></li>
			<li><a href="wall.php">Wall of shame</a></li>
			<li><a href="#">Racisme</a></li>
			<li><a href="#">Doodsbedreigingen</a></li> 
			<li><a href="#">Schelden</a></li> 
			<li><a href="about.php">Over ons</a></li>
		</ul>
		<div id="balk">		
			<div id="info">
			Alle mensen die zich misdragen op social media komen op deze site te staan, als straf. Dit is de Wall of Shame, de site is up to date zodra er wordt gescholden. Bekijk deze mensen en zie wat ze bezielt. Volg ons <a href="https://twitter.com/ShameWallNL">@ShameWallNL</a>			<br/><br/>
			<p><a href="overons.html">Lees meer over ons...</a></p>
			</div>
		</div>
		<div id="balken">

		<?php echo($htmlOutput); ?>

		</div>
				<footer>



<p>Copyright - <span><a href="#">ShameWall.nl</a></span> - 2013<a href="https://twitter.com/intent/tweet?button_hashtag=Shamewall&text=STOP%20SCHELDEN%20!%20Bekijk%20wie%20zich%20midraagt%20op%20social%20media%20op%20http%3A%2F%2Fshamewall.nl%20!%20En%20volg%20ons%20%40ShameWallNL" class="twitter-hashtag-button">Tweet #Shamewall</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>		
<iframe class="fb-like" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.shamewall.nl&amp;width=620&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:620px; height:21px;" allowTransparency="true"></iframe>

				</p></footer>
				<a href="#" class="scrollup">Scroll</a>
	</body>
</html>