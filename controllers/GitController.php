<?php

namespace app\controllers;
use Yii;

class GitController extends \yii\web\Controller
{
    public function actionMain($owner = 'yiisoft', $repo = 'yii')
    {
        return $this->render(
            'main',
            [
                'owner' => $owner,
                'repo'  => $repo
            ]
        );
    }

    public function actionSearch($search = null)
    {
        if ($search):
            Yii::$app->session->setFlash(
                'success',
                'For search term "'.$search.'" found'
            );
        else:
            Yii::$app->session->setFlash(
                'error',
                'Search form is not filled !!!'
            );
        endif;

        return $this->render(
            'search',
            [
                'search' => $search
            ]
        );
    }

    public function actionUser($id)
    {
        return $this->render(
            'user',
            [
                'id' => $id
            ]
        );
    }

}
