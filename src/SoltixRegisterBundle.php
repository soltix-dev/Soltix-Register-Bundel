<?php

/**
 * Initial RegisterBundle class
 *
 * @author  Soltix <soltix@soltix.pl>
 * @license proprietary // @cs-ignore
 */

declare(strict_types=1);

namespace Soltix\Bundle\Register;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SoltixRegisterBundle extends AbstractBundle
{


    /**
     * Import extension
     *
     * @param DefinitionConfigurator $definition Bundle Configurator
     *
     * @return void
     */
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition
            ->import('DependencyInjection/RegisterBundleExtension.php');

    }//end configure()


}//end class
