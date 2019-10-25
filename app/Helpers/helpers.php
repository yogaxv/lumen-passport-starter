<?php

// config_path() function to correct error using Passport
// https://github.com/dusterio/lumen-passport/issues/78
if (! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     * 
     * @params string $path
     * @return string
     */
    function config_path($path = '') {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

?>
