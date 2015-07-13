<?php

namespace app\components;

use yii\base\Widget;
use Milo\Github\Api as GitHubApi;
use Milo\Github\OAuth\Token as MyToken;

class ProjWidget extends Widget{

    public $owner;
    public $repo;

    private $response_proj;
    private $response_contributor;

    public function init (){
        parent::init();
        $api = new GitHubApi;

        //$token = new MyToken('833e3c356b24acecf75b52aa815ab48c82ad21ef');
        //$api->setToken($token);
        //$api->getToken();

     // project's info http://developer.github.com/v3/repos/#get
        $this->response_proj = $api->get('/repos/:owner/:repo',
                                    [
                                        'owner' => $this->owner,
                                        'repo'  => $this->repo
                                    ]
        );
        $this->response_proj = (array)$api->decode($this->response_proj);

     // contributor's info http://developer.github.com/v3/repos/#list-contributors
        $this->response_contributor= $api->get('/repos/:owner/:repo/contributors',
                                    [
                                        'owner' => $this->owner,
                                        'repo'  => $this->repo
                                    ]
        );
        $this->response_contributor = (array)$api->decode($this->response_contributor);
    }

    public function run(){

        return $this->render(
            'proj',
            [
                'proj'        => $this->response_proj,
                'contributor' => $this->response_contributor
            ]
        );

    }

}


?>



