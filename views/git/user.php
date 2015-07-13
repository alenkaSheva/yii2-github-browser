<?php

use app\components\UserWidget;

echo UserWidget::widget(
   [
        'user' => $id
   ]
);

?>
