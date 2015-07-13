<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "github_users".
 *
 * @property integer $id_user
 * @property integer $status_user
 *
 * @property GithubReposUsers[] $githubReposUsers
 */
class GithubUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'github_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user', 'status_user'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'status_user' => 'Status User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGithubReposUsers()
    {
        return $this->hasMany(GithubReposUsers::className(), ['id_users' => 'id_user']);
    }
}
