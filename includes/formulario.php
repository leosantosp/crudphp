<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">

        <div class="form-group">
            <label for="name">Nome do Colaborador</label>
            <input required class="form-control" type="text" id="name" name="name" value="<?=$obFuncionario->name?>">
        </div>

        <div class="form-group">
            <label for="department">Departamento</label>
            <select required class="form-control" name="department" id="department">
                <option selected disabled value="" hidden>Escolha um setor</option>
                <option <?=$obFuncionario->department == "Operacional" ? 'selected' : '' ?> value="Operacional">Operacional</option>
                <option <?=$obFuncionario->department == "Assistência" ? 'selected' : '' ?> value="Assistência">Assistência</option>
                <option <?=$obFuncionario->department == "RH" ? 'selected' : '' ?> value="RH">RH</option>
                <option <?=$obFuncionario->department == "DP" ? 'selected' : '' ?> value="DP">DP</option>
                <option <?=$obFuncionario->department == "Comercial" ? 'selected' : '' ?> value="Comercial">Comercial</option>
                <option <?=$obFuncionario->department == "SAC" ? 'selected' : '' ?> value="SAC">SAC</option>
                <option <?=$obFuncionario->department == "TI" ? 'selected' : '' ?> value="TI">TI</option>
                <option <?=$obFuncionario->department == "Cobrança" ? 'selected' : '' ?> value="Cobrança">Cobrança</option>
                <option <?=$obFuncionario->department == "Controladoria" ? 'selected' : '' ?> value="Controladoria">Controladoria</option>
                <option <?=$obFuncionario->department == "Administração" ? 'selected' : '' ?> value="Administração">Administração</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input required class="form-control" type="email" id="email" name="email" value="<?=$obFuncionario->email?>">
        </div>

        <div class="form-group">
            <label for="phone">Ramal</label>
            <input required class="form-control" type="phone" id="phone" name="phone" value="<?=$obFuncionario->phone?>">
        </div>

        <div class="form-group">
            <label for="birth">Data de Nascimento</label>
            <input required class="form-control" type="date" id="birth" name="birth" value="<?=$obFuncionario->birth?>">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

    </form>

</main>