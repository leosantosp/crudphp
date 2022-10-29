<?php 

require __DIR__.'/vendor/autoload.php';


use \App\Entity\Funcionario;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consulta o Funcionario
$obFuncionario = Funcionario::getFuncionario($_GET['id']);

// Validação do Funcionário
if(!$obFuncionario instanceof Funcionario){
    header('location: index.php?status=error');
    exit;
}


// Validação do POST
if(isset($_POST['excluir'])){

  
    $obFuncionario->excluir();
    
    header('location: index.php?status=success');
    exit;
    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';