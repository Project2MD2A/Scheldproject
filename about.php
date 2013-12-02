<html>
	<head>
		<title>ShameWall</title>
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
			<p id="about">Over Ons</p></br>

			<p>Dit is een project van Sint Lucas Eindhoven gemaakt door:</p></br>

			<p>Rick van de Wijngaart</p>
			<p>Mees Verberne</p>
			<p>Roy van Zoelen</p>
			<p>Orin van Beek</p>
			<p>Jarvie Peters</p></br>

			<p>Het doel van dit project was Social Media op een andere, originele manier gebruiken. Wij hebben er voor gekozen om alle mensen die schelden op twitter op onze website te zetten.</p></br>

			<p>Wij zijn tegen het schelden via Social Media, omdat dit uit de hand kan lopen en ernstige gevolgen kan hebben. Dat is de reden dat wij met dit idee zijn gekomen.</p></br>

			<p>Op onze website zijn dus alle mensen te vinden die schelden, dat dient als straf. De site is altijd up to date en we hopen dat we u ervan overtuigen dat schelden ernstiger is dan het lijkt.</p></br>
			</div>
		</div>
				<footer><p>Copyright - <span><a href="#">ShameWall.nl</a></span> - 2013</p></footer>
	</body>
</html>