<?php

namespace App\DigitalOcean\Behaviors;

use App\DigitalOcean\Enums\Resources;

trait BuildsRestParams
{
    /**
     * Resource to request.
     *
     * @var string
     */
    protected $url = ':resource/:id/:subResource/:subId';

    /**
     * Method to utilize in the request.
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * Additional headers to pass to the request.
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Body to send with the request.
     *
     * @var mixed
     */
    protected $body = null;

    /**
     * Indicates the resource the request is for
     *
     * @var string
     */
    protected $resource = '';

    /**
     * Indicates the resource the request is for
     *
     * @var string
     */
    protected $id = '';

    /**
     * Indicates the resource the request is for
     *
     * @var string
     */
    protected $subResource = '';

    /**
     * Indicates the resource the request is for
     *
     * @var string
     */
    protected $subId = '';
    /**
     * Build the request to delete a resource.
     *
     * @param mixed  $id
     * @return $this
     */
    public function destroy($id)
    {
        return $this->setId($id)->setMethod('DELETE');
    }

    /**
     * Build the request to update the requested resource.
     *
     * @return $this
     */
    public function update($id, $body = null)
    {
        return $this->setId($id)->setMethod('PUT')->setBody($body);
    }

    /**
     * Set the resource on the instance.
     *
     * @param string  $resource
     * @return $this
     */
    protected function setResource(string $resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Set (or unset) the request body.
     *
     * @return $this
     */
    public function setBody($body = null)
    {
        if (is_null($body)) {
            $this->setHeader('Content-Type', null);
        } else {
            $this->setHeader('Content-Type', 'application/json');
            $this->body = $body;
        }

        return $this;
    }

    /**
     * Set (or unset) a request header.
     *
     * @param string  $header
     * @param mixed  $content
     * @return $this
     */
    public function setHeader($header, $content = null)
    {
        if (is_null($content)) {
            if (isset($this->headers[$header])) {
                unset($this->headers[$header]);
            }
        } else {
            $this->headers[$header] = $content;
        }
    }

    /**
     * Create the URL using the template request URI scheme.
     *
     * @return string
     */
    public function getUrl()
    {
        $self = $this;

        return collect(explode('/', $this->url))
            ->map(function ($value) use ($self) {
                return $self->{str_after($value, ':')};
            })
            ->filter()
            ->implode('/');
    }

    /**
     * Get the request body.
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the request headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return array_merge($this->headers, [
            'Authorization' => "Bearer {$this->token->content}",
        ]);
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return strtoupper($this->method);
    }

    /**
     * Build the request to list a resource.
     *
     * @return $this
     */
    public function list($query = [])
    {
        if ($query) {
            $this->url .= '?' . http_build_query($query);
        }

        return $this;
    }

    /**
     * Build the request to show a resource.
     *
     * @return $this
     */
    public function show($id)
    {
        return $this->setId($id);
    }

    /**
     * Set the ID of the resource.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the sub-resource of the request.
     *
     * @return $this
     */
    public function setSubResource($subResource)
    {
        $this->subResource = $subResource;

        return $this;
    }

    /**
     * Set the ID of the sub-resource of the request.
     *
     * @return $this
     */
    public function setSubId($subId)
    {
        $this->subId = $subId;

        return $this;
    }

    /**
     * Build the request to create a resource.
     *
     * @return $this
     */
    public function create($body = null)
    {
        return $this->setMethod('POST')->setBody($body);
    }

    /**
     * Set the request method to use in the request.
     *
     * @param string  $method
     * @return $this
     */
    public function setMethod($method = 'GET')
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the pattern used to determine if the request is for a resource.
     *
     * @return string
     */
    protected function getResourcesRegex()
    {
        return '/' . implode('|', Resources::RESOURCES) . '/';
    }
}
