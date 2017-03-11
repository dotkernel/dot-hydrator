<?php
/**
 * @see https://github.com/dotkernel/dot-hydrator/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-hydrator/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

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
    public function __invoke(): array
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

    public function getDependenciesConfig(): array
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
