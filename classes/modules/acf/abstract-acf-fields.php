<?php

namespace Modules\Acf;

abstract class AcfFields
{
    /** @var static[] */
    protected static $instances = [];

    protected function __construct()
    {
    }

    final public function __clone()
    {
    }

    final public function __wakeup()
    {
    }

    abstract public function acfFields(): void;

    final protected function setup(): void
    {
        add_action('acf/init', [$this, 'acfFields']);
    }

    final public static function init()
    {
        if (!isset(static::$instances[static::class])) {
            static::$instances[static::class] = new static();
            static::$instances[static::class]->setup();
        }

        return static::$instances[static::class];
    }
}
