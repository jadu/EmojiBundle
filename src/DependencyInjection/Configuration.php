<?php

namespace HeyUpdate\EmojiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('hey_update_emoji');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('image_html_template')
                    ->defaultValue('<img alt=":{{name}}:" class="emoji" src="https://twemoji.maxcdn.com/36x36/{{unicode}}.png">')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
