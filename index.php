<?php
require_once "functions.php";
require_once "consts.php";
require_once "classes/NextMovie.php";

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();
//una alternativa seria usar el $result = file_get_contents(API_URL) si solo quieres hacer el GET de una API
//curl_close($ch);


?>

<?php
renderTemplate("head", $next_movie_data);
renderTemplate("main", array_merge(
    $next_movie_data,
    ["until_message" => $next_movie->get_until_message()]
));
renderTemplate("styles", $next_movie_data);
?>
