<?php

namespace app\controllers;
use app\models\GithubUsers;
use app\models\GithubRepos;


class AjaxController extends \yii\web\Controller
{
    public function actionLike()
    {
        if($_GET['sub'] == 'user'){
            $this->actionLikeUser();
        }
        else if($_GET['sub'] == 'repo'){
            $this->actionLikeRepo();
        }

        $sub  =  $_GET['sub'];
        $id   =  $_GET['id'];
        $vid  = ($_GET['vid'] == 'ins')?'del':'ins';
        $img  = ($_GET['vid'] == 'ins')?'/img/like.png':'/img/unlike.png';
        $output = '<a href="/ajax/like?sub='.$sub.'&amp;id='.$id.'&amp;vid='.$vid.'">
                        <img id="'.$sub.'-like" src="'.$img.'" alt="">
                    </a>';

        return $this->render('like', ['id' => $id, 'user'.$id => $output ]);
    }

    public function actionLikeUser()
    {
        $check_user = GithubUsers::find()->where(['id_user' => $_GET['id']])->one();

        if($_GET['vid'] == 'ins' && empty($check_user)){
         // save contributor's like-status in local BD
            $user = new GithubUsers();
            $user->id_user = $_GET['id'];
            $user->status_user = 1;
            $user->save();
        }
        else if ($_GET['vid'] == 'del' && !empty($check_user)){
         // delete contributor's like-status in local BD
            $user = GithubUsers::findOne($_GET['id']);
            $user->delete();
        }
    }

    public function actionLikeRepo()
    {
        $check_repo = GithubRepos::find()->where(['id_repos' => $_GET['id']])->one();

        if($_GET['vid'] == 'ins' && empty($check_repo)){
         // save repo's like-status in local BD
            $user = new GithubRepos();
            $user->id_repos = $_GET['id'];
            $user->status_repos = 1;
            $user->save();
        }
        else if ($_GET['vid'] == 'del' && !empty($check_repo)){
         // delete repo's like-status in local BD
            $user = GithubRepos::findOne($_GET['id']);
            $user->delete();
        }
    }

}

?>