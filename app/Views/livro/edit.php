<div class="ui container segment">
    <?= form_open('Livro/salvar', ['class' => 'ui form']) ?>
    <input value='<?= $livro['id'] ?>' class='form-control' type="hidden" id='id' name='id'>
    <div class="field">
        <label for="disponivel">Disponível:</label>
        <input type="text" id="disponivel" name="disponivel">
    </div>
    <div class="field">
        <label for="status">Status:</label>
        <input value='<?= $livro['status'] ?>' class='form-control' type="text" id='status' name='status'>
    </div>
    <div class="field">
        <label for="id_obra">Obra:</label>
        <select class='ui dropdown' name="id_obra" id="id_obra" required>
            <?php foreach($listaObra as $obra) : ?>
                <option value="<?= $obra['id'] ?>"><?= $obra['titulo'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="ui divider"></div>
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui buttons">
                <?= anchor("Livro/", "Cancelar", ['class' => 'ui button']) ?>
                <button type="submit" class="ui button positive">Salvar</button>
                <div class="ui negative button excluir-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </div>
            </div>
        </div>
    </div>
    <?= form_close() ?>
</div>

<!-- Modal de Exclusão -->
<div class="ui modal" id="exampleModal">
    <div class="header">
        Excluir Livro
    </div>
    <div class="content">
        <?= form_open('Livro/excluir', ['id' => 'formExcluirLivro']) ?>
        <input value='<?= $livro['id'] ?>' type="hidden" id='id_excluir' name='id_excluir'> <!-- Renomear para evitar conflitos -->
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
