<?php

namespace app\controllers;

use app\models\Slider;
use yii\web\Controller;

class SliderController extends Controller
{
    public function actionCarousel()
    {
        $data = Slider::getImage();

        return $this->render('carousel', compact('data'));
    }
}