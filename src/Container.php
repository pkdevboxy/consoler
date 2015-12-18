<?php

namespace Consoler;

use Interop\Container\ContainerInterface;
use Pimple\Container as PimpleContainer;

class Container extends PimpleContainer implements ContainerInterface
{
    /**
     * @inheritdoc
     */
    public function get($id)
    {
        return $this[$id];
    }

    /**
     * @inheritdoc
     */
    public function has($id)
    {
        return isset($this[$id]);
    }
}
