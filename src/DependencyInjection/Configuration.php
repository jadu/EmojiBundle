<?php

namespace HeyUpdate\EmojiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('emoji');

        $rootNode
            ->children()
                ->scalarNode('asset_url_format')->defaultValue('https://twemoji.maxcdn.com/36x36/%s.png')->end()
            ->end();

        return $treeBuilder;
    }
}