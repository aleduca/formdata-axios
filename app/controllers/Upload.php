<?php

namespace app\controllers;

class Upload extends Base
{
    public function index($request, $response)
    {
        return $this->getTwig()->render($response, $this->setView('site/upload'), [
            'title' => 'Upload',
        ]);
    }

    public function store($request, $response)
    {
        // $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        // $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];

        if (@move_uploaded_file($temp, './upload/' . $name)) {
            $response->getBody()->write(json_encode(['uploaded' => 'Upload feito com sucesso']));
            return $response->withHeader('Content-type', 'application/json')->withStatus(200);
        }

        $response->getBody()->write(json_encode(['error' => 'Ocorreu um erro ao cadastrar a imagem']));
        return $response->withHeader('Content-type', 'application/json')->withStatus(404);
    }
}
