<div class="ui container segment">
    <?= form_open('Usuario/salvar', ['class' => 'ui form']) ?>
    <input value='<?= $usuario['id'] ?>' type="hidden" id='id' name='id'>
    <div class="field">
        <label for="nome">Nome</label>
        <input value='<?= $usuario['nome'] ?>' type="text" id='nome' name='nome' placeholder="Nome">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input value='<?= $usuario['email'] ?>' type="email" id='email' name='email' placeholder="Email">
    </div>
    <div class="field">
        <label for="telefone">Telefone</label>
        <input value='<?= $usuario['telefone'] ?>' type="text" id='telefone' name='telefone' placeholder="Telefone">
    </div>
    <div class="ui divider"></div>
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui buttons">
                <?= anchor("Usuario/", "Cancelar", ['class' => 'ui button']) ?>
                <div class="ui button negative excluir-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </div>
                <button type="submit" class="ui button positive">Salvar</button>
            </div>
        </div>
    </div>
    <?= form_close() ?>
</div>
<!-- Modal de Exclusão -->
<div class="ui modal" id="exampleModal">
    <div class="header">
        Excluir Usuário
    </div>
    <div class="content">
        <?= form_open('Usuario/excluir', ['id' => 'formExcluirUsuario']) ?>
        <input value='<?= $usuario['id'] ?>' type="hidden" id='id_excluir' name='id_excluir'> <!-- Renomear para evitar conflitos -->
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