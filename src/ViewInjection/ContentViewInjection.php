<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Form\Widget\Field;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Yii\View\ContentParametersInjectionInterface;

class ContentViewInjection implements ContentParametersInjectionInterface
{
    /**
     * @var UrlMatcherInterface
     */
    private UrlMatcherInterface $urlMatcher;

    /**
     * @var UrlGeneratorInterface
     */
    private UrlGeneratorInterface $url;

    /**
     * @var Field
     */
    private Field $field;

    /**
     * @param UrlMatcherInterface $urlMatcher
     * @param UrlGeneratorInterface $url
     * @param Field $field
     */
    public function __construct(
        UrlMatcherInterface $urlMatcher,
        UrlGeneratorInterface $url,
        Field $field
    ) {
        $this->urlMatcher = $urlMatcher;
        $this->url = $url;
        $this->field = $field;
    }

    /**
     * @return array
     */
    public function getContentParameters(): array
    {
        return [
            'field' => $this->field,
            'url' => $this->url,
            'urlMatcher' => $this->urlMatcher,
        ];
    }
}
