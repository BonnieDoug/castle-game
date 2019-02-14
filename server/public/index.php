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

//$app->register(new Silex\Provider\TwigServiceProvider(), array(
//    'twig.path' => __DIR__ . '/../views',
//));


$app['debug'] = true;

// you might want to use this for a few things...
$request = Request::createFromGlobals();

$app->post('/game/{id}', function ($id) use ($app) {

    $games = $games = $app['session']->get('games');

    $play = $app['serializer']->deserialize($games[$id], Play::class, 'json');
    $play->attack();

    $game = $app['serializer']->serialize($play, 'json');
    $games[$id] = $game;
    $app['session']->set('games', $games);

    return new JsonResponse($play, 200, array(
        "Content-Type" => 'json'
    ));

    return $app['twig']->render('play.html.twig', array(
        'id' => $id,
        'play' => $play
    ));

});

$app->get('/game/new', function () use ($app) {

    $play = new Play();
    $game = $app['serializer']->serialize($play, 'json');

    $games = $app['session']->get('games');
    $games[uniqid()] = $game;
    $app['session']->set('games', $games);

    return new Response($game, 200, array(
        "Content-Type" => 'json'
    ));
});


$app->get('/game/{id}', function ($id) use ($app) {

    $games = $app['session']->get('games');

    $game = $app['serializer']->deserialize($games[$id], Play::class, 'json');

    return new JsonResponse($game, 200, array(
        "Content-Type" => 'json'
    ));
});

$app->get('/game', function () use ($app) {

    $games = $app['session']->get('games');

    return new JsonResponse($games, 200, array(
        "Content-Type" => 'json'
    ));

});


$app->run();
