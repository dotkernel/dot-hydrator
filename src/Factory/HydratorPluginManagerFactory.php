<?php
/**
 * @see https://github.com/dotkernel/dot-hydrator/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-hydrator/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Hydrator\Factory;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\HydratorPluginManager;

/**
 * Class HydratorPluginManagerFactory
 * @package Dot\Hydrator\Factory
 */
class HydratorPluginManagerFactory
{
    protected $configKey = 'dot_hydrator';
    protected $hydratorManagerConfigKey = 'hydrator_manager';

    /**
     * @param ContainerInterface $container
     * @return HydratorPluginManager
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('config') ? $container->get('config') : [];
        if (isset($config[$this->configKey])
            && isset($config[$this->configKey][$this->hydratorManagerConfigKey])
            && is_array($config[$this->configKey][$this->hydratorManagerConfigKey])
        ) {
            $config = $config[$this->configKey][$this->hydratorManagerConfigKey];
        }

        return new HydratorPluginManager($container, $config);
    }
}
