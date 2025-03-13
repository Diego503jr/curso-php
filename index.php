<?php 
declare(strict_types=1);

require_once 'template.php';   //Es usado cuando necesitamos todo lo necesario
require_once 'variables.php';   //Llamar constantes usadas en las functions
require_once 'classes/NextMovie.php';   //Llamar la clase NextMovie

$next_movie = NextMovie::fetch_and_create_movie(API_URL);   //Obtener la siguiente pelicula
$next_movie_data = $next_movie->get_data();   //Obtener los datos de la pelicula
?>

<!-- Head de la pagina -->
<?php render_template("head", $next_movie_data); ?>

<!-- Main de la pagina -->
 <?php render_template("main", array_merge(
    $next_movie_data,
    ["until_Message" => $next_movie->get_until_message()]
    )); ?>