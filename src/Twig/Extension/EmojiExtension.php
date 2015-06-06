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
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            'emoji'  => new \Twig_Function_Method($this, 'emoji', array(
                'is_safe' => array('html')
            ))
        );
    }

    public function getFilters()
    {
        return array(
            'emoji' => new \Twig_Filter_Method($this, 'emoji', array(
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
