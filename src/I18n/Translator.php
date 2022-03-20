<?php

declare(strict_types=1);

namespace Mailery\I18n;

use Yiisoft\I18n\Locale;
use Yiisoft\I18n\MessageReaderInterface;
use Yiisoft\I18n\TranslatorInterface;
use Yiisoft\I18n\MessageFormatterInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Mailery\I18n\Event\MissingTranslationEvent;

class Translator implements TranslatorInterface
{
    /**
     * @var string|null
     */
    private ?string $locale = null;

    /**
     * @var string|null
     */
    private ?string $defaultLocale = null;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param MessageReaderInterface $messageReader
     * @param MessageFormatterInterface $messageFormatter
     */
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private MessageReaderInterface $messageReader,
        private MessageFormatterInterface $messageFormatter = null
    ) {}

    /**
     * Sets the current locale.
     *
     * @param string $locale The locale
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * Returns the current locale.
     *
     * @return string The locale
     */
    public function getLocale(): string
    {
        return $this->locale ?? $this->getDefaultLocale();
    }

    public function setDefaultLocale(string $locale): void
    {
        $this->defaultLocale = $locale;
    }

    public function translate(
        string $id,
        array $parameters = [],
        string $category = null,
        string $localeString = null
    ): ?string {
        if ($localeString === null) {
            $localeString = $this->getLocale();
        }

        if ($category === null) {
            $category = $this->getDefaultCategory();
        }

        $message = $this->messageReader->one($id, $localeString . '/' . $category);
        if ($message === null) {
            $missingTranslation = new MissingTranslationEvent($category, $localeString, $id);
            $this->eventDispatcher->dispatch($missingTranslation);

            $locale = new Locale($localeString);
            $fallback = $locale->fallbackLocale();

            if ($fallback->asString() !== $locale->asString()) {
                return $this->translate($id, $parameters, $category, $fallback->asString());
            }

            $defaultFallback = (new Locale($this->getDefaultLocale()))->fallbackLocale();

            if ($defaultFallback->asString() !== $fallback->asString()) {
                return $this->translate($id, $parameters, $category, $this->getDefaultLocale());
            }

            $message = $id;
        }

        if ($this->messageFormatter === null) {
            return $message;
        }

        return $this->messageFormatter->format($message, $parameters, $localeString);
    }

    protected function getDefaultCategory(): string
    {
        return 'default';
    }

    protected function getDefaultLocale(): string
    {
        return $this->defaultLocale ?? 'en';
    }
}
