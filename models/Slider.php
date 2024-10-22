<?php

namespace app\models;

use yii\base\Model;

class Slider extends Model
{
    public static function getImage()
    {
        $data = [
            'japan.jpg',
            'japan2.jpg',
            'japan3.jpg',
        ];
        return $data;
    }
}