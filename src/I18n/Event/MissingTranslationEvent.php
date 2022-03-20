<?php

declare(strict_types=1);

namespace Mailery\I18n\Event;

class MissingTranslationEvent
{
    public function __construct(
        private string $category,
        private string $language,
        private string $message
    ) {}

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}