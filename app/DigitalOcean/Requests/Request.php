<?php

namespace App\DigitalOcean\Requests;

use GuzzleHttp\Psr7\Request as BaseRequest;
use App\Token;

abstract class Request extends BaseRequest
{
    /**
     * Merge in the required `Authorization` header with the request headers.
     *
     * @param \App\Token  $token
     * @param array  $headers
     * @return array
     */
    protected function createRequestHeaders(Token $token, $headers = [])
    {
        $headers['Content-Type'] = 'application/json';

        return array_merge($headers, [
            'Authorization' => "Bearer {$token->content}",
        ]);
    }

    /**
     * Create the request body by parsing it into JSON.
     *
     * @param mixed  $body
     * @return string
     */
    protected function createRequestBody($body)
    {
        return json_encode($body);
    }
}
