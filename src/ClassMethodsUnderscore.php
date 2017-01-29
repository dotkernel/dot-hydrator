<?php
/**
 * @copyright: DotKernel
 * @library: dot-hydrator
 * @author: n3vrax
 * Date: 1/25/2017
 * Time: 1:07 AM
 */

declare(strict_types=1);

namespace Dot\Hydrator;

use Zend\Hydrator\ClassMethods;

/**
 * Class ClassMethodsUnderscore
 * @package Dot\Hydrator
 */
class ClassMethodsUnderscore extends ClassMethods
{
    public function __construct()
    {
        parent::__construct(true);
    }
}
