<?php
namespace app\models;

use yii\base\Model;

class MyModel extends Model
{
    public static function getImage()
    {
        $data = [
            'Девушка в традиционной одежде' => 'japan.jpg',
            'Цветение сакуры' => 'japan2.jpg',
            'Японское искусство' => 'japan3.jpg',
        ];
        return $data;
    } 
}