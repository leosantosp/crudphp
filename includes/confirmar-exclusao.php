<main>


    <h2 class="mt-3">EXCLUIR FUNCIONÁRIO</h2>

    <form method="POST">
        <div class="form-group">
            <p>Você deseja realmente excluir o colaborador <strong><?=$obFuncionario->name?></strong>?</p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
        </div>

        <div class="form-group mt-3">
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>

    </form>

</main>