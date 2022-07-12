<?php

class Database {
   public static function getConnection() {
      $envPath = realpath(dirname(__FILE__) . '/../env.ini'); // A função parse_ini_file() analisa um arquivo de configuração (ini) e retorna as configurações.
      $env = parse_ini_file($envPath);
      $conn = new mysqli($env['host'], $env['username'], $env['password'],$env['database']);

      if($conn->connect_error) {
         die("Erro: ". $conn->connect_error);
      }
      return $conn;
   }

   public static function getResultFromQuery($sql) {
      $conn = self::getConnection();
      $result = $conn->query($sql);
      $conn->close();
      return $result;
   }
}