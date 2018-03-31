<?php
namespace WebServer;

use Beloplotov\Balance;
use WebServer\Interfaces\ApplicationInterface;
use WebServer\Service\BracketFactory;

class Application implements ApplicationInterface
{
    const OK = 200;
    const BAD = 400;

    private $varString = 'string';
    /**
     * @var
     */
    protected $checkBrackets;

    /**
     * @var
     */
    private $httpRequest;

    /**
     * @var
     */
    protected $httpResponse;

    /**
     * Application constructor.
     * @param BracketFactory $bracketFactory
     * @param HttpResponse $httpResponse
     * @param HttpRequest $httpRequest
     */
    public function __construct(BracketFactory $bracketFactory, HttpResponse $httpResponse, HttpRequest $httpRequest)
    {
        $this->checkBrackets = $bracketFactory;
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $httpResponse;

    }

    /**
     * @return mixed
     */
    public function request()
    {
        if(!$this->httpRequest->isPost()){
            throw new \InvalidArgumentException("Error isPost, 405");
        }
        if(!$this->httpRequest->getValue($this->varString)){
            throw new \InvalidArgumentException("Error getValue, 400");
        }
       return $this->httpRequest->getValue($this->varString);
    }

    /**
     *
     */
    public function getCode()
    {
        return $this->httpResponse->getHTTPCode();
    }

    /**
     * @return mixed|void
     */
    public function run()
    {
        try {
            $result = $this->checkBrackets->setBracket($this->request());

        if ( $result['message'] == 'Недопустимые символы' ) {
            throw new \Exception('Недопустимые символы');
        }
        if ( $result !== true ){
            throw new \Exception("Скобки стоят не правильно");
        }

        return $this->httpResponse->setHTTPCode(self::OK);

    } catch (\Exception $e){

        return $this->httpResponse->setHTTPCode(self::BAD);
    }
    }
}