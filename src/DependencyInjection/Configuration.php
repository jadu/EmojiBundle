<?php

namespace Jadu\EmojiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('jadu_emoji');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('image_html_template')
                    ->defaultValue('<img alt=":{{name}}:" class="emoji" src="https://cdn.jsdelivr.net/gh/jdecked/twemoji/assets/svg/{{unicode}}.svg">')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
