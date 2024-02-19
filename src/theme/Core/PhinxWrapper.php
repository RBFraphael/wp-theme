<?php

namespace WpTheme\Core;

use Phinx\Console\PhinxApplication;
use Phinx\Wrapper\TextWrapper;

class PhinxWrapper extends TextWrapper
{
    protected array $options = [
        'configuration' => WPTHEME_PATH.'/migrations.php'
    ];

    public function __construct()
    {
        parent::__construct(new PhinxApplication(), $this->options);
    }

    public function create($migration)
    {
        $command = [
            "create",
            '-c' => $this->getOption('configuration')
        ];

        return $this->executeRun($command);
    }

    public function migrate($target = null)
    {
        return $this->getMigrate(target: $target);
    }

    public function rollback($target = null)
    {
        return $this->getRollback(target: $target);
    }
}
