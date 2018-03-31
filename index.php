<?php
use WebServer\HttpRequest;
use WebServer\HttpResponse;
use WebServer\Service\BracketFactory;
use WebServer\Application;

require_once __DIR__ . "/vendor/autoload.php";

$app = new Application(new BracketFactory(), new HttpResponse(), new HttpRequest());
$app->run();
$app->getCode();