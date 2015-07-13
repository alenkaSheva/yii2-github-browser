<?php
/* @var $this yii\web\View */

use yii\widgets\Pjax;

Pjax::begin(['id' => $id]);
// like-status
   echo ${'user'.$id};
   unset(${'user'.$id});
Pjax::end();

?>