<?php

namespace App;

class MagicClass
{
    private $values = [];

    public function __construct()
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __destruct()
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __set($name, $value)
    {
        echo __FUNCTION__, PHP_EOL;
        $this->values[$name] = $value;
    }

    public function __get($name)
    {
        echo __FUNCTION__, PHP_EOL;
        return $this->values[$name] ?? null;
    }

    public function __isset($name): bool
    {
        echo __FUNCTION__, PHP_EOL;
        return isset($this->values[$name]);
    }

    public function __unset($name)
    {
        echo __FUNCTION__, PHP_EOL;
        unset($this->values[$name]);
    }

    public function __call($name, $arguments)
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __toString(): string
    {
        return __FUNCTION__;
    }

    public function __invoke()
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __clone()
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __debugInfo(): array
    {
        echo __FUNCTION__, PHP_EOL;
        return $this->values;
    }

    public function __sleep(): array
    {
        echo __FUNCTION__, PHP_EOL;
        return ['values'];
    }

    public function __wakeup(): void
    {
        echo __FUNCTION__, PHP_EOL;
    }

    public function __serialize(): array
    {
        echo __FUNCTION__, PHP_EOL;
        return ['values' => $this->values];
    }

    public function __unserialize(array $data): void
    {
        echo __FUNCTION__, PHP_EOL;
        $this->values = $data['values'];
    }

    public static function __set_state(array $data): self
    {
        echo __FUNCTION__, PHP_EOL;
        $object = new self();
        $object->values = $data['values'];
        return $object;
    }
}