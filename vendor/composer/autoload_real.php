<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit059a96e42c8f31cf5f6852bd8831c243
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit059a96e42c8f31cf5f6852bd8831c243', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit059a96e42c8f31cf5f6852bd8831c243', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit059a96e42c8f31cf5f6852bd8831c243::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
