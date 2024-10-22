<?php

use yii\bootstrap5\Carousel;

    $path = '/img/';
    
    
echo Carousel::widget([
      'items' => [
          [
              'content' => '<img src="' . $path . $data[0] . '"/>',
              'caption' => '<h4>Япония</h4><p>Изображение девушки в традиционной одежде</p>',
              'captionOptions' => ['class' => ['d-none', 'd-md-block']],
          ],
          [
              'content' => '<img src="' . $path . $data[1] . '"/>',
              'caption' => '<h4>Япония</h4><p>Изображение сакуры</p>',
              'captionOptions' => ['class' => ['d-none', 'd-md-block']],
          ],
          [
              'content' => '<img src="' . $path . $data[2] . '"/>',
              'caption' => '<h4>Япония</h4><p>ИСкусство</p>',
              'captionOptions' => ['class' => ['d-none', 'd-md-block']],
          ],
      ]
  ]);
    
?>
