<?php

/**
 * This file is part of the GOLF project.
 * Definition de la classe database
 * cette classe gere la connection à la base de données
 * 
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 * @package classes
 */
class database extends PDO
{

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    public function __construct()
    {
        try {
            $dbConfig = array();
            $dbConfig['SGBD'] = 'mysql';
            $dbConfig['HOST'] = HOSTNAME_BASE;
            $dbConfig['DB_NAME'] = DATABASE_BASE;
            $dbConfig['USER'] = USERNAME_BASE;
            $dbConfig['PASSWORD'] = PASSWORD_BASE;
            $dbConfig['OPTIONS'] = array(
                // Activation des exceptions PDO :
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Change le fetch mode par défaut sur FETCH_ASSOC ( fetch() retournera un tableau associatif ) :
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                //met en utf8
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

            parent::__construct($dbConfig['SGBD'] . ':host=' . $dbConfig['HOST'] . ';dbname=' . $dbConfig['DB_NAME'], $dbConfig['USER'], $dbConfig['PASSWORD'], $dbConfig['OPTIONS']);
            unset($dbConfig);
        } catch (Exception $e) {
            trigger_error($e->getCode(), E_USER_ERROR);
        }
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new database();
        }

        return self::$_instance;
    }

//pour mettre un prefixe
    /**
     *
     * @param type $statement
     * @return type
     */
    public function exec($statement)
    {
        $statement = $this->_tablePrefixSuffix($statement);

        return parent::exec($statement);
    }

    /**
     *
     * @param type $statement
     * @param type $driverOptions
     * @return type
     */
    public function prepare($statement, $driverOptions = array())
    {
        $statement = $this->_tablePrefixSuffix($statement);

        return parent::prepare($statement, $driverOptions);
    }

    /**
     *
     * @param type $statement
     * @return type
     */
    public function query($statement)
    {
        $statement = $this->_tablePrefixSuffix($statement);
        $args = func_get_args();

        if (count($args) > 1) {
            return call_user_func_array(array($this, 'parent::query'), $args);
        } else {
            return parent::query($statement);
        }
    }

    /**
     * permet de mettre un prefixe à toutres les tables
     * @param type $statement
     * @return type
     */
    protected function _tablePrefixSuffix($statement)
    {
        return str_replace("#__", PREFIX_BASE, $statement);
    }

}

