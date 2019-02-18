<?php
// Error reporting on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

require_once __DIR__ . '/../vendor/autoload.php';

use Game\Play;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Application();

$app->register(new \Silex\Provider\SerializerServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Headers', 'Access-Control-Allow-Origin, Access-Control-Allow-Credentials, Content-Type, Authorization, X-Requested-With');
    $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:8080');
    $response->headers->set('Access-Control-Allow-Credentials', 'true');
    $response->headers->set('Access-Control-Allow-Methods', 'GET,POST,HEAD,DELETE,PUT,OPTIONS');
});


$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../views',
]);

$app['debug'] = true;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});

// This really should be $put-> /game/{id}, but I'm encountering some strange Decode issue, when using PUT/POST in
// development mode. Fine in production, though :-\. I think it's a CORS issue related to the _SESSION.
$app->get('/game/{id}/hit', function ($id) use ($app) {

    $games = $app['session']->get('games');
    $play = $app['serializer']->deserialize($games[$id], Play::class, 'json');
    $play->attack();
    $game = $app['serializer']->serialize($play, 'json');
    $games[$game->getId()] = $game;
    $app['session']->set('games', $games);
    return new Response($game, 200, [
        "Content-Type" => 'json'
    ]);
});

$app->get('/game/new', function () use ($app) {

    $play = new Play();
    $game = $app['serializer']->serialize($play, 'json');
    $games = $app['session']->get('games');
    $games[$play->getId()] = $game;
    $app['session']->set('games', $games);
    return new Response($game, 200, [
        "Content-Type" => 'json'
    ]);
});

$app->get('/game/{id}', function ($id) use ($app) {

    $games = $app['session']->get('games');
    return new JsonResponse(json_decode($games[$id]), 200, [
        "Content-Type" => 'json'
    ]);
});

$app->get('/game', function () use ($app) {

    $games = [];
    if ($gamesSession = $app['session']->get('games')) {
        foreach ($gamesSession as $id => $game) {
            $games[$id] = json_decode($game);
        }
    }
    return new JsonResponse($games, 200, [
        "Content-Type" => 'json'
    ]);
});

$app->get('/reset', function () use ($app) {
    $app['session']->clear();
    return new JsonResponse([], 200, [
        "Content-Type" => 'json'
    ]);
});

$app->options("{anything}", function () {
    return new \Symfony\Component\HttpFoundation\JsonResponse(null, 204);
})->assert("anything", ".*");

$app->run();
