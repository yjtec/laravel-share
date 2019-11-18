<?php 
namespace Yjtec\LaravelShare;
use Yjtec\LaravelShare\Support\Wx;
class Share{
    private $wx;
    public function __construct($config){
        $this->wx = new Wx($config['appId'],$config['appSecret']);
    }

    public function token(){
        return $this->wx->token();
    }

    public function ticket(){
        return $this->wx->ticket();
    }

    public function jsapi($uri){
        return $this->wx->jsapi($uri);
    }
}
?>