<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit884b21c7e1aaac5c43f106eb591e5e8f
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Verot\\Upload\\Upload' => __DIR__ . '/..' . '/verot/class.upload.php/src/class.upload.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit884b21c7e1aaac5c43f106eb591e5e8f::$classMap;

        }, null, ClassLoader::class);
    }
}
