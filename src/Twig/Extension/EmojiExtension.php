<?php

namespace Jadu\EmojiBundle\Twig\Extension;

use Jadu\Emoji\Emoji;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class EmojiExtension extends AbstractExtension
{
    protected $emoji;

    public function __construct(Emoji $emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('emoji', [$this->emoji, 'replaceEmojiWithImages'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('emoji_name_image', [$this->emoji, 'getEmojiImageByName'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('emoji_unicode_image', [$this->emoji, 'getEmojiImageByUnicode'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new TwigFilter('emoji', [$this->emoji, 'replaceEmojiWithImages'], [
                'is_safe' => ['html'],
            ]),
            new TwigFilter('emoji_name_image', [$this->emoji, 'getEmojiImageByName'], [
                'is_safe' => ['html'],
            ]),
            new TwigFilter('emoji_unicode_image', [$this->emoji, 'getEmojiImageByUnicode'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'emoji';
    }
}
