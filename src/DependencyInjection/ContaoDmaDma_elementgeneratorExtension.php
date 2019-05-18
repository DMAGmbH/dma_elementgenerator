<?php
declare (strict_types = 1);
namespace Dma\Dma_elementgenerator\DependencyInjection;



/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
**/

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
//use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * Adds the bundle services to the container.
 */
class ContaoDmaDma_elementgeneratorExtension extends Extension //implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        if (file_exists(__DIR__ . '/../Resources/config/config.yml')) {
            $loader->load('config.yml');
        }
        if (file_exists(__DIR__ . '/../Resources/config/listener.yml')) {
            $loader->load('listener.yml');
        }
        if (file_exists(__DIR__ . '/../Resources/config/services.yml')) {
            $loader->load('services.yml');
        }
        if (file_exists(__DIR__ . '/../Resources/config/commands.yml')) {
            $loader->load('commands.yml');
        }
    }

    public function getConfigTreeBuilder()
    { }
}
