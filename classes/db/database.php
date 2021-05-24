<?php
namespace App\db;

use PDO;
use PDOException;

class database{
    private static $dsn  = 'mysql:host=127.0.0.1;dbname=enquete';
    private static $user = 'root';
    private static $pass = '';
 
 public static function conexao(){
 
      try{
         $pdo = new PDO(self::$dsn, self::$user, self::$pass);
        
         //MOSTRA ERROS COM DETALHES
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
      }catch(PDOException $e){
          echo $e->getMessage();
      }
      return $pdo;
   }  
 }

 