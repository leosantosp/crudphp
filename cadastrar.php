<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Funcionario');


use \App\Entity\Funcionario;
$obFuncionario = new Funcionario;

// Validação do POST
if(isset($_POST['name'], $_POST['department'], $_POST['email'], $_POST['phone'], $_POST['birth'])){
    $obFuncionario->name       = $_POST['name'];
    $obFuncionario->department = $_POST['department'];
    $obFuncionario->email      = $_POST['email'];
    $obFuncionario->phone      = $_POST['phone'];
    $obFuncionario->birth      = $_POST['birth'];
    $obFuncionario->cadastrar();
    // echo "<pre>"; print_r($obFuncionario); echo "</pre>"; exit;

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';