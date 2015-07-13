<?php

use yii\helpers\Html;
use yii\helpers\Url;

echo '<div id="profile">';
    echo '<div class="row">';
     // contributor's avatar
        echo '<div class="col-md-6">';
         // avatar
            echo Html::img($user['avatar_url'], ['id' => 'user-avatar', 'alt' => 'user avatar']);
         // like-status
            $vid = ($status == 1)?'del':'ins';
            $img = ($status == 1)?'/img/like.png':'/img/unlike.png';
            echo \Yii::$app->view->renderFile('@app/views/ajax/like.php', [
                'id' => $user['id'],
                'user'.$user['id'] =>
                    '<a href="/ajax/like?sub=user&amp;id='.$user["id"].'&amp;vid='.$vid.'">
                        <img id="user-like" src="'.$img.'" alt="">
                    </a>',
            ]);
        echo '</div>';

     // contributor's info
        echo '<div class="col-md-6">';
         // name
            echo '<div id="name-user">'.$user['name'].'</div>';
         // other info
            echo $user['login'].'<br/>';
            echo 'Company: '.$user['company'].'<br/>';
            echo 'Blog: ';
                echo Html::a(
                              $user['blog'],
                              Url::to($user['blog'])
                );
            echo '<br/>';
            echo 'Followers: '.$user['followers'].'<br/>';
        echo '</div>';

    echo '</div>';

echo '</div>';



?>
