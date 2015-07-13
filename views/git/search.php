<?php

use app\components\AlertWidget;
use app\components\ResultWidget;

echo AlertWidget::widget();

if ($search) {

    echo ResultWidget::widget(
        [
            'search' => $search
        ]
    );

}

?>