<?php
namespace App\Telegram;

class TelegramController implements \App\Core\ControllerInterface
{
    /**
     * @var \App\Core\Controller Main Controller
     */
    private $controller;

    protected $requestParams = [];
 
    private $class;

    public function __construct() 
    {
        $this->class = new TelegramClass();
    }
    
    public function main()
    {
        return \json_encode('MAIN');
    }
    
    public function getRequestParams()
    {
        return $this->requestParams;
    }
   
    public function setRequestParams(array $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    public function setController(\App\Core\Controller $controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function setNewUpdates()
    {
        $a = '{"update_id":536948559,"message":{"message_id":475,"from":{"id":159867452,"first_name":"Rinzler"},"chat":{"id":159867452,"first_name":"Rinzler","type":"private"},"date":1472859360,"text":"TESTE"}}';
        //$payload = \json_decode(\file_get_contents('php://input'), true);
        $payload = \json_decode($a, true);//TEST
        if($this->class->setParams($this->getRequestParams())->setNewUpdates($payload) === true) {
            return ($this->controller->jsonSucess("Message saved."));
        } else {
            return ($this->controller->jsonError("Error"));
        }
    }
}