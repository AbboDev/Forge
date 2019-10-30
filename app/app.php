<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function() {
    echo $this['view']->render('index');
});

include APP_PATH . '/config/routes.php';

/**
 * Not found handler
 */
$app->notFound(function() use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});
