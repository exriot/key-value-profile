<?php

namespace Exriot;

/**
 * Nothing special, just key-value settings on a file
 */
class Profile
{
    /** @var string */
    private $file;
    /** @var array */
    private $data;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    final public function read(): Profile
    {
        if(file_exists($this->file)) {
            $content = file_get_contents($this->file, false);
            $data = unserialize($content);
            $this->data = ($data ? $data : []);
        }else{
            $this->data = [];
        }
        return $this;
    }

    final public function map(callable $fn)
    {
        array_map($fn, array_values($this->data), array_keys($this->data));
    }

    final public function get(string $key, ?string $value = null): ?string
    {
        return isset($this->data[$key]) ? $this->data[$key] : $value;
    }

    final public function set(string $key, ?string $value): Profile
    {
        if(is_null($value)) {
            unset($this->data[$key]);
        }else{
            $this->data[$key] = $value;
        }
        return $this;
    }

    final public function save()
    {
        return file_put_contents($this->file, serialize($this->data)) !== false ? true : false;
    }
}

