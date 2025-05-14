<?php

namespace App\Overrides;

use Spatie\Valuestore\Valuestore;

class Settings extends Valuestore
{
    protected array $defaults = [
        'address' => '229 Ernser Path Connbury, WI 68131',
        'phones' => [
            '+70000000001',
            '+70000000002',
        ],
        'email' => 'murray.edwin@schowalter.biz',
        'lat' => '43.075733',
        'lng' => '-89.381782',
    ];

    /**
     * Make settings instance with default values
     */
    public static function make(string $fileName, ?array $values = null): static
    {
        $instance = parent::make($fileName, $values);
        $instance->ensureDefaults();

        return $instance;
    }

    /**
     * Set default values if they are not set.
     */
    protected function ensureDefaults(): void
    {
        foreach ($this->defaults as $key => $value) {
            if (! $this->has($key)) {
                $this->put($key, $value);
            }
        }
    }
}
