<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "github_repos".
 *
 * @property integer $id_repos
 * @property integer $status_repos
 *
 * @property GithubReposUsers[] $githubReposUsers
 */
class GithubRepos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'github_repos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_repos'], 'required'],
            [['id_repos', 'status_repos'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_repos' => 'Id Repos',
            'status_repos' => 'Status Repos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGithubReposUsers()
    {
        return $this->hasMany(GithubReposUsers::className(), ['id_repos' => 'id_repos']);
    }
}
