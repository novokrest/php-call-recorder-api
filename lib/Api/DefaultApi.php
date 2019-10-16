<?php
/**
 * DefaultApi
 * PHP version 5
 *
 * @category Class
 * @package  Call\Recorder\Client
 */

/**
 * Call Recorder API
 *
 * Call Recorder API
 *
 * OpenAPI spec version: 1.0.0
 */


namespace Call\Recorder\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Call\Recorder\Client\ApiException;
use Call\Recorder\Client\Configuration;
use Call\Recorder\Client\HeaderSelector;
use Call\Recorder\Client\ObjectSerializer;

/**
 * DefaultApi Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class DefaultApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation buyCredits
     *
     * @param  string $api_key api_key (required)
     * @param  int $amount amount (required)
     * @param  string $receipt receipt (required)
     * @param  int $product_id product_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\BuyCreditsResponse
     */
    public function buyCredits($request)
    {
        list($response) = $this->buyCreditsWithHttpInfo(
            $request->getApiKey(), 
            $request->getAmount(), 
            $request->getReceipt(), 
            $request->getProductId(), 
            $request->getDeviceType()
        );
        return $response;
    }

    /**
     * Operation buyCreditsWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $amount (required)
     * @param  string $receipt (required)
     * @param  int $product_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\BuyCreditsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function buyCreditsWithHttpInfo($api_key, $amount, $receipt, $product_id, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\BuyCreditsResponse';
        $request = $this->buyCreditsRequest($api_key, $amount, $receipt, $product_id, $device_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\BuyCreditsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation buyCreditsAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $amount (required)
     * @param  string $receipt (required)
     * @param  int $product_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function buyCreditsAsync($api_key, $amount, $receipt, $product_id, $device_type)
    {
        return $this->buyCreditsAsyncWithHttpInfo($api_key, $amount, $receipt, $product_id, $device_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation buyCreditsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $amount (required)
     * @param  string $receipt (required)
     * @param  int $product_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function buyCreditsAsyncWithHttpInfo($api_key, $amount, $receipt, $product_id, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\BuyCreditsResponse';
        $request = $this->buyCreditsRequest($api_key, $amount, $receipt, $product_id, $device_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'buyCredits'
     *
     * @param  string $api_key (required)
     * @param  int $amount (required)
     * @param  string $receipt (required)
     * @param  int $product_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function buyCreditsRequest($api_key, $amount, $receipt, $product_id, $device_type)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'amount' is set
        if ($amount === null || (is_array($amount) && count($amount) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $amount when calling '
            );
        }
        // verify the required parameter 'receipt' is set
        if ($receipt === null || (is_array($receipt) && count($receipt) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $receipt when calling '
            );
        }
        // verify the required parameter 'product_id' is set
        if ($product_id === null || (is_array($product_id) && count($product_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $product_id when calling '
            );
        }
        // verify the required parameter 'device_type' is set
        if ($device_type === null || (is_array($device_type) && count($device_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_type when calling '
            );
        }

        $resourcePath = '/rapi/buy_credits';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($amount !== null) {
            $formParams['amount'] = ObjectSerializer::toFormValue($amount);
        }
        // form params
        if ($receipt !== null) {
            $formParams['receipt'] = ObjectSerializer::toFormValue($receipt);
        }
        // form params
        if ($product_id !== null) {
            $formParams['product_id'] = ObjectSerializer::toFormValue($product_id);
        }
        // form params
        if ($device_type !== null) {
            $formParams['device_type'] = ObjectSerializer::toFormValue($device_type);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation cloneFile
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\CloneFileResponse
     */
    public function cloneFile($request)
    {
        list($response) = $this->cloneFileWithHttpInfo(
            $request->getApiKey(), 
            $request->getId()
        );
        return $response;
    }

    /**
     * Operation cloneFileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\CloneFileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cloneFileWithHttpInfo($api_key, $id)
    {
        $returnType = '\Call\Recorder\Client\Model\CloneFileResponse';
        $request = $this->cloneFileRequest($api_key, $id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\CloneFileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cloneFileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cloneFileAsync($api_key, $id)
    {
        return $this->cloneFileAsyncWithHttpInfo($api_key, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cloneFileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cloneFileAsyncWithHttpInfo($api_key, $id)
    {
        $returnType = '\Call\Recorder\Client\Model\CloneFileResponse';
        $request = $this->cloneFileRequest($api_key, $id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cloneFile'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cloneFileRequest($api_key, $id)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }

        $resourcePath = '/rapi/clone_file';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createFile
     *
     * @param  string $api_key api_key (required)
     * @param  string $file file (required)
     * @param  \Call\Recorder\Client\Model\CreateFileData $data data (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\CreateFileResponse
     */
    public function createFile($request)
    {
        list($response) = $this->createFileWithHttpInfo(
            $request->getApiKey(), 
            $request->getFile(), 
            $request->getData()
        );
        return $response;
    }

    /**
     * Operation createFileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  \Call\Recorder\Client\Model\CreateFileData $data (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\CreateFileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createFileWithHttpInfo($api_key, $file, $data)
    {
        $returnType = '\Call\Recorder\Client\Model\CreateFileResponse';
        $request = $this->createFileRequest($api_key, $file, $data);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\CreateFileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createFileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  \Call\Recorder\Client\Model\CreateFileData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFileAsync($api_key, $file, $data)
    {
        return $this->createFileAsyncWithHttpInfo($api_key, $file, $data)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createFileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  \Call\Recorder\Client\Model\CreateFileData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFileAsyncWithHttpInfo($api_key, $file, $data)
    {
        $returnType = '\Call\Recorder\Client\Model\CreateFileResponse';
        $request = $this->createFileRequest($api_key, $file, $data);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createFile'
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  \Call\Recorder\Client\Model\CreateFileData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createFileRequest($api_key, $file, $data)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }
        // verify the required parameter 'data' is set
        if ($data === null || (is_array($data) && count($data) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data when calling '
            );
        }

        $resourcePath = '/rapi/create_file';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($data !== null) {
            $formParams['data'] = ObjectSerializer::toFormValue($data);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createFolder
     *
     * @param  string $api_key api_key (required)
     * @param  string $name name (required)
     * @param  string $pass pass (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\CreateFolderResponse
     */
    public function createFolder($request)
    {
        list($response) = $this->createFolderWithHttpInfo(
            $request->getApiKey(), 
            $request->getName(), 
            $request->getPass()
        );
        return $response;
    }

    /**
     * Operation createFolderWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\CreateFolderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createFolderWithHttpInfo($api_key, $name, $pass)
    {
        $returnType = '\Call\Recorder\Client\Model\CreateFolderResponse';
        $request = $this->createFolderRequest($api_key, $name, $pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\CreateFolderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createFolderAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFolderAsync($api_key, $name, $pass)
    {
        return $this->createFolderAsyncWithHttpInfo($api_key, $name, $pass)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createFolderAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFolderAsyncWithHttpInfo($api_key, $name, $pass)
    {
        $returnType = '\Call\Recorder\Client\Model\CreateFolderResponse';
        $request = $this->createFolderRequest($api_key, $name, $pass);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createFolder'
     *
     * @param  string $api_key (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createFolderRequest($api_key, $name, $pass)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling '
            );
        }
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling '
            );
        }

        $resourcePath = '/rapi/create_folder';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($name !== null) {
            $formParams['name'] = ObjectSerializer::toFormValue($name);
        }
        // form params
        if ($pass !== null) {
            $formParams['pass'] = ObjectSerializer::toFormValue($pass);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteFiles
     *
     * @param  string $api_key api_key (required)
     * @param  int[] $ids ids (required)
     * @param  string $action action (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\DeleteFilesResponse
     */
    public function deleteFiles($request)
    {
        list($response) = $this->deleteFilesWithHttpInfo(
            $request->getApiKey(), 
            $request->getIds(), 
            $request->getAction()
        );
        return $response;
    }

    /**
     * Operation deleteFilesWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  string $action (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\DeleteFilesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteFilesWithHttpInfo($api_key, $ids, $action)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteFilesResponse';
        $request = $this->deleteFilesRequest($api_key, $ids, $action);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\DeleteFilesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteFilesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  string $action (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFilesAsync($api_key, $ids, $action)
    {
        return $this->deleteFilesAsyncWithHttpInfo($api_key, $ids, $action)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteFilesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  string $action (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFilesAsyncWithHttpInfo($api_key, $ids, $action)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteFilesResponse';
        $request = $this->deleteFilesRequest($api_key, $ids, $action);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteFiles'
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  string $action (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteFilesRequest($api_key, $ids, $action)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'ids' is set
        if ($ids === null || (is_array($ids) && count($ids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ids when calling '
            );
        }
        // verify the required parameter 'action' is set
        if ($action === null || (is_array($action) && count($action) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $action when calling '
            );
        }

        $resourcePath = '/rapi/delete_files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($ids !== null) {
            $formParams['ids'] = ObjectSerializer::toFormValue($ids);
        }
        // form params
        if ($action !== null) {
            $formParams['action'] = ObjectSerializer::toFormValue($action);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteFolder
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  int $move_to move_to (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\DeleteFolderResponse
     */
    public function deleteFolder($request)
    {
        list($response) = $this->deleteFolderWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getMoveTo()
        );
        return $response;
    }

    /**
     * Operation deleteFolderWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $move_to (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\DeleteFolderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteFolderWithHttpInfo($api_key, $id, $move_to)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteFolderResponse';
        $request = $this->deleteFolderRequest($api_key, $id, $move_to);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\DeleteFolderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteFolderAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $move_to (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFolderAsync($api_key, $id, $move_to)
    {
        return $this->deleteFolderAsyncWithHttpInfo($api_key, $id, $move_to)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteFolderAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $move_to (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFolderAsyncWithHttpInfo($api_key, $id, $move_to)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteFolderResponse';
        $request = $this->deleteFolderRequest($api_key, $id, $move_to);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteFolder'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $move_to (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteFolderRequest($api_key, $id, $move_to)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'move_to' is set
        if ($move_to === null || (is_array($move_to) && count($move_to) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $move_to when calling '
            );
        }

        $resourcePath = '/rapi/delete_folder';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($move_to !== null) {
            $formParams['move_to'] = ObjectSerializer::toFormValue($move_to);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteMetaFiles
     *
     * @param  string $api_key api_key (required)
     * @param  int[] $ids ids (required)
     * @param  int $parent_id parent_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\DeleteMetaFilesResponse
     */
    public function deleteMetaFiles($request)
    {
        list($response) = $this->deleteMetaFilesWithHttpInfo(
            $request->getApiKey(), 
            $request->getIds(), 
            $request->getParentId()
        );
        return $response;
    }

    /**
     * Operation deleteMetaFilesWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  int $parent_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\DeleteMetaFilesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteMetaFilesWithHttpInfo($api_key, $ids, $parent_id)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteMetaFilesResponse';
        $request = $this->deleteMetaFilesRequest($api_key, $ids, $parent_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\DeleteMetaFilesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteMetaFilesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMetaFilesAsync($api_key, $ids, $parent_id)
    {
        return $this->deleteMetaFilesAsyncWithHttpInfo($api_key, $ids, $parent_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteMetaFilesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMetaFilesAsyncWithHttpInfo($api_key, $ids, $parent_id)
    {
        $returnType = '\Call\Recorder\Client\Model\DeleteMetaFilesResponse';
        $request = $this->deleteMetaFilesRequest($api_key, $ids, $parent_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteMetaFiles'
     *
     * @param  string $api_key (required)
     * @param  int[] $ids (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteMetaFilesRequest($api_key, $ids, $parent_id)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'ids' is set
        if ($ids === null || (is_array($ids) && count($ids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ids when calling '
            );
        }
        // verify the required parameter 'parent_id' is set
        if ($parent_id === null || (is_array($parent_id) && count($parent_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $parent_id when calling '
            );
        }

        $resourcePath = '/rapi/delete_meta_files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($ids !== null) {
            $formParams['ids'] = ObjectSerializer::toFormValue($ids);
        }
        // form params
        if ($parent_id !== null) {
            $formParams['parent_id'] = ObjectSerializer::toFormValue($parent_id);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getFiles
     *
     * @param  string $api_key api_key (required)
     * @param  string $page page (required)
     * @param  int $folder_id folder_id (required)
     * @param  string $source source (required)
     * @param  string $pass pass (required)
     * @param  bool $reminder reminder (required)
     * @param  string $q q (required)
     * @param  int $id id (required)
     * @param  string $op op (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetFilesResponse
     */
    public function getFiles($request)
    {
        list($response) = $this->getFilesWithHttpInfo(
            $request->getApiKey(), 
            $request->getPage(), 
            $request->getFolderId(), 
            $request->getSource(), 
            $request->getPass(), 
            $request->getReminder(), 
            $request->getQ(), 
            $request->getId(), 
            $request->getOp()
        );
        return $response;
    }

    /**
     * Operation getFilesWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $page (required)
     * @param  int $folder_id (required)
     * @param  string $source (required)
     * @param  string $pass (required)
     * @param  bool $reminder (required)
     * @param  string $q (required)
     * @param  int $id (required)
     * @param  string $op (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetFilesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFilesWithHttpInfo($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)
    {
        $returnType = '\Call\Recorder\Client\Model\GetFilesResponse';
        $request = $this->getFilesRequest($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetFilesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFilesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $page (required)
     * @param  int $folder_id (required)
     * @param  string $source (required)
     * @param  string $pass (required)
     * @param  bool $reminder (required)
     * @param  string $q (required)
     * @param  int $id (required)
     * @param  string $op (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFilesAsync($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)
    {
        return $this->getFilesAsyncWithHttpInfo($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFilesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $page (required)
     * @param  int $folder_id (required)
     * @param  string $source (required)
     * @param  string $pass (required)
     * @param  bool $reminder (required)
     * @param  string $q (required)
     * @param  int $id (required)
     * @param  string $op (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFilesAsyncWithHttpInfo($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)
    {
        $returnType = '\Call\Recorder\Client\Model\GetFilesResponse';
        $request = $this->getFilesRequest($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getFiles'
     *
     * @param  string $api_key (required)
     * @param  string $page (required)
     * @param  int $folder_id (required)
     * @param  string $source (required)
     * @param  string $pass (required)
     * @param  bool $reminder (required)
     * @param  string $q (required)
     * @param  int $id (required)
     * @param  string $op (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFilesRequest($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'page' is set
        if ($page === null || (is_array($page) && count($page) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $page when calling '
            );
        }
        // verify the required parameter 'folder_id' is set
        if ($folder_id === null || (is_array($folder_id) && count($folder_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $folder_id when calling '
            );
        }
        // verify the required parameter 'source' is set
        if ($source === null || (is_array($source) && count($source) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source when calling '
            );
        }
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling '
            );
        }
        // verify the required parameter 'reminder' is set
        if ($reminder === null || (is_array($reminder) && count($reminder) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $reminder when calling '
            );
        }
        // verify the required parameter 'q' is set
        if ($q === null || (is_array($q) && count($q) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $q when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'op' is set
        if ($op === null || (is_array($op) && count($op) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $op when calling '
            );
        }

        $resourcePath = '/rapi/get_files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($page !== null) {
            $formParams['page'] = ObjectSerializer::toFormValue($page);
        }
        // form params
        if ($folder_id !== null) {
            $formParams['folder_id'] = ObjectSerializer::toFormValue($folder_id);
        }
        // form params
        if ($source !== null) {
            $formParams['source'] = ObjectSerializer::toFormValue($source);
        }
        // form params
        if ($pass !== null) {
            $formParams['pass'] = ObjectSerializer::toFormValue($pass);
        }
        // form params
        if ($reminder !== null) {
            $formParams['reminder'] = ObjectSerializer::toFormValue($reminder);
        }
        // form params
        if ($q !== null) {
            $formParams['q'] = ObjectSerializer::toFormValue($q);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($op !== null) {
            $formParams['op'] = ObjectSerializer::toFormValue($op);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getFolders
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetFoldersResponse
     */
    public function getFolders($request)
    {
        list($response) = $this->getFoldersWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getFoldersWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetFoldersResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFoldersWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetFoldersResponse';
        $request = $this->getFoldersRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetFoldersResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFoldersAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFoldersAsync($api_key)
    {
        return $this->getFoldersAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFoldersAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFoldersAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetFoldersResponse';
        $request = $this->getFoldersRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getFolders'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFoldersRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_folders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getLanguages
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetLanguagesResponse
     */
    public function getLanguages($request)
    {
        list($response) = $this->getLanguagesWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getLanguagesWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetLanguagesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getLanguagesWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetLanguagesResponse';
        $request = $this->getLanguagesRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetLanguagesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getLanguagesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getLanguagesAsync($api_key)
    {
        return $this->getLanguagesAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getLanguagesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getLanguagesAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetLanguagesResponse';
        $request = $this->getLanguagesRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getLanguages'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getLanguagesRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_languages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMetaFiles
     *
     * @param  string $api_key api_key (required)
     * @param  int $parent_id parent_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetMetaFilesResponse
     */
    public function getMetaFiles($request)
    {
        list($response) = $this->getMetaFilesWithHttpInfo(
            $request->getApiKey(), 
            $request->getParentId()
        );
        return $response;
    }

    /**
     * Operation getMetaFilesWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $parent_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetMetaFilesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMetaFilesWithHttpInfo($api_key, $parent_id)
    {
        $returnType = '\Call\Recorder\Client\Model\GetMetaFilesResponse';
        $request = $this->getMetaFilesRequest($api_key, $parent_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetMetaFilesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMetaFilesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetaFilesAsync($api_key, $parent_id)
    {
        return $this->getMetaFilesAsyncWithHttpInfo($api_key, $parent_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMetaFilesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetaFilesAsyncWithHttpInfo($api_key, $parent_id)
    {
        $returnType = '\Call\Recorder\Client\Model\GetMetaFilesResponse';
        $request = $this->getMetaFilesRequest($api_key, $parent_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMetaFiles'
     *
     * @param  string $api_key (required)
     * @param  int $parent_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMetaFilesRequest($api_key, $parent_id)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'parent_id' is set
        if ($parent_id === null || (is_array($parent_id) && count($parent_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $parent_id when calling '
            );
        }

        $resourcePath = '/rapi/get_meta_files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($parent_id !== null) {
            $formParams['parent_id'] = ObjectSerializer::toFormValue($parent_id);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMsgs
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetMessagesResponse
     */
    public function getMsgs($request)
    {
        list($response) = $this->getMsgsWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getMsgsWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetMessagesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMsgsWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetMessagesResponse';
        $request = $this->getMsgsRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetMessagesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMsgsAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMsgsAsync($api_key)
    {
        return $this->getMsgsAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMsgsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMsgsAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetMessagesResponse';
        $request = $this->getMsgsRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMsgs'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMsgsRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_msgs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPhones
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetPhonesResponse
     */
    public function getPhones($request)
    {
        list($response) = $this->getPhonesWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getPhonesWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetPhonesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPhonesWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetPhonesResponse[]';
        $request = $this->getPhonesRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetPhonesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPhonesAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPhonesAsync($api_key)
    {
        return $this->getPhonesAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPhonesAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPhonesAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetPhonesResponse';
        $request = $this->getPhonesRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPhones'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPhonesRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_phones';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getProfile
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetProfileResponse
     */
    public function getProfile($request)
    {
        list($response) = $this->getProfileWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getProfileWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetProfileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getProfileWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetProfileResponse';
        $request = $this->getProfileRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetProfileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getProfileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProfileAsync($api_key)
    {
        return $this->getProfileAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getProfileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProfileAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetProfileResponse';
        $request = $this->getProfileRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getProfile'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getProfileRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_profile';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getSettings
     *
     * @param  string $api_key api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetSettingsResponse
     */
    public function getSettings($request)
    {
        list($response) = $this->getSettingsWithHttpInfo(
            $request->getApiKey()
        );
        return $response;
    }

    /**
     * Operation getSettingsWithHttpInfo
     *
     * @param  string $api_key (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetSettingsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSettingsWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetSettingsResponse';
        $request = $this->getSettingsRequest($api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetSettingsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSettingsAsync
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSettingsAsync($api_key)
    {
        return $this->getSettingsAsyncWithHttpInfo($api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSettingsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSettingsAsyncWithHttpInfo($api_key)
    {
        $returnType = '\Call\Recorder\Client\Model\GetSettingsResponse';
        $request = $this->getSettingsRequest($api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getSettings'
     *
     * @param  string $api_key (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSettingsRequest($api_key)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }

        $resourcePath = '/rapi/get_settings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTranslations
     *
     * @param  string $api_key api_key (required)
     * @param  string $language language (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\GetTranslationsResponse
     */
    public function getTranslations($request)
    {
        list($response) = $this->getTranslationsWithHttpInfo(
            $request->getApiKey(), 
            $request->getLanguage()
        );
        return $response;
    }

    /**
     * Operation getTranslationsWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $language (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\GetTranslationsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTranslationsWithHttpInfo($api_key, $language)
    {
        $returnType = '\Call\Recorder\Client\Model\GetTranslationsResponse';
        $request = $this->getTranslationsRequest($api_key, $language);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\GetTranslationsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTranslationsAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $language (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTranslationsAsync($api_key, $language)
    {
        return $this->getTranslationsAsyncWithHttpInfo($api_key, $language)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTranslationsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $language (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTranslationsAsyncWithHttpInfo($api_key, $language)
    {
        $returnType = '\Call\Recorder\Client\Model\GetTranslationsResponse';
        $request = $this->getTranslationsRequest($api_key, $language);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTranslations'
     *
     * @param  string $api_key (required)
     * @param  string $language (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTranslationsRequest($api_key, $language)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'language' is set
        if ($language === null || (is_array($language) && count($language) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $language when calling '
            );
        }

        $resourcePath = '/rapi/get_translations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($language !== null) {
            $formParams['language'] = ObjectSerializer::toFormValue($language);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation notifyUserCustom
     *
     * @param  string $api_key api_key (required)
     * @param  string $title title (required)
     * @param  string $body body (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\NotifyUserResponse
     */
    public function notifyUserCustom($request)
    {
        list($response) = $this->notifyUserCustomWithHttpInfo(
            $request->getApiKey(), 
            $request->getTitle(), 
            $request->getBody(), 
            $request->getDeviceType()
        );
        return $response;
    }

    /**
     * Operation notifyUserCustomWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $title (required)
     * @param  string $body (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\NotifyUserResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function notifyUserCustomWithHttpInfo($api_key, $title, $body, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\NotifyUserResponse';
        $request = $this->notifyUserCustomRequest($api_key, $title, $body, $device_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\NotifyUserResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation notifyUserCustomAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $title (required)
     * @param  string $body (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notifyUserCustomAsync($api_key, $title, $body, $device_type)
    {
        return $this->notifyUserCustomAsyncWithHttpInfo($api_key, $title, $body, $device_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notifyUserCustomAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $title (required)
     * @param  string $body (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notifyUserCustomAsyncWithHttpInfo($api_key, $title, $body, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\NotifyUserResponse';
        $request = $this->notifyUserCustomRequest($api_key, $title, $body, $device_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'notifyUserCustom'
     *
     * @param  string $api_key (required)
     * @param  string $title (required)
     * @param  string $body (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function notifyUserCustomRequest($api_key, $title, $body, $device_type)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'title' is set
        if ($title === null || (is_array($title) && count($title) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $title when calling '
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling '
            );
        }
        // verify the required parameter 'device_type' is set
        if ($device_type === null || (is_array($device_type) && count($device_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_type when calling '
            );
        }

        $resourcePath = '/rapi/notify_user_custom';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($title !== null) {
            $formParams['title'] = ObjectSerializer::toFormValue($title);
        }
        // form params
        if ($body !== null) {
            $formParams['body'] = ObjectSerializer::toFormValue($body);
        }
        // form params
        if ($device_type !== null) {
            $formParams['device_type'] = ObjectSerializer::toFormValue($device_type);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation recoverFile
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  int $folder_id folder_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\RecoverFileResponse
     */
    public function recoverFile($request)
    {
        list($response) = $this->recoverFileWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getFolderId()
        );
        return $response;
    }

    /**
     * Operation recoverFileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $folder_id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\RecoverFileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function recoverFileWithHttpInfo($api_key, $id, $folder_id)
    {
        $returnType = '\Call\Recorder\Client\Model\RecoverFileResponse';
        $request = $this->recoverFileRequest($api_key, $id, $folder_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\RecoverFileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation recoverFileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $folder_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function recoverFileAsync($api_key, $id, $folder_id)
    {
        return $this->recoverFileAsyncWithHttpInfo($api_key, $id, $folder_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation recoverFileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $folder_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function recoverFileAsyncWithHttpInfo($api_key, $id, $folder_id)
    {
        $returnType = '\Call\Recorder\Client\Model\RecoverFileResponse';
        $request = $this->recoverFileRequest($api_key, $id, $folder_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'recoverFile'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $folder_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function recoverFileRequest($api_key, $id, $folder_id)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'folder_id' is set
        if ($folder_id === null || (is_array($folder_id) && count($folder_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $folder_id when calling '
            );
        }

        $resourcePath = '/rapi/recover_file';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($folder_id !== null) {
            $formParams['folder_id'] = ObjectSerializer::toFormValue($folder_id);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation registerPhone
     *
     * @param  string $token token (required)
     * @param  string $phone phone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\RegisterPhoneResponse
     */
    public function registerPhone($request)
    {
        list($response) = $this->registerPhoneWithHttpInfo(
            $request->getToken(), 
            $request->getPhone()
        );
        return $response;
    }

    /**
     * Operation registerPhoneWithHttpInfo
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\RegisterPhoneResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function registerPhoneWithHttpInfo($token, $phone)
    {
        $returnType = '\Call\Recorder\Client\Model\RegisterPhoneResponse';
        $request = $this->registerPhoneRequest($token, $phone);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\RegisterPhoneResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation registerPhoneAsync
     *
     * 
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function registerPhoneAsync($token, $phone)
    {
        return $this->registerPhoneAsyncWithHttpInfo($token, $phone)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation registerPhoneAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function registerPhoneAsyncWithHttpInfo($token, $phone)
    {
        $returnType = '\Call\Recorder\Client\Model\RegisterPhoneResponse';
        $request = $this->registerPhoneRequest($token, $phone);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'registerPhone'
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function registerPhoneRequest($token, $phone)
    {
        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling '
            );
        }
        // verify the required parameter 'phone' is set
        if ($phone === null || (is_array($phone) && count($phone) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $phone when calling '
            );
        }

        $resourcePath = '/rapi/register_phone';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($token !== null) {
            $formParams['token'] = ObjectSerializer::toFormValue($token);
        }
        // form params
        if ($phone !== null) {
            $formParams['phone'] = ObjectSerializer::toFormValue($phone);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateDeviceToken
     *
     * @param  string $api_key api_key (required)
     * @param  string $device_token device_token (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateDeviceTokenResponse
     */
    public function updateDeviceToken($request)
    {
        list($response) = $this->updateDeviceTokenWithHttpInfo(
            $request->getApiKey(), 
            $request->getDeviceToken(), 
            $request->getDeviceType()
        );
        return $response;
    }

    /**
     * Operation updateDeviceTokenWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $device_token (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateDeviceTokenResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateDeviceTokenWithHttpInfo($api_key, $device_token, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateDeviceTokenResponse';
        $request = $this->updateDeviceTokenRequest($api_key, $device_token, $device_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateDeviceTokenResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateDeviceTokenAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $device_token (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateDeviceTokenAsync($api_key, $device_token, $device_type)
    {
        return $this->updateDeviceTokenAsyncWithHttpInfo($api_key, $device_token, $device_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateDeviceTokenAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $device_token (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateDeviceTokenAsyncWithHttpInfo($api_key, $device_token, $device_type)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateDeviceTokenResponse';
        $request = $this->updateDeviceTokenRequest($api_key, $device_token, $device_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateDeviceToken'
     *
     * @param  string $api_key (required)
     * @param  string $device_token (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateDeviceTokenRequest($api_key, $device_token, $device_type)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'device_token' is set
        if ($device_token === null || (is_array($device_token) && count($device_token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_token when calling '
            );
        }
        // verify the required parameter 'device_type' is set
        if ($device_type === null || (is_array($device_type) && count($device_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_type when calling '
            );
        }

        $resourcePath = '/rapi/update_device_token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($device_token !== null) {
            $formParams['device_token'] = ObjectSerializer::toFormValue($device_token);
        }
        // form params
        if ($device_type !== null) {
            $formParams['device_type'] = ObjectSerializer::toFormValue($device_type);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateFile
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  string $f_name f_name (required)
     * @param  string $l_name l_name (required)
     * @param  string $notes notes (required)
     * @param  string $email email (required)
     * @param  string $phone phone (required)
     * @param  string $tags tags (required)
     * @param  int $folder_id folder_id (required)
     * @param  string $name name (required)
     * @param  string $remind_days remind_days (required)
     * @param  \DateTime $remind_date remind_date (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateFileResponse
     */
    public function updateFile($request)
    {
        list($response) = $this->updateFileWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getFName(), 
            $request->getLName(), 
            $request->getNotes(), 
            $request->getEmail(), 
            $request->getPhone(), 
            $request->getTags(), 
            $request->getFolderId(), 
            $request->getName(), 
            $request->getRemindDays(), 
            $request->getRemindDate()
        );
        return $response;
    }

    /**
     * Operation updateFileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $f_name (required)
     * @param  string $l_name (required)
     * @param  string $notes (required)
     * @param  string $email (required)
     * @param  string $phone (required)
     * @param  string $tags (required)
     * @param  int $folder_id (required)
     * @param  string $name (required)
     * @param  string $remind_days (required)
     * @param  \DateTime $remind_date (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateFileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateFileWithHttpInfo($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateFileResponse';
        $request = $this->updateFileRequest($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateFileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateFileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $f_name (required)
     * @param  string $l_name (required)
     * @param  string $notes (required)
     * @param  string $email (required)
     * @param  string $phone (required)
     * @param  string $tags (required)
     * @param  int $folder_id (required)
     * @param  string $name (required)
     * @param  string $remind_days (required)
     * @param  \DateTime $remind_date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateFileAsync($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)
    {
        return $this->updateFileAsyncWithHttpInfo($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateFileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $f_name (required)
     * @param  string $l_name (required)
     * @param  string $notes (required)
     * @param  string $email (required)
     * @param  string $phone (required)
     * @param  string $tags (required)
     * @param  int $folder_id (required)
     * @param  string $name (required)
     * @param  string $remind_days (required)
     * @param  \DateTime $remind_date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateFileAsyncWithHttpInfo($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateFileResponse';
        $request = $this->updateFileRequest($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateFile'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $f_name (required)
     * @param  string $l_name (required)
     * @param  string $notes (required)
     * @param  string $email (required)
     * @param  string $phone (required)
     * @param  string $tags (required)
     * @param  int $folder_id (required)
     * @param  string $name (required)
     * @param  string $remind_days (required)
     * @param  \DateTime $remind_date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateFileRequest($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'f_name' is set
        if ($f_name === null || (is_array($f_name) && count($f_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $f_name when calling '
            );
        }
        // verify the required parameter 'l_name' is set
        if ($l_name === null || (is_array($l_name) && count($l_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $l_name when calling '
            );
        }
        // verify the required parameter 'notes' is set
        if ($notes === null || (is_array($notes) && count($notes) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notes when calling '
            );
        }
        // verify the required parameter 'email' is set
        if ($email === null || (is_array($email) && count($email) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $email when calling '
            );
        }
        // verify the required parameter 'phone' is set
        if ($phone === null || (is_array($phone) && count($phone) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $phone when calling '
            );
        }
        // verify the required parameter 'tags' is set
        if ($tags === null || (is_array($tags) && count($tags) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tags when calling '
            );
        }
        // verify the required parameter 'folder_id' is set
        if ($folder_id === null || (is_array($folder_id) && count($folder_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $folder_id when calling '
            );
        }
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling '
            );
        }
        // verify the required parameter 'remind_days' is set
        if ($remind_days === null || (is_array($remind_days) && count($remind_days) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $remind_days when calling '
            );
        }
        // verify the required parameter 'remind_date' is set
        if ($remind_date === null || (is_array($remind_date) && count($remind_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $remind_date when calling '
            );
        }

        $resourcePath = '/rapi/update_file';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($f_name !== null) {
            $formParams['f_name'] = ObjectSerializer::toFormValue($f_name);
        }
        // form params
        if ($l_name !== null) {
            $formParams['l_name'] = ObjectSerializer::toFormValue($l_name);
        }
        // form params
        if ($notes !== null) {
            $formParams['notes'] = ObjectSerializer::toFormValue($notes);
        }
        // form params
        if ($email !== null) {
            $formParams['email'] = ObjectSerializer::toFormValue($email);
        }
        // form params
        if ($phone !== null) {
            $formParams['phone'] = ObjectSerializer::toFormValue($phone);
        }
        // form params
        if ($tags !== null) {
            $formParams['tags'] = ObjectSerializer::toFormValue($tags);
        }
        // form params
        if ($folder_id !== null) {
            $formParams['folder_id'] = ObjectSerializer::toFormValue($folder_id);
        }
        // form params
        if ($name !== null) {
            $formParams['name'] = ObjectSerializer::toFormValue($name);
        }
        // form params
        if ($remind_days !== null) {
            $formParams['remind_days'] = ObjectSerializer::toFormValue($remind_days);
        }
        // form params
        if ($remind_date !== null) {
            $formParams['remind_date'] = ObjectSerializer::toFormValue($remind_date);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateFolder
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  string $name name (required)
     * @param  string $pass pass (required)
     * @param  bool $is_private is_private (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateFolderResponse
     */
    public function updateFolder($request)
    {
        list($response) = $this->updateFolderWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getName(), 
            $request->getPass(), 
            $request->getIsPrivate()
        );
        return $response;
    }

    /**
     * Operation updateFolderWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     * @param  bool $is_private (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateFolderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateFolderWithHttpInfo($api_key, $id, $name, $pass, $is_private)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateFolderResponse';
        $request = $this->updateFolderRequest($api_key, $id, $name, $pass, $is_private);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateFolderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateFolderAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     * @param  bool $is_private (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateFolderAsync($api_key, $id, $name, $pass, $is_private)
    {
        return $this->updateFolderAsyncWithHttpInfo($api_key, $id, $name, $pass, $is_private)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateFolderAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     * @param  bool $is_private (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateFolderAsyncWithHttpInfo($api_key, $id, $name, $pass, $is_private)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateFolderResponse';
        $request = $this->updateFolderRequest($api_key, $id, $name, $pass, $is_private);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateFolder'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $name (required)
     * @param  string $pass (required)
     * @param  bool $is_private (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateFolderRequest($api_key, $id, $name, $pass, $is_private)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling '
            );
        }
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling '
            );
        }
        // verify the required parameter 'is_private' is set
        if ($is_private === null || (is_array($is_private) && count($is_private) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $is_private when calling '
            );
        }

        $resourcePath = '/rapi/update_folder';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($name !== null) {
            $formParams['name'] = ObjectSerializer::toFormValue($name);
        }
        // form params
        if ($pass !== null) {
            $formParams['pass'] = ObjectSerializer::toFormValue($pass);
        }
        // form params
        if ($is_private !== null) {
            $formParams['is_private'] = ObjectSerializer::toFormValue($is_private);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateOrder
     *
     * @param  string $api_key api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] $folders folders (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateOrderResponse
     */
    public function updateOrder($request)
    {
        list($response) = $this->updateOrderWithHttpInfo(
            $request->getApiKey(), 
            $request->getFolders()
        );
        return $response;
    }

    /**
     * Operation updateOrderWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] $folders (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateOrderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateOrderWithHttpInfo($api_key, $folders)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateOrderResponse';
        $request = $this->updateOrderRequest($api_key, $folders);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateOrderAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] $folders (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateOrderAsync($api_key, $folders)
    {
        return $this->updateOrderAsyncWithHttpInfo($api_key, $folders)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateOrderAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] $folders (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateOrderAsyncWithHttpInfo($api_key, $folders)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateOrderResponse';
        $request = $this->updateOrderRequest($api_key, $folders);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateOrder'
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] $folders (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateOrderRequest($api_key, $folders)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'folders' is set
        if ($folders === null || (is_array($folders) && count($folders) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $folders when calling '
            );
        }

        $resourcePath = '/rapi/update_order';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($folders !== null) {
            $formParams['folders'] = ObjectSerializer::toFormValue($folders);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateProfileImg
     *
     * @param  string $api_key api_key (required)
     * @param  string $file file (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateProfileImgResponse
     */
    public function updateProfileImg($request)
    {
        list($response) = $this->updateProfileImgWithHttpInfo(
            $request->getApiKey(), 
            $request->getFile()
        );
        return $response;
    }

    /**
     * Operation updateProfileImgWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateProfileImgResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateProfileImgWithHttpInfo($api_key, $file)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateProfileImgResponse';
        $request = $this->updateProfileImgRequest($api_key, $file);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateProfileImgResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateProfileImgAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileImgAsync($api_key, $file)
    {
        return $this->updateProfileImgAsyncWithHttpInfo($api_key, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateProfileImgAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileImgAsyncWithHttpInfo($api_key, $file)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateProfileImgResponse';
        $request = $this->updateProfileImgRequest($api_key, $file);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateProfileImg'
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateProfileImgRequest($api_key, $file)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/upload/update_profile_img';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateProfile
     *
     * @param  string $api_key api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateProfileRequestData $data data (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateProfileResponse
     */
    public function updateProfile($request)
    {
        list($response) = $this->updateProfileWithHttpInfo(
            $request->getApiKey(), 
            $request->getData()
        );
        return $response;
    }

    /**
     * Operation updateProfileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateProfileRequestData $data (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateProfileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateProfileWithHttpInfo($api_key, $data)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateProfileResponse';
        $request = $this->updateProfileRequest($api_key, $data);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateProfileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateProfileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateProfileRequestData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileAsync($api_key, $data)
    {
        return $this->updateProfileAsyncWithHttpInfo($api_key, $data)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateProfileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateProfileRequestData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileAsyncWithHttpInfo($api_key, $data)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateProfileResponse';
        $request = $this->updateProfileRequest($api_key, $data);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateProfile'
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\UpdateProfileRequestData $data (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateProfileRequest($api_key, $data)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'data' is set
        if ($data === null || (is_array($data) && count($data) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data when calling '
            );
        }

        $resourcePath = '/rapi/update_profile';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($data->getFName() !== null) {
            $formParams['data[f_name]'] = ObjectSerializer::toFormValue($data->getFName());
        }
        // form params
        if ($data->getLName() !== null) {
            $formParams['data[l_name]'] = ObjectSerializer::toFormValue($data->getLName());
        }
        // form params
        if ($data->getEmail() !== null) {
            $formParams['data[email]'] = ObjectSerializer::toFormValue($data->getEmail());
        }
        // form params
        if ($data->getIsPublic() !== null) {
            $formParams['data[is_public]'] = ObjectSerializer::toFormValue($data->getIsPublic());
        }
        // form params
        if ($data->getLanguage() !== null) {
            $formParams['data[language]'] = ObjectSerializer::toFormValue($data->getLanguage());
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateSettings
     *
     * @param  string $api_key api_key (required)
     * @param  \Call\Recorder\Client\Model\PlayBeep $play_beep play_beep (required)
     * @param  \Call\Recorder\Client\Model\FilesPermission $files_permission files_permission (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateSettingsResponse
     */
    public function updateSettings($request)
    {
        list($response) = $this->updateSettingsWithHttpInfo(
            $request->getApiKey(), 
            $request->getPlayBeep(), 
            $request->getFilesPermission()
        );
        return $response;
    }

    /**
     * Operation updateSettingsWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\PlayBeep $play_beep (required)
     * @param  \Call\Recorder\Client\Model\FilesPermission $files_permission (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateSettingsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateSettingsWithHttpInfo($api_key, $play_beep, $files_permission)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateSettingsResponse';
        $request = $this->updateSettingsRequest($api_key, $play_beep, $files_permission);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateSettingsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateSettingsAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\PlayBeep $play_beep (required)
     * @param  \Call\Recorder\Client\Model\FilesPermission $files_permission (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateSettingsAsync($api_key, $play_beep, $files_permission)
    {
        return $this->updateSettingsAsyncWithHttpInfo($api_key, $play_beep, $files_permission)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateSettingsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\PlayBeep $play_beep (required)
     * @param  \Call\Recorder\Client\Model\FilesPermission $files_permission (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateSettingsAsyncWithHttpInfo($api_key, $play_beep, $files_permission)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateSettingsResponse';
        $request = $this->updateSettingsRequest($api_key, $play_beep, $files_permission);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateSettings'
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\PlayBeep $play_beep (required)
     * @param  \Call\Recorder\Client\Model\FilesPermission $files_permission (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateSettingsRequest($api_key, $play_beep, $files_permission)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'play_beep' is set
        if ($play_beep === null || (is_array($play_beep) && count($play_beep) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $play_beep when calling '
            );
        }
        // verify the required parameter 'files_permission' is set
        if ($files_permission === null || (is_array($files_permission) && count($files_permission) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $files_permission when calling '
            );
        }

        $resourcePath = '/rapi/update_settings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($play_beep !== null) {
            $formParams['play_beep'] = ObjectSerializer::toFormValue($play_beep);
        }
        // form params
        if ($files_permission !== null) {
            $formParams['files_permission'] = ObjectSerializer::toFormValue($files_permission);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateStar
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  int $star star (required)
     * @param  string $type type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateStarResponse
     */
    public function updateStar($request)
    {
        list($response) = $this->updateStarWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getStar(), 
            $request->getType()
        );
        return $response;
    }

    /**
     * Operation updateStarWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $star (required)
     * @param  string $type (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateStarResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateStarWithHttpInfo($api_key, $id, $star, $type)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateStarResponse';
        $request = $this->updateStarRequest($api_key, $id, $star, $type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateStarResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateStarAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $star (required)
     * @param  string $type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateStarAsync($api_key, $id, $star, $type)
    {
        return $this->updateStarAsyncWithHttpInfo($api_key, $id, $star, $type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateStarAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $star (required)
     * @param  string $type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateStarAsyncWithHttpInfo($api_key, $id, $star, $type)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateStarResponse';
        $request = $this->updateStarRequest($api_key, $id, $star, $type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateStar'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  int $star (required)
     * @param  string $type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateStarRequest($api_key, $id, $star, $type)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'star' is set
        if ($star === null || (is_array($star) && count($star) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $star when calling '
            );
        }
        // verify the required parameter 'type' is set
        if ($type === null || (is_array($type) && count($type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $type when calling '
            );
        }

        $resourcePath = '/rapi/update_star';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($star !== null) {
            $formParams['star'] = ObjectSerializer::toFormValue($star);
        }
        // form params
        if ($type !== null) {
            $formParams['type'] = ObjectSerializer::toFormValue($type);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateUser
     *
     * @param  string $api_key api_key (required)
     * @param  \Call\Recorder\Client\Model\App $app app (required)
     * @param  string $time_zone time_zone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UpdateUserResponse
     */
    public function updateUser($request)
    {
        list($response) = $this->updateUserWithHttpInfo(
            $request->getApiKey(), 
            $request->getApp(), 
            $request->getTimeZone()
        );
        return $response;
    }

    /**
     * Operation updateUserWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $time_zone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UpdateUserResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateUserWithHttpInfo($api_key, $app, $time_zone)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateUserResponse';
        $request = $this->updateUserRequest($api_key, $app, $time_zone);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UpdateUserResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateUserAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateUserAsync($api_key, $app, $time_zone)
    {
        return $this->updateUserAsyncWithHttpInfo($api_key, $app, $time_zone)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateUserAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateUserAsyncWithHttpInfo($api_key, $app, $time_zone)
    {
        $returnType = '\Call\Recorder\Client\Model\UpdateUserResponse';
        $request = $this->updateUserRequest($api_key, $app, $time_zone);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateUser'
     *
     * @param  string $api_key (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateUserRequest($api_key, $app, $time_zone)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'app' is set
        if ($app === null || (is_array($app) && count($app) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app when calling '
            );
        }
        // verify the required parameter 'time_zone' is set
        if ($time_zone === null || (is_array($time_zone) && count($time_zone) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $time_zone when calling '
            );
        }

        $resourcePath = '/rapi/update_user';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($app !== null) {
            $formParams['app'] = ObjectSerializer::toFormValue($app);
        }
        // form params
        if ($time_zone !== null) {
            $formParams['time_zone'] = ObjectSerializer::toFormValue($time_zone);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadMetaFile
     *
     * @param  string $api_key api_key (required)
     * @param  string $file file (required)
     * @param  string $name name (required)
     * @param  int $parent_id parent_id (required)
     * @param  int $id id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\UploadMetaFileResponse
     */
    public function uploadMetaFile($request)
    {
        list($response) = $this->uploadMetaFileWithHttpInfo(
            $request->getApiKey(), 
            $request->getFile(), 
            $request->getName(), 
            $request->getParentId(), 
            $request->getId()
        );
        return $response;
    }

    /**
     * Operation uploadMetaFileWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  string $name (required)
     * @param  int $parent_id (required)
     * @param  int $id (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\UploadMetaFileResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadMetaFileWithHttpInfo($api_key, $file, $name, $parent_id, $id)
    {
        $returnType = '\Call\Recorder\Client\Model\UploadMetaFileResponse';
        $request = $this->uploadMetaFileRequest($api_key, $file, $name, $parent_id, $id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\UploadMetaFileResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation uploadMetaFileAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  string $name (required)
     * @param  int $parent_id (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadMetaFileAsync($api_key, $file, $name, $parent_id, $id)
    {
        return $this->uploadMetaFileAsyncWithHttpInfo($api_key, $file, $name, $parent_id, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadMetaFileAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  string $name (required)
     * @param  int $parent_id (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadMetaFileAsyncWithHttpInfo($api_key, $file, $name, $parent_id, $id)
    {
        $returnType = '\Call\Recorder\Client\Model\UploadMetaFileResponse';
        $request = $this->uploadMetaFileRequest($api_key, $file, $name, $parent_id, $id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadMetaFile'
     *
     * @param  string $api_key (required)
     * @param  string $file (required)
     * @param  string $name (required)
     * @param  int $parent_id (required)
     * @param  int $id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function uploadMetaFileRequest($api_key, $file, $name, $parent_id, $id)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling '
            );
        }
        // verify the required parameter 'parent_id' is set
        if ($parent_id === null || (is_array($parent_id) && count($parent_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $parent_id when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }

        $resourcePath = '/rapi/upload_meta_file';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($name !== null) {
            $formParams['name'] = ObjectSerializer::toFormValue($name);
        }
        // form params
        if ($parent_id !== null) {
            $formParams['parent_id'] = ObjectSerializer::toFormValue($parent_id);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation verifyFolderPass
     *
     * @param  string $api_key api_key (required)
     * @param  int $id id (required)
     * @param  string $pass pass (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\VerifyFolderPassResponse
     */
    public function verifyFolderPass($request)
    {
        list($response) = $this->verifyFolderPassWithHttpInfo(
            $request->getApiKey(), 
            $request->getId(), 
            $request->getPass()
        );
        return $response;
    }

    /**
     * Operation verifyFolderPassWithHttpInfo
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $pass (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\VerifyFolderPassResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function verifyFolderPassWithHttpInfo($api_key, $id, $pass)
    {
        $returnType = '\Call\Recorder\Client\Model\VerifyFolderPassResponse';
        $request = $this->verifyFolderPassRequest($api_key, $id, $pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\VerifyFolderPassResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation verifyFolderPassAsync
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function verifyFolderPassAsync($api_key, $id, $pass)
    {
        return $this->verifyFolderPassAsyncWithHttpInfo($api_key, $id, $pass)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation verifyFolderPassAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function verifyFolderPassAsyncWithHttpInfo($api_key, $id, $pass)
    {
        $returnType = '\Call\Recorder\Client\Model\VerifyFolderPassResponse';
        $request = $this->verifyFolderPassRequest($api_key, $id, $pass);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'verifyFolderPass'
     *
     * @param  string $api_key (required)
     * @param  int $id (required)
     * @param  string $pass (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function verifyFolderPassRequest($api_key, $id, $pass)
    {
        // verify the required parameter 'api_key' is set
        if ($api_key === null || (is_array($api_key) && count($api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling '
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling '
            );
        }

        $resourcePath = '/rapi/verify_folder_pass';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($id !== null) {
            $formParams['id'] = ObjectSerializer::toFormValue($id);
        }
        // form params
        if ($pass !== null) {
            $formParams['pass'] = ObjectSerializer::toFormValue($pass);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation verifyPhone
     *
     * @param  string $token token (required)
     * @param  string $phone phone (required)
     * @param  string $code code (required)
     * @param  string $mcc mcc (required)
     * @param  \Call\Recorder\Client\Model\App $app app (required)
     * @param  string $device_token device_token (required)
     * @param  string $device_id device_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type device_type (required)
     * @param  string $time_zone time_zone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Call\Recorder\Client\Model\VerifyPhoneResponse
     */
    public function verifyPhone($request)
    {
        list($response) = $this->verifyPhoneWithHttpInfo(
            $request->getToken(), 
            $request->getPhone(), 
            $request->getCode(), 
            $request->getMcc(), 
            $request->getApp(), 
            $request->getDeviceToken(), 
            $request->getDeviceId(), 
            $request->getDeviceType(), 
            $request->getTimeZone()
        );
        return $response;
    }

    /**
     * Operation verifyPhoneWithHttpInfo
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     * @param  string $code (required)
     * @param  string $mcc (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $device_token (required)
     * @param  string $device_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     * @param  string $time_zone (required)
     *
     * @throws \Call\Recorder\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Call\Recorder\Client\Model\VerifyPhoneResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function verifyPhoneWithHttpInfo($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)
    {
        $returnType = '\Call\Recorder\Client\Model\VerifyPhoneResponse';
        $request = $this->verifyPhoneRequest($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Call\Recorder\Client\Model\VerifyPhoneResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation verifyPhoneAsync
     *
     * 
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     * @param  string $code (required)
     * @param  string $mcc (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $device_token (required)
     * @param  string $device_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function verifyPhoneAsync($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)
    {
        return $this->verifyPhoneAsyncWithHttpInfo($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation verifyPhoneAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     * @param  string $code (required)
     * @param  string $mcc (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $device_token (required)
     * @param  string $device_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function verifyPhoneAsyncWithHttpInfo($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)
    {
        $returnType = '\Call\Recorder\Client\Model\VerifyPhoneResponse';
        $request = $this->verifyPhoneRequest($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'verifyPhone'
     *
     * @param  string $token (required)
     * @param  string $phone (required)
     * @param  string $code (required)
     * @param  string $mcc (required)
     * @param  \Call\Recorder\Client\Model\App $app (required)
     * @param  string $device_token (required)
     * @param  string $device_id (required)
     * @param  \Call\Recorder\Client\Model\DeviceType $device_type (required)
     * @param  string $time_zone (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function verifyPhoneRequest($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)
    {
        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling '
            );
        }
        // verify the required parameter 'phone' is set
        if ($phone === null || (is_array($phone) && count($phone) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $phone when calling '
            );
        }
        // verify the required parameter 'code' is set
        if ($code === null || (is_array($code) && count($code) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $code when calling '
            );
        }
        // verify the required parameter 'mcc' is set
        if ($mcc === null || (is_array($mcc) && count($mcc) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mcc when calling '
            );
        }
        // verify the required parameter 'app' is set
        if ($app === null || (is_array($app) && count($app) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app when calling '
            );
        }
        // verify the required parameter 'device_token' is set
        if ($device_token === null || (is_array($device_token) && count($device_token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_token when calling '
            );
        }
        // verify the required parameter 'device_id' is set
        if ($device_id === null || (is_array($device_id) && count($device_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_id when calling '
            );
        }
        // verify the required parameter 'device_type' is set
        if ($device_type === null || (is_array($device_type) && count($device_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $device_type when calling '
            );
        }
        // verify the required parameter 'time_zone' is set
        if ($time_zone === null || (is_array($time_zone) && count($time_zone) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $time_zone when calling '
            );
        }

        $resourcePath = '/rapi/verify_phone';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($token !== null) {
            $formParams['token'] = ObjectSerializer::toFormValue($token);
        }
        // form params
        if ($phone !== null) {
            $formParams['phone'] = ObjectSerializer::toFormValue($phone);
        }
        // form params
        if ($code !== null) {
            $formParams['code'] = ObjectSerializer::toFormValue($code);
        }
        // form params
        if ($mcc !== null) {
            $formParams['mcc'] = ObjectSerializer::toFormValue($mcc);
        }
        // form params
        if ($app !== null) {
            $formParams['app'] = ObjectSerializer::toFormValue($app);
        }
        // form params
        if ($device_token !== null) {
            $formParams['device_token'] = ObjectSerializer::toFormValue($device_token);
        }
        // form params
        if ($device_id !== null) {
            $formParams['device_id'] = ObjectSerializer::toFormValue($device_id);
        }
        // form params
        if ($device_type !== null) {
            $formParams['device_type'] = ObjectSerializer::toFormValue($device_type);
        }
        // form params
        if ($time_zone !== null) {
            $formParams['time_zone'] = ObjectSerializer::toFormValue($time_zone);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
