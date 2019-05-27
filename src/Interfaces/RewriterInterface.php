<?php

namespace Azonmedia\UrlRewriting\Interfaces;

use Psr\Http\Message\RequestInterface;

interface RewriterInterface
{

    /**
     * Walks through all registered RewritingRules in the order they were added and passes the provided URI thorugh each of them.
     * Retruns URI after all rules were applied.
     * @param string $uri
     * @return string
     */
    public function rewrite_uri(string $uri) : string;

    /**
     * Walks through all registered RewritingRules in the order they were added and passes the provided Request thorugh each of them.
     * Retruns a new Request after all rules were applied.
     * @param RequestInterface $Request
     * @return RequestInterface
     */
    public function rewrite_request(RequestInterface $Request) : RequestInterface;
}