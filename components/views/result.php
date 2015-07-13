<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\GithubRepos;

foreach($repo as $proj){
    $item_proj  = (array)$proj;
    $item_owner = (array)$item_proj['owner'];

    echo '<div class="search-result">';
        echo '<div class="row row-header">';
         // name project
            echo '<div class="col-md-4">';
            echo Html::a(
                $item_proj['name'],
                Url::to(['git/main','owner'=>$item_owner['login'],'repo'=>$item_proj['name']])
            );
            echo '</div>';

         // homepage
            echo '<div class="col-md-4">';
            echo Html::a(
                       $item_proj['homepage'],
                       Url::to($item_proj['homepage'])
            );
            echo '</div>';

         // owner
            echo '<div class="col-md-4">';
            echo Html::a(
                $item_owner['login'],
                Url::to(['git/user','id'=>$item_owner['login']])
            );
            echo '</div>';

        echo '</div>';

        echo '<div class="row">';
         // description
            echo '<div class="col-md-12">'.$item_proj['description'].'</div>';
        echo '</div>';

        echo '<div class="row">';
         // watchers
            echo '<div class="col-md-4">watchers: '.$item_proj['watchers'].'</div>';
         // forks
            echo '<div class="col-md-4">forks: '.$item_proj['forks'].'</div>';
         // empty
            echo '<div class="col-md-3"></div>';

         // like-status
            $status = GithubRepos::find()->where(['id_repos' => $item_proj['id']])->one();
            $status = $status['status_repos'];
            $vid = ($status == 1)?'del':'ins';

            $img = ($status == 1)?'/img/like.png':'/img/unlike.png';
            echo \Yii::$app->view->renderFile('@app/views/ajax/like.php', [
                'id' => $item_proj['id'],
                'user'.$item_proj['id'] =>
                    '<a href="/ajax/like?sub=repo&amp;id='.$item_proj["id"].'&amp;vid='.$vid.'">
                        <img id="repo-like" src="'.$img.'" alt="">
                    </a>',
            ]);
        echo '</div>';

    echo "<p></div>";
}


?>