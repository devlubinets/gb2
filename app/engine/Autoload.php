<?php

namespace app\engine;

class Autoload
{
    private const DS = DIRECTORY_SEPARATOR;

    public function loadClass($className)
    {       #  app\engine\Db
        $fileName = str_replace('\\',self::DS, $className);
        $fileName = str_replace('app','../', $fileName);
        $fileName .= '.php';

        if (file_exists($fileName)) {
            require $fileName;
        }
    }

}