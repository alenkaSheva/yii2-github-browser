<?php

use app\components\ProjWidget;


echo ProjWidget::widget(
    [
         'owner' => $owner,
         'repo'  => $repo
    ]
);


?>


