<?php

use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;

// Create a events manager
$eventsManager = new EventsManager();

$eventsManager->attach(
    'micro:afterExecuteRoute',
    function(Event $event, $app) {
        $return = $app->getReturnedValue();
        $params = $app->router->getParams();

        $format = (array_key_exists('format', $params)) ? $params['format'] : null;

        switch ($format) {
            case 'json':
                $content_type = 'application/json';
                break;

            case 'md':
            case 'markdown':
                $content_type = 'text/x-markdown';
                // $content_type = 'text/markdown';
                break;

            case 'txt':
            case 'text':
                $content_type = 'text/plain';
                break;

            case 'yml':
            case 'yaml':
                $content_type = 'application/x-yaml';
                // $content_type = 'text/yaml';
                break;

            case 'xhtml':
                $content_type = 'application/xhtml+xml';
                break;

            case 'xml':
                $content_type = 'text/xml';
                // $content_type = 'application/xml';
                break;

            case null:
            case 'html':
            default:
                $content_type = 'text/html';
                break;
        }

        $app->response->setContentType($content_type, 'UTF-8');

        if (is_array($return)) {
            $app->response->setContent(json_encode($return));
        } elseif (!strlen($return)) {
            $app->response->setStatusCode('204', 'No Content');
        } else {
            // Unexpected response
            throw new Exception('Bad Response');
        }

        $app->response->send();
    }
);

// Bind the events manager to the app
$app->setEventsManager($eventsManager);
