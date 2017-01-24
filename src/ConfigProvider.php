<?php
/**
 * @copyright: DotKernel
 * @library: dot-hydrator
 * @author: n3vrax
 * Date: 1/25/2017
 * Time: 12:59 AM
 */

namespace Dot\Hydrator;

use Dot\Hydrator\Factory\HydratorPluginManagerFactory;
use Zend\Hydrator\HydratorPluginManager;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class ConfigProvider
 * @package Dot\Hydrator
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependenciesConfig(),

            'dot_hydrator' => [

                'hydrator_manager' => [
                    'factories' => [
                        ClassMethodsCamelCase::class => InvokableFactory::class,
                        ClassMethodsUnderscore::class => InvokableFactory::class,
                    ],
                    'aliases' => [
                        'classmethodsunderscore' => ClassMethodsUnderscore::class,
                        'classMethodsUnderscore' => ClassMethodsUnderscore::class,
                        'ClassMethodsUnderscore' => ClassMethodsUnderscore::class,

                        'classmethodscamelcase' => ClassMethodsCamelCase::class,
                        'classMethodsCamelCase' => ClassMethodsCamelCase::class,
                        'ClassMethodsCamelCase' => ClassMethodsCamelCase::class,
                    ]
                ],
            ],
        ];
    }

    public function getDependenciesConfig()
    {
        return [
            'factories' => [
                'HydratorManager' => HydratorPluginManagerFactory::class,
            ],
            'aliases' => [
                HydratorPluginManager::class => 'HydratorManager',
            ],
        ];
    }
}
