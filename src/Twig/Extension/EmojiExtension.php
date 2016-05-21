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
            new \Twig_SimpleFunction('emoji', [$this, 'emoji'], [
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
            new \Twig_SimpleFilter('emoji', [$this, 'emoji'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function emoji($string)
    {
        return $this->emoji->replaceEmojiWithImages($string);
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
