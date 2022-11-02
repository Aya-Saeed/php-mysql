<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5feece239af16cb49f9d5c6c06c34e35
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5feece239af16cb49f9d5c6c06c34e35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5feece239af16cb49f9d5c6c06c34e35::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5feece239af16cb49f9d5c6c06c34e35::$classMap;

        }, null, ClassLoader::class);
    }
}
