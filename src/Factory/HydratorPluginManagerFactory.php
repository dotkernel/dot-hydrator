<?php
/**
 * @copyright: DotKernel
 * @library: dot-hydrator
 * @author: n3vrax
 * Date: 1/25/2017
 * Time: 1:02 AM
 */

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
            && is_array($config[$this->configKey][$this->hydratorManagerConfigKey])) {
            $config = $config[$this->configKey][$this->hydratorManagerConfigKey];
        }

        return new HydratorPluginManager($container, $config);
    }
}
