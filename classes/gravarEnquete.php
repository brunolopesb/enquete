<?php
namespace App;
sleep(1);

require __DIR__.'/../vendor/autoload.php';

use App\db\database;
use PDOException;

$opcao = $_REQUEST['opcao'];

if($_REQUEST['acao'] AND $_REQUEST['acao']== 'clicar'){
class gravarEnquete{ 
    
    public static function gravarOpcao($opcaoEnquete){

            $pdo = database::conexao();      
            
            try{
            if($opcaoEnquete == 1){
            $sql = $pdo->prepare("UPDATE tb_enquete SET flamengo = flamengo+1");
            $sql->execute();
            }

            if($opcaoEnquete == 2){
            $sql = $pdo->prepare("UPDATE tb_enquete SET barcelona = barcelona+1");
            $sql->execute();
            }

            if($opcaoEnquete == 3){
            $sql = $pdo->prepare("UPDATE tb_enquete SET liverpool = liverpool+1");
            $sql->execute();
            }
       
            } catch(PDOException $e){
               echo $e->getMessage();
            } 
    } 
 }
}

$d = gravarEnquete::gravarOpcao($opcao);
?>