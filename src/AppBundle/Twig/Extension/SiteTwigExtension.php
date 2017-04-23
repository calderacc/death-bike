<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Parser\ParserInterface;

class SiteTwigExtension extends \Twig_Extension
{
    /** @var ParserInterface $parser */
    protected $parser;

    public function __construct(
        ParserInterface $parser
    )
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('parse', [$this, 'parse'], array(
                'is_safe' => array('html')
            ))
        ];
    }

    public function parse(string $text): string
    {
        return $this->parser->parse($text);
    }

    public function getName()
    {
        return 'site_extension';
    }
}

