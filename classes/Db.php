<?php
/*
 * Design Pattern Singleton
 * man möchte nur 1 Objekt in der Klasse haben
 */


class Db
{
    private static object $dbh;

    public static function getConnection(): object
    {
        if (!isset(self::$dbh)) {
            /* Connect to a MySQL database using driver invocation */
            try {
                self::$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD); // $dbh data base handle / handle = Resource
            } catch (PDOException $e) {
                // Fehler in log-Datei schreiben
                file_put_contents(LOG_PATH,(new DateTime())->format( 'Y-m-d H:i:s' )
                    . ' ' .  $e->getMessage() . "\n" . file_get_contents(LOG_PATH));

                throw new Exception('Sorry, es ist ein Fehler aufgetreten, der Administrator ist informiert');
//                echo '<pre>';
//                print_r($e);
//                echo '</pre>';
            }
        }
        return self::$dbh;
    }
}