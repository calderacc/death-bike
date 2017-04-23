<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Entity\User;
use AppBundle\HtmlMetadata\Metadata;
use AppBundle\Parser\ParserInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;

class SiteTwigExtension extends \Twig_Extension
{
    /** @var TranslatorInterface $translator */
    protected $translator;

    /** @var ParserInterface $parser */
    protected $parser;

    /** @var Metadata $metadata */
    protected $metadata;

    /** @var RouterInterface $router */
    protected $router;

    public function __construct(
        TranslatorInterface $translator,
        ParserInterface $parser,
        Metadata $metadata,
        RouterInterface $router
    )
    {
        $this->translator = $translator;
        $this->parser = $parser;
        $this->metadata = $metadata;
        $this->router = $router;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('hashtagToCity', [$this, 'hashtagToCity'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFilter('parse', [$this, 'parse'], array(
                'is_safe' => array('html')
            ))
        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('metadata', [$this, 'getMetadataService',], array(
                'is_safe' => array('raw')
            )),
            new \Twig_SimpleFunction('gravatarHash', [$this, 'gravatarHash'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('gravatarUrl', [$this, 'gravatarUrl'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('daysSince', [$this, 'daysSince'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('twitterUsername', [$this, 'twitterUsername'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('facebookIdentifier', [$this, 'facebookIdentifier'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('hostname', [$this, 'hostname'], array(
                'is_safe' => array('html')
            )),
            new \Twig_SimpleFunction('today', [$this, 'today'], array(
                'is_safe' => array('html')
            ))
        ];
    }

    public function getTests()
    {
        return [
            'instanceof' => new \Twig_SimpleFunction('isInstanceof', [$this, 'isInstanceof']),
            'today' => new \Twig_SimpleFunction('today', [$this, 'today'])
        ];
    }

    public function gravatarHash(User $user = null)
    {
        if (!$user) {
            return 'avatar';
        }

        return md5($user->getEmail());
    }

    public function gravatarUrl(User $user = null, $size = 64)
    {
        return 'https://www.gravatar.com/avatar/' . $this->gravatarHash($user) . '?s=' . $size;
    }

    public function daysSince($dateTimeString)
    {
        $dateTime = new \DateTime($dateTimeString);
        $now = new \DateTime();

        $diffSeconds = $now->getTimestamp() - $dateTime->getTimestamp();

        $diffDays = floor($diffSeconds / (60 * 60 * 24));

        return $diffDays;
    }

    public function isInstanceof($var, $instance)
    {
        return $var instanceof $instance;
    }

    public function today(\DateTime $dateTime)
    {
        $today = new \DateTime();

        return ($today->format('Y-m-d') == $dateTime->format('Y-m-d'));
    }

    public function getMetadataService()
    {
        return $this->metadata;
    }

    public function twitterUsername($twitterUrl)
    {
        $parsedParts = parse_url($twitterUrl);

        $username = $parsedParts['path'];

        $username = str_replace('/', '', $username);

        $username = '@' . $username;

        return $username;
    }

    public function facebookIdentifier($facebookUrl)
    {
        $parsedParts = parse_url($facebookUrl);

        $identifier = $parsedParts['path'];

        $identifier = str_replace('/', '', $identifier);

        return $identifier;
    }

    public function hostname($url)
    {
        $parsedParts = parse_url($url);

        $hostname = $parsedParts['host'];

        $hostname = str_replace('www.', '', $hostname);

        return $hostname;
    }

    public function hashtagToCity($string)
    {
        preg_match_all('/#([a-zA-Z0-9]*)/', $string, $result);

        foreach ($result[0] as $hashtag) {
            $lcHashtag = strtolower($hashtag);

            $citySlug = substr($lcHashtag, 1, strlen($hashtag) - 1);

            $path = $this->router->generate('caldera_criticalmass_desktop_city_show', ['citySlug' => $citySlug]);

            $link = '<a href="' . $path . '">' . $hashtag . '</a>';

            $string = str_replace($hashtag, $link, $string);
        }

        return $string;
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

