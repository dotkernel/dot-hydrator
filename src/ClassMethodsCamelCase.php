<?php
/**
 * @see https://github.com/dotkernel/dot-hydrator/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-hydrator/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Hydrator;

use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Class ClassMethodsCamelCase
 * @package Dot\Hydrator
 */
class ClassMethodsCamelCase extends ClassMethodsHydrator
{
    public function __construct()
    {
        parent::__construct(false);
    }
}
