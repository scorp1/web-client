<?php
namespace WebServer;

use WebServer\Exceptions\InvalidMethodException;
use WebServer\Exceptions\InvalidArgumentException;
use WebServer\Interfaces\ApplicationInterface;
use WebServer\Service\BracketFactory;

class Application implements ApplicationInterface
{
    const OK = 200;
    const BAD = 400;

    /**
     * @var string
     */
    private $varString = 'string';
    /**
     * @var
     */
    private $checkBrackets;

    /**
     * @var
     */
    private $httpRequest;

    /**
     * @var
     */
    private $httpResponse;

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

    /** Function request string with brackets send from user
     *
     * @return mixed
     */
    public function request()
    {
        if(!$this->httpRequest->isPost()){
            throw new InvalidMethodException("Error, it is not method POST!");
        }
        if(!$this->httpRequest->getValue($this->varString)){
            throw new \InvalidArgumentException("Invalid request value!");
        }
       return $this->httpRequest->getValue($this->varString);
    }

    /** Function get http code 200 or 400
     *
     * @return $this
     */
    public function getCode()
    {
        return $this->httpResponse->getHTTPCodeAndMessage();
    }

    /** Function check bracket in request user
     *
     * @return mixed|void
     */
    public function run()
    {
        try {
            $result = $this->checkBrackets->setBracket($this->request());

        if ( $result['message'] == 'Недопустимые символы' ) {
            throw new \InvalidArgumentException('Invalid character');
        }
        if ( $result !== true ){
            throw new \InvalidArgumentException("Error, Brackets are not right");
        }

        return $this->httpResponse->setHTTPCodeAndMessage(self::OK,'Brackets are right');

    } catch (\InvalidArgumentException $e){

        return $this->httpResponse->setHTTPCodeAndMessage(self::BAD, $e->getMessage());
    }
    }
}