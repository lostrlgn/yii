<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\httpclient\Client;

class UserController extends Controller
{
    public function actionList()
    {
        // Делаем запрос к внешнему API
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://example.com/users')
            ->send();

        // Декодируем JSON
        $users = $response->isOk ? $response->data : [];

        // Передаем данные в представление
        return $this->render('list', ['users' => $users]);
    }
}
