<?php

namespace HeyUpdate\EmojiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class HeyUpdateEmojiExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testRegistersEmojiService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, array());

        $this->assertHasService($container, 'emoji');
    }

    public function testRegistersEmojiIndexService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, array());

        $this->assertHasService($container, 'emoji.index');
    }

    public function testRegistersEmojiTwigExtensionService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, array());

        $this->assertHasService($container, 'emoji.twig.extension');
    }

    public function testUsesDefaultAssetUrlFormat()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, array());

        $this->assertTrue($container->hasParameter('emoji.asset_url_format'));
    }

    public function testCanSetAssetUrlFormat()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, array(
            'asset_url_format' => 'http://emoji.com/%s.png'
        ));

        $emoji = $container->get('emoji');
        $this->assertEquals('http://emoji.com/%s.png', $emoji->getAssetUrlFormat());
    }

    private function assertHasService(ContainerBuilder $container, $id)
    {
        $this->assertTrue($container->hasDefinition($id) || $container->hasAlias($id), sprintf('The service %s should be defined.', $id));
    }

    private function assertNotHasService(ContainerBuilder $container, $id)
    {
        $this->assertFalse($container->hasDefinition($id) || $container->hasAlias($id), sprintf('The service %s should not be defined.', $id));
    }

    private function loadConfig(ContainerBuilder $container, array $config = array())
    {
        $extension = new HeyUpdateEmojiExtension();

        $extension->load(array($config), $container);
    }

    private function createContainer($debug = true)
    {
        $container = new ContainerBuilder();
        $container->setParameter('kernel.debug', $debug);

        return $container;
    }
}
