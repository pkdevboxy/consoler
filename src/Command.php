<?php

namespace Consoler;

use Symfony\Component\Console\Command\Command as ConsoleCommand;

abstract class Command extends ConsoleCommand
{
    /**
     * @return \Interop\Container\ContainerInterface|null
     */
    protected function getContainer()
    {
        if (($a = $this->getApplication()) instanceof Application) {
            /** @var Application $a */
            return $a->getContainer();
        }
        return null;
    }
}
