<?php

/**
 * Dynamic autoloader.
 *
 * This autoloader searches for a class inside a bunch of paths and includes the class if exists.
 * Please note that the class name should be the same as PHP file name.
 *
 * @author      Ahmad Mayahi <ahmad.mayahi@gmail.com>
 * @license     MIT
 * @version     1.0
 */
class DynamicAutoloader
{
    private $paths;

    /**
     * DynamicAutoloader constructor.
     *
     * @param   $paths it can be either a string with PATH_SEPARATOR or an array of paths.
     * @throws  Exception
     */
    public function __construct($paths)
    {
        if ('' == $paths) {
            throw new Exception('Please set the paths.');
        }
        $this->paths = $paths;
        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Get the paths.
     *
     * @return array
     */
    private function getPaths()
    {
        if (!is_array($this->paths)) {
            return explode(PATH_SEPARATOR, $this->paths);
        }

        return $this->paths;
    }

    /**
     * Autoloader.
     *
     * @param   $class
     * @throws  Exception
     */
    private function autoload($class)
    {
        $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        foreach ($this->getPaths() as $path) {
            $file = $path . DIRECTORY_SEPARATOR . $classFile;

            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }

        throw new Exception($class . ' Cannot be found!');
    }
}
