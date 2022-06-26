<?php

/**
 * Config Extension
 *
 * @author  Soltix <soltix@soltix.pl>
 * @license proprietary // @cs-ignore
 */

declare(strict_types=1);

namespace Soltix\Bundle\Register\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class RegisterBundleExtension extends Extension
{


    /**
     * Load yaml configs
     *
     * @param array            $configs   Configs
     * @param ContainerBuilder $container Symfony container builder
     *
     * @return void
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        // Define dirs.
        $configDir   = new FileLocator(dirname(__DIR__).'/../../config');
        $packagesDir = new FileLocator(dirname(__DIR__).'/../../packages');

        // Apply config schema to the app config.
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        // Load the bundle's service declarations.
        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');
        $loader->load('routes.yaml');

        // Load the bundle's packages declarations.
        $loader = new YamlFileLoader($container, $packagesDir);
        $loader->load('soltix_register.yaml');

    }//end load()


}//end class
