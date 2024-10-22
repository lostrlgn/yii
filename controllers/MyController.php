<?php

namespace app\controllers;

use app\models\MyModel;
use yii\web\Controller;

class MyController  extends Controller 
{
    public function actionPhoto()
    {
        $data = MyModel::getImage();
        return $this->render('photo', compact('data'));
    }
    public function actionHelloUser()
    {
        $user = 'vasya';
        // version 1
        // return $this->render('hello', [
        //     'user' => $user
        // ]);
        
        // version2 
        return $this->render('hello', compact('user'));

    }
}