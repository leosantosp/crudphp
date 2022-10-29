<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Funcionario');

use \App\Entity\Funcionario;


// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consulta o Funcionario
$obFuncionario = Funcionario::getFuncionario($_GET['id']);
// echo "<pre>"; print_r($obFuncionario); echo "</pre>"; exit;

// Validação do Funcionário
if(!$obFuncionario instanceof Funcionario){
    header('location: index.php?status=error');
    exit;
}

// Validação do POST
if(isset($_POST['name'],$_POST['department'],$_POST['email'],$_POST['phone'],$_POST['birth'])){

    $obFuncionario->name       = $_POST['name'];
    $obFuncionario->department = $_POST['department'];
    $obFuncionario->email      = $_POST['email'];
    $obFuncionario->phone      = $_POST['phone'];
    $obFuncionario->birth      = $_POST['birth'];
    $obFuncionario->atualizar();
    // echo "<pre>"; print_r($obFuncionario); echo "</pre>"; exit;

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';