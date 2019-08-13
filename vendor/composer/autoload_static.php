<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7de532745f8d03328a4c6746f04f08c0
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
        'Mail_info' => __DIR__ . '/../..' . '/Class/Mail_info.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7de532745f8d03328a4c6746f04f08c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7de532745f8d03328a4c6746f04f08c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7de532745f8d03328a4c6746f04f08c0::$classMap;

        }, null, ClassLoader::class);
    }
}