<?php
namespace Dma\Elementgenerator\ContaoManager;

/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
 **/
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Dma\Elementgenerator\ContaoDmaElementgeneratorBundle;
use Contao\CoreBundle\ContaoCoreBundle;

// use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
// use Symfony\Component\Config\Loader\LoaderResolverInterface;
// use Symfony\Component\HttpKernel\KernelInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [BundleConfig::create(ContaoDmaelementgeneratorBundle::class)
            ->setLoadAfter([ContaoCoreBundle::class])];
    }
}
