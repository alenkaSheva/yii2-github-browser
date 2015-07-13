<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\GithubUsers;

echo '<div class="row">';
 // project's info
    echo '<div class="col-md-6" id="proj-info">';
        echo '<div id="name-proj">'.$proj['full_name'].'</div>';

        echo '<div id="desc-proj">Description: '.$proj['description'].'</div>';
        echo 'watchers: '.$proj['watchers'].'<br/>';
        echo 'forks: '.$proj['forks'].'<br/>';
        echo 'open issues: '.$proj['open_issues'].'<br/>';
        echo 'homepage: ';
            echo Html::a(
                            $proj['homepage'],
                            Url::to($proj['homepage'])
            );
        echo '<br/>';
        echo 'Github repo: ';
            echo Html::a(
                            $proj['html_url'],
                            Url::to($proj['html_url'])
            );
        echo '<br/>';
        echo 'created at: '.$proj['created_at'].'<br/>';

    echo '</div>';

 // contributor's info
    echo '<div class="col-md-6 contributor-info">';
        echo '<div id="head-user">Contributors: </div>';
                foreach($contributor as $key=>$value){
                    echo '<div class="row contributor-info-line">';
                        echo '<div class="col-md-6 contributor-info-ref" >';
                            $contributor_info = (array)$value;
                            echo Html::a(
                                $contributor_info['login'],
                                Url::to(['git/user','id'=>$contributor_info['login']])
                            );
                        echo '<br/></div>';
                        echo '<div class="col-md-6">';
                         // like-status
                            $status = GithubUsers::find()->where(['id_user' => $contributor_info['id']])->one();
                            $status =$status['status_user'];
                            $vid = ($status == 1)?'del':'ins';

                            $img = ($status == 1)?'/img/like.png':'/img/unlike.png';
                            echo \Yii::$app->view->renderFile('@app/views/ajax/like.php', [
                                'id' => $contributor_info['id'],
                                'user'.$contributor_info['id'] =>
                                    '<a href="/ajax/like?sub=user&amp;id='.$contributor_info["id"].'&amp;vid='.$vid.'">
                                        <img id="user-like" src="'.$img.'" alt="">
                                    </a>',
                            ]);
                        echo '</div>';
                    echo '</div>';
                }
    echo '</div>';


echo '</div>';

?>
