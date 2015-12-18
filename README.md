# vaibhavpandeyvpz/consoler
Extensions for ```Symfony\Component\Console\Application``` and ```Symfony\Component\Console\Command\Command``` from [symfony/console](https://github.com/symfony/console), adding support for [container-interop](https://github.com/container-interop/container-interop) compatible service container(s).

Install
------
```bash
composer require vaibhavpandeyvpz/consoler
```

Usage
------
Let your command classes extend ```Consoler\Command```.

```php
<?php

use Consoler\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \PDO $pdo */
        $pdo = $this->getContainer()->get('pdo');
        // ...more code!
    }
}
```

Create an instance of ```Consoler\Application```, assign it a ```Interop\Container\ContainerInterface``` instance and run as usual.

```php
#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Consoler\Application();
$app->setContainer($container = new Consoler\Container());

$container['pdo'] = function ($length)
{
    return new PDO(/** args */);
};

$app->add(new InstallCommand());

$app->run();
```

Note
------
For using ```Consoler\Container```, you also need to install [pimple/pimple](https://github.com/silexphp/Pimple). To do so, run following:
```bash
composer require pimple/pimple
```

License
------
See [LICENSE.md](https://github.com/vaibhavpandeyvpz/consoler/blob/master/LICENSE.md) file.
