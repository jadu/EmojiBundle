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
        return array(
            new \Twig_SimpleFunction('emoji', array($this, 'emoji'), array(
                'is_safe' => array('html')
            ))
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('emoji', array($this, 'emoji'), array(
                'is_safe' => array('html')
            ))
        );
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
