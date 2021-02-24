<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function (App $app) {

    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });
    $app->get('/home',\App\Action\HomeAction::class)->setName('home');

    //Operações com usuário
    $app->post('/users',\App\Action\UserCreateAction::class);

    $app->get('/users',\App\Action\UserListAction::class);

    $app->get('/users/{id}',\App\Action\UserReaderAction::class);

    $app->put('/users',\App\Action\UserUpdateAction::class);

    $app->delete('/users/{id}',\App\Action\UserDeleteAction::class);

    $app->post('/login',\App\Action\UserLoginAction::class);
};
