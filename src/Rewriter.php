<?php


namespace Azonmedia\Urlrewriting;


use Azonmedia\UrlRewriting\Interfaces\RewriterInterface;
use Azonmedia\UrlRewriting\Interfaces\RewritingRulesInterface;
use Psr\Http\Message\RequestInterface;

class Rewriter
implements RewriterInterface
{

    /**
     * @var array of RewritingRulesInterface
     */
    protected $rewriting_rules = [];

    /**
     * Rewriter constructor.
     * @param RewritingRulesInterface $RewritingRule
     */
    public function __construct(RewritingRulesInterface $RewritingRules)
    {
        $this->add_rewriting_rule($RewritingRules);
    }

    /**
     * Adds a RewritingRules instance to be used when rewriting requests.
     * @param RewritingRulesInterface $RewritingRule
     * @return bool
     */
    public function add_rewriting_rule(RewritingRulesInterface $RewritingRules) : bool
    {
        $ret = FALSE;
        foreach ($this->rewriting_rules as $RegisteredRewritingRules) {
            if (get_class($RegisteredRewritingRules) === get_class($RewritingRules)) {
                return $ret;
            }
        }
        $this->rewriting_rules[] = $RewritingRules;
        return $ret;
    }

    /**
     * {@inheritDoc}
     * @param string $uri
     * @return string
     */
    public function rewrite_uri(string $uri) : string
    {
        //if there are more than one rewriting ruleset each will contoinue working on the resut of the previous one
        foreach ($this->rewriting_rules as $RewritingRules) {
            $uri = $RewritingRules->rewrite_uri($uri);
        }
        return $ret;
    }

    /**
     * {@inheritDoc}
     * @param RequestInterface $Request
     * @return RequestInterface
     */
    public function rewrite_request(RequestInterface $Request) : RequestInterface
    {
        foreach ($this->rewriting_rules as $RewritingRules) {
            $Request = $RewritingRules->rewrite_request($Request);
        }
        return $Request;
    }
}