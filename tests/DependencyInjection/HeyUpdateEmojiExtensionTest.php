<?php

namespace HeyUpdate\EmojiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class HeyUpdateEmojiExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testRegistersEmojiService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, []);

        $this->assertHasService($container, 'emoji');
    }

    public function testRegistersEmojiIndexService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, []);

        $this->assertHasService($container, 'emoji.index');
    }

    public function testRegistersEmojiTwigExtensionService()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, []);

        $this->assertHasService($container, 'emoji.twig.extension');
    }

    public function testUsesDefaultImageHtmlTemplate()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, []);

        $this->assertTrue($container->hasParameter('emoji.image_html_template'));
    }

    public function testCanSetImageHtmlTemplate()
    {
        $container = $this->createContainer();
        $this->loadConfig($container, [
            'image_html_template' => '<img src="http://emoji.com/{{unicode}}.png">',
        ]);

        $emoji = $container->get('emoji');
        $this->assertSame('<img src="http://emoji.com/{{unicode}}.png">', $emoji->getImageHtmlTemplate());
    }

    private function assertHasService(ContainerBuilder $container, $id)
    {
        $this->assertTrue($container->hasDefinition($id) || $container->hasAlias($id), sprintf('The service %s should be defined.', $id));
    }

    private function assertNotHasService(ContainerBuilder $container, $id)
    {
        $this->assertFalse($container->hasDefinition($id) || $container->hasAlias($id), sprintf('The service %s should not be defined.', $id));
    }

    private function loadConfig(ContainerBuilder $container, array $config = [])
    {
        $extension = new HeyUpdateEmojiExtension();

        $extension->load([$config], $container);
    }

    private function createContainer($debug = true)
    {
        $container = new ContainerBuilder();
        $container->setParameter('kernel.debug', $debug);

        return $container;
    }
}
