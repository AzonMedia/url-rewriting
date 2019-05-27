<?php
declare(strict_types=1);

namespace Azonmedia\UrlRewriting;

use Azonmedia\UrlRewriting\Interfaces\RewritingRulesInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class RewritingRulesArray
 * A simple rewriting implementation based on the provided array to the constructor.
 * @package Azonmedia\UrlRewriting
 */
class RewritingRulesArray
implements RewritingRulesInterface
{

    protected $rewriting_map = [];

    public function __construct(array $rewriting_map)
    {
        $this->rewriting_map = $rewriting_map;
    }

    /**
     * {@inheritDoc}
     * @param string $uri
     * @return string
     */
    public function rewrite_uri(string $uri) : string
    {
        //dummy implementation
        return $uri;
    }

    /**
     * {@inheritDoc}
     * @param RequestInterface $Request
     * @return RequestInterface
     */
    public function rewrite_request(RequestInterface $Request) : RequestInterface
    {
        $new_uri = $this->rewrite_uri($Request->getUri());
        $Uri = $Request->getUri();
        //replace the parts of the Uri here with the with...() methods
        $Request = $Request->withUri($Uri);
        return $Request;
    }
}