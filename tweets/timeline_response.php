<?php 

// You MUST modify app_tokens.php to use your own Oauth tokens
require 'app_tokens.php';

// Create an OAuth connection
require 'tmhOAuth.php';
$connection = new tmhOAuth(array(
  'consumer_key'    => $consumer_key,
  'consumer_secret' => $consumer_secret,
  'user_token'      => $user_token,
  'user_secret'     => $user_secret
));

// Get the timeline with the Twitter API
$http_code = $connection->request('GET',$connection->url('https://api.twitter.com/1.1/search/tweets.json?q=%23sintlucas'), 
	array(
		'count' => 100
	));
			
// Request was successful
if ($http_code == 200) {
	// Extract the tweets from the API response
	$tweet_data = json_decode($connection->response['response'],true);
	$tweet_data = array_reverse($tweet_data);

	print_r($tweet_data);
	die();
	$db = mysqli_connect('127.0.0.1', 'root', 'kampioentje99', 'admin_project');

	$sql = "INSERT INTO tbl_tweets(`tweet`, `user`, `avatar`, `time`) VALUES ";
	// Accumulate tweets from results
	//echo '<pre>';
	$tweet_stream = '';
	foreach($tweet_data as $tweet) {

		$sql .= "('" . mysqli_real_escape_string($db, $tweet['text']) . "', '" . mysqli_real_escape_string($db, $tweet['user']['screen_name']) . "', '" . mysqli_real_escape_string($db, $tweet['user']['profile_image_url']) . "', '" . mysqli_real_escape_string($db, date('Y-m-d', strtotime($tweet['created_at']))) . "'),";

		// Add this tweet's text to the results
		// %tweet_stream .= $tweet['text'] . '<br/><br/>';
	}
	$sql = rtrim($sql, ',') . ';';
	if(!mysqli_query($db, $sql)) {
		die(mysqli_error($db));
	}
	die();
	echo '</pre>';
		
	// Send the tweets back to the Ajax request
	print $tweet_stream;
	
// Handle errors from API request
} else {
	if ($http_code == 429) {
		print 'Error: Twitter API rate limit reached';
	} else {
		print 'Error: Twitter was not able to process that request';
	}
}
?>