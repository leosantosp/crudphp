<?php 

    $mensagem = '';

    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = "<div class='alert alert-success'>Ação executada com sucesso!</div>";
                break;
            case 'error':
                $mensagem = "<div class='alert alert-danger'>Ação não executada</div>";
                break;
        }
    }

    $resultados = '';
    foreach($funcionarios as $funcionario){
        $resultados .= '<tr>
                            <td>'.$funcionario->name.'</td>
                            <td>'.$funcionario->department.'</td>
                            <td>'.$funcionario->email.'</td>
                            <td>'.$funcionario->phone.'</td>
                            <td>'.date('d/m', strtotime($funcionario->birth)).'</td>
                            <td> 
                                <a href="editar.php?id='.$funcionario->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>

                                <a href="excluir.php?id='.$funcionario->id.'">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr> <td colspan="6" class="text-center">Nenhuma vaga encontrada</td></tr>'
?>

<main>

<?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo funcionário</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Nome do Colaborador</th>
                    <th>Departamento</th>
                    <th>E-mail</th>
                    <th>Ramal</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>

</main>