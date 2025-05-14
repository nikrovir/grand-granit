<?php

if (! function_exists('settings')) {
    /**
     * Application settings
     */
    function settings($key = null, $default = null)
    {
        if ($key === null) {
            return app(\App\Overrides\Settings::class);
        }

        return app(\App\Overrides\Settings::class)->get($key, $default);
    }
}
