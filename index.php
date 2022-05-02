<?php
include 'vendor/autoload.php';
include 'src/helper.php';
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
$app = \Application\App::getInstance();

$session = new Session(new NativeSessionStorage(), new AttributeBag());
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$request->setSession($session);

$adapter = new League\Flysystem\Local\LocalFilesystemAdapter(__DIR__);
$filesystem = new League\Flysystem\Filesystem($adapter);

$router = \Application\Routing\Router::getInstance();

$app->bindLazy(\Symfony\Component\HttpFoundation\Request::class,$request);
$app->bindLazy(\Symfony\Component\HttpFoundation\Session\Session::class,$session);
$app->bind('router', $router);
$app->bind('request', $request);
$app->bind('session', $session);
$app->bind('files', $filesystem);

$app->registerProvider([
   \App\Home\Provider\HomeProvider::class
]);
$app->run();