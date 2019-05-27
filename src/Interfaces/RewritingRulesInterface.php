<?php
declare(strict_types=1);

namespace Azonmedia\UrlRewriting\Interfaces;

use Psr\Http\Message\RequestInterface;

interface RewritingRulesInterface
{

    /**
     * Returns a URI with rewritign rules applied. If no rules are applied the same URI is returned.
     * @param string $uri
     * @return string
     */
    public function rewrite_uri(string $uri) : string;

    /**
     * Returns a Request with rewritign rules applied on its URI. If no rules are applied the a Request with the same URI is returned.
     * @param RequestInterface $Request
     * @return RequestInterface
     */
    public function rewrite_request(RequestInterface $Request) : RequestInterface;
}