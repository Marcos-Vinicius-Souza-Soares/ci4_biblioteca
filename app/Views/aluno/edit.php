<div class="ui container segment">
    <?= form_open('Aluno/salvar', ['class' => 'ui form']) ?>
    <input value='<?= $aluno['id'] ?>' type="hidden" id='id' name='id'>
    <div class="field">
        <label for="nome">Nome</label>
        <input value='<?= $aluno['nome'] ?>' type="text" id='nome' name='nome' placeholder="Nome">
    </div>
    <div class="field">
        <label for="cpf">CPF</label>
        <input value='<?= $aluno['cpf'] ?>' type="text" id='cpf' name='cpf' placeholder="CPF" disabled>
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input value='<?= $aluno['email'] ?>' type="email" id='email' name='email' placeholder="Email">
    </div>
    <div class="field">
        <label for="telefone">Telefone</label>
        <input value='<?= $aluno['telefone'] ?>' type="text" id='telefone' name='telefone' placeholder="Telefone">
    </div>
    <div class="field">
        <label for="turma">Turma</label>
        <?php
        $turma = ['1A', '1B', '1C', '1D', '2A', '2B', '2C', '2D', '3A', '3B', '3C', '3D'];
        ?>
        <select class='ui dropdown' name="turma" id="turma">
            <option value="<?= $aluno['turma'] ?>" selected><?= $aluno['turma'] ?></option>
            <?php foreach ($turma as $t) { ?>
                <option value="<?= $t ?>"><?= $t ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="ui divider"></div>
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui buttons">
                <?= anchor("Aluno/", "Cancelar", ['class' => 'ui button']) ?>
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
        Excluir Aluno
    </div>
    <div class="content">
        <?= form_open('Aluno/excluir', ['id' => 'formExcluirAluno']) ?>
        <input value='<?= $aluno['id'] ?>' type="hidden" id='id_excluir' name='id_excluir'> <!-- Renomear para evitar conflitos -->
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