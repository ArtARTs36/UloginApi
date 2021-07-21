<?php

namespace ArtARTs36\ULoginApi;

use ArtARTs36\ULoginApi\Contracts\Hostable;
use ArtARTs36\ULoginApi\Contracts\Request;
use ArtARTs36\ULoginApi\Exceptions\ExceptionHandler;
use RuntimeException;

/**
 * Class Client
 * @package ArtARTs36\ULoginApi
 */
class Client implements Contracts\Client
{
    /** @var string */
    private $host;

    /** @var string */
    private $baseUrl;

    /** @var ExceptionHandler */
    private $exceptionHandler;

    /**
     * @param string $host
     * @param string $baseUrl
     * @param ExceptionHandler|null $exceptionHandler
     */
    public function __construct(
        string $host,
        string $baseUrl = 'http://ulogin.ru',
        ExceptionHandler $exceptionHandler = null
    ) {
        $this->host = $host;
        $this->baseUrl = $baseUrl;
        $this->exceptionHandler = $exceptionHandler ?? new ExceptionHandler();
    }

    /**
     * @inheritDoc
     */
    public function execute(Request $request): array
    {
        $curl = $this->createCurl($request);

        $response = \curl_exec($curl);

        $this->exceptionHandler->handle($request->url(), $response, \curl_getinfo($curl, CURLINFO_HTTP_CODE));

        if (($error = \curl_error($curl)) && (!empty($this->curl))) {
            throw new RuntimeException($error);
        }

        \curl_close($curl);

        return \json_decode($response, true);
    }

    /**
     * @param Request $request
     * @return false|resource
     */
    private function createCurl(Request $request)
    {
        $url = $this->url($request->url());
        if ($request instanceof Hostable) {
            if ($request->method() === Request::METHOD_GET) {
                $url .= '&host='. $this->host;
            }
        }

        \curl_setopt_array($curl = \curl_init(), [
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $request->method(),
            CURLOPT_URL => $url,
        ]);

        return $curl;
    }

    /**
     * @param string $url
     * @return string
     */
    private function url(string $url): string
    {
        return $this->baseUrl . DIRECTORY_SEPARATOR . $url;
    }
}
