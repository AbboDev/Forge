<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

function config() {
    $args = func_get_args();
    $config = \Phalcon\Di::getDefault()->getShared('config');

    if (empty($args)) {
       return $config;
    }

    return call_user_func_array(
        [$config, 'path'],
        $args
    );
}

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
