# vaibhavpandeyvpz/consoler
Extensions for ```Symfony\Component\Console\Application``` and ```Symfony\Component\Console\Command\Command``` from [symfony/console](https://github.com/symfony/console), adding support for [container-interop/container-interop](https://github.com/container-interop/container-interop) compatible service container(s).

Install
------
```bash
composer require vaibhavpandeyvpz/consoler
```

Usage
------
Create an instance of ```Consoler\Application```, assign it a ```Interop\Container\ContainerInterface``` instance and run as usual.

```php
#!/usr/bin/env php

$app = new Consoler\Application();

$app->setContainer($container = new Katora\Container());

$container->singleton('pdo', function ()
{
    return new PDO(/** args */);
});

$app->add(new InstallCommand());

$app->run();
```

Let your command classes extend ```Consoler\Command```.

```php
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

Note
------
You may also want to install [vaibhavpandeyvpz/katora](https://github.com/vaibhavpandeyvpz/katora) for using ```Katora\Container```. To do so, run following:
```bash
composer require vaibhavpandeyvpz/katora
```

License
------
See [LICENSE.md](https://github.com/vaibhavpandeyvpz/consoler/blob/master/LICENSE.md) file.
