<?php
sleep(1);
$opcao = $_REQUEST['opcao'];

if($_REQUEST['acao'] AND $_REQUEST['acao'] == 'clicar'){

class gravarEnq{ 
    
    public static function gravarOpcao($time){
            
            try{
            //PARA LIMITAR OS VOTOS EM UM DETERMINADO TEMPO
            /*if (isset($_COOKIE['enquete'])){
                echo '<div class="alert alert-danger" role="alert">Você já votou 1 vez!</div>';	
                exit;                          
            }*/
     
            if($time == 1){
            $contador = file_get_contents("../txt/flamengo.txt") + 1;
            $arquivo = fopen("../txt/flamengo.txt", "w+"); 
            fwrite($arquivo, $contador); 
            fclose($arquivo);
            echo '<div class="alert alert-success" role="alert">Voto gravado com sucesso!</div>';
            }  

            if($time == 2){
            $contador = file_get_contents("../txt/barcelona.txt") + 1;
            $arquivo = fopen("../txt/barcelona.txt", "w+"); 
            fwrite($arquivo, $contador);
            fclose($arquivo); 
            echo '<div class="alert alert-success" role="alert">Voto gravado com sucesso!</div>';
            }    

            if($time == 3){
            $contador = file_get_contents("../txt/liverpool.txt") + 1;
            $arquivo = fopen("../txt/liverpool.txt", "w+"); 
            fwrite($arquivo, $contador); 
            fclose($arquivo);
            echo '<div class="alert alert-success" role="alert">Voto gravado com sucesso!</div>';
            }
       
            } catch(PDOException $e){
               echo $e->getMessage();
            } 
    } 
 }
}

$gravar = gravarEnq::gravarOpcao($opcao);
//setcookie("enquete", 'um', time()+(10*3600));
?>