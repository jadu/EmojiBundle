<?php

namespace HeyUpdate\EmojiBundle\Twig\Extension;

use HeyUpdate\Emoji\Emoji;

class EmojiExtension extends \Twig_Extension
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
            new \Twig_SimpleFunction('emoji', [$this->emoji, 'replaceEmojiWithImages'], [
                'is_safe' => ['html'],
            ]),
            new \Twig_SimpleFunction('emoji_name_image', [$this->emoji, 'getEmojiImageByName'], [
                'is_safe' => ['html'],
            ]),
            new \Twig_SimpleFunction('emoji_unicode_image', [$this->emoji, 'getEmojiImageByUnicode'], [
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
            new \Twig_SimpleFilter('emoji', [$this->emoji, 'replaceEmojiWithImages'], [
                'is_safe' => ['html'],
            ]),
            new \Twig_SimpleFilter('emoji_name_image', [$this->emoji, 'getEmojiImageByName'], [
                'is_safe' => ['html'],
            ]),
            new \Twig_SimpleFilter('emoji_unicode_image', [$this->emoji, 'getEmojiImageByUnicode'], [
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
