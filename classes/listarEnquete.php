<?php
namespace App;
require __DIR__.'/../vendor/autoload.php';

use App\db\database;
use PDO;

class listarEnquete{

    public static function lista(){
        
        $cmd = database::conexao();

        try{
            $sql = $cmd->prepare("SELECT * FROM tb_enquete");
            $sql->execute();
        
            if($sql->rowCount() > 0){
            $listar_produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
           }

           return $listar_produtos;  

        } catch(PDOException $e){
            echo $e->getMessage();
        }
       } 
}

$result = listarEnquete::lista();
foreach($result as $resultado){
}
?>
<!--  PARA USAR COM BANCO DE DADOS
Flamengo&nbsp;<span class="badge badge-info"> <?php //echo $resultado['flamengo']; ?></span>&nbsp;&nbsp;
Barcelona&nbsp;<span class="badge badge-info"> <?php //echo $resultado['barcelona']; ?></span>&nbsp;&nbsp;
Liverpool&nbsp;<span class="badge badge-info"> <?php //echo $resultado['liverpool']; ?></span>
-->

<!-- PARA USAR COM .TXT -->
Flamengo&nbsp;<span class="badge badge-info"> <?php echo file_get_contents('../txt/flamengo.txt') ?></span>&nbsp;&nbsp;
Barcelona&nbsp;<span class="badge badge-info"> <?php echo file_get_contents('../txt/barcelona.txt') ?></span>&nbsp;&nbsp;
Liverpool&nbsp;<span class="badge badge-info"> <?php echo file_get_contents('../txt/liverpool.txt') ?></span>

<br><br>
<?php
$flamengo  = file_get_contents('../txt/flamengo.txt');
$barcelona = file_get_contents('../txt/barcelona.txt');
$liverpool = file_get_contents('../txt/liverpool.txt');

$flamengoResult  = ($flamengo*100)/ ($flamengo+$barcelona+$liverpool);
$barcelonaResult = ($barcelona*100)/ ($flamengo+$barcelona+$liverpool);
$liverpoolResult = ($liverpool*100)/ ($flamengo+$barcelona+$liverpool);
?>

Flamengo
<div class="progress">
<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo round($flamengoResult); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo round($flamengoResult); ?>%</div>
</div>

Barcelona
<div class="progress">
<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo round($barcelonaResult); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo round($barcelonaResult); ?>%</div>
</div>

Liverpool
<div class="progress">
<div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-striped bg-info" role="progressbar" style="width: <?php echo round($liverpoolResult); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo round($liverpoolResult); ?>%</div>
</div>