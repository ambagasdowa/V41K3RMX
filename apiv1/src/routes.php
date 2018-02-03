<?php
// Routes

$app->get('/[{name}]', function ($req, $res, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($res, 'index.phtml', $args);
});
