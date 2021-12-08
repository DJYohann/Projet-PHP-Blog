<?php

/**
 * Autochargement des classes
 */
class Autoload
{
    private static $instance;

    /**
     * @return void
     */
    public static function charge()
    {
        if (self::$instance !== null)
        {
            throw new RuntimeException(sprintf("%s est déjà instancié", __CLASS__));
        }

        self::$instance = new self();

        if (!spl_autoload_register(array(self::$instance, 'autoload'), false))
        {
            throw new RuntimeException(sprintf("%s : autoload ne peut pas démarrer, __CLASS__"));
        }
    }

    /**
     * @return void
     */
    public static function shutDown()
    {
        if (self::$instance !== null)
        {
            if (!spl_autoload_unregister(array(self::$instance, 'autoload')))
            {
                throw new RuntimeException("autoload ne veut pas se stopper");
            }
            self::$instance = null;
        }
    }

    /**
     * @param $class
     */
    private static function autoload($class)
    {
        global $rep;
        $filename = "$class.php";
        $dir = array('controller/', 'modele/', 'utils/');
        foreach ($dir as $d)
        {
            $file = "$rep$filename";
            if (file_exists($file))
            {
                include $file;
            }
        }
    }
}