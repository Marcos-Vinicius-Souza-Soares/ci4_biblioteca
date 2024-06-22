<div class="ui container segment">
    <?= form_open('Emprestimo/salvar_edit', ['class' => 'ui form']) ?>
    <input value='<?= $emprestimo['id'] ?>' class='form-control' type="hidden" id='id' name='id'>
    <input value='<?=$emprestimo['id_livro']?>'type="hidden" name='id_livro_antigo' id='id_livro_antigo'>
    
    <div class="field">
        <label for="data_inicio">Data de Início:</label>
        <input value='<?= $emprestimo['data_inicio'] ?>' class='form-control' type="date" id='data_inicio' name='data_inicio'>
    </div>
    <div class="field">
        <label for="data_fim">Data do Fim:</label>
        <input value='<?= $emprestimo['data_fim'] ?>' class='form-control' type="date" id='data_fim' name='data_fim'>
    </div>
    <div class="field">
        <label for="data_prazo">Data do Prazo:</label>
        <input value='<?= $emprestimo['data_prazo'] ?>' class='form-control' type="text" id='data_prazo' name='data_prazo'>
    </div>
    <div class="field">
        <label for="id_livro">Livro:</label>
        <select class='ui dropdown' name="id_livro" id="id_livro" required>
            <?php
            foreach ($listaObra as $obra) {
                $obras[$obra['id']] = $obra['titulo'];
            }
            foreach ($listaLivro as $livro) {
                $livros[$livro['id']] = $obras[$livro['id_obra']];
            }
            ?>
            <option value="<?= $livro['id'] ?>"><?= $livros[$emprestimo['id_livro']] ?></option>
        </select>
    </div>
    <div class="field">
        <label for="id_aluno">Aluno:</label>
        <select class='ui dropdown' name="id_aluno" id="id_aluno" required>
            <?php foreach ($listaAluno as $aluno) : ?>
                <option value="<?= $aluno['id'] ?>"><?= $aluno['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="field">
        <label for="id_usuario">Usuário:</label>
        <select class='ui dropdown' name="id_usuario" id="id_usuario" required>
            <?php foreach ($listaUsuario as $usuario) : ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="ui divider"></div>
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui buttons">
                <?= anchor("Emprestimo/", "Cancelar", ['class' => 'ui button']) ?>
                <div class="ui negative button excluir-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </div>
                <button type="submit" class="ui positive button">Salvar</button>
            </div>
        </div>
    </div>
    <?= form_close() ?>
</div>

<!-- Modal de Exclusão -->
<div class="ui modal" id="exampleModal">
    <div class="header">
        Excluir Empréstimo
    </div>
    <div class="content">
        <?= form_open('Emprestimo/excluir', ['id' => 'formExcluirEmprestimo']) ?>
        <input value='<?= $emprestimo['id'] ?>' type="hidden" id='id_excluir' name='id_excluir'>
        <p>Você tem certeza que deseja excluir?</p>
    </div>
    <div class="actions">
        <div class="ui button" data-bs-dismiss="modal">Não</div>
        <button type="submit" class="ui negative button">Sim</button>
    </div>
    <?= form_close() ?>
</div>

<script>
    $(document).ready(function () {
        // Abrir o modal ao clicar no botão Excluir
        $('.excluir-button').click(function (event) {
            $('#exampleModal').modal('show');
        });
    });
</script>
