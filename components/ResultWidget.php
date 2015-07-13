<?php

namespace app\components;

use yii\base\Widget;
use Milo\Github\Api as GitHubApi;

class ResultWidget extends Widget{

    public $search;

    public function init (){
        parent::init();

     // search projects http://developer.github.com/v3/search/#search-repositories
        $api = new GitHubApi;
        $this->search = $api->get('/search/repositories?q=' . str_replace(' ', '+', $this->search), []);
        $this->search = (array)$api->decode($this->search);
        $this->search = $this->search['items'];
    }

    public function run(){

        return $this->render(
            'result',
            [
                'repo' => $this->search
            ]
        );

    }

}


?>


