<div class="ui container segment">
    <?= form_open('Obra/salvar', ['class' => 'ui form']) ?>
    <input value='<?= $obra['id'] ?>' type="hidden" id='id' name='id'>
    <div class="field">
        <label for="titulo">Título</label>
        <input value='<?= $obra['titulo'] ?>' type="text" id='titulo' name='titulo' placeholder="Título">
    </div>
    <div class="field">
        <label for="categoria">Categoria</label>
        <input value='<?= $obra['categoria'] ?>' type="text" id='categoria' name='categoria' placeholder="Categoria">
    </div>
    <div class="field">
        <label for="ano_publicacao">Ano de Publicação</label>
        <input value='<?= $obra['ano_publicacao'] ?>' type="text" id='ano_publicacao' name='ano_publicacao' placeholder="Ano de Publicação">
    </div>
    <div class="field">
        <label for="isbn">ISBN</label>
        <input value='<?= $obra['isbn'] ?>' type="text" id='isbn' name='isbn' placeholder="ISBN">
    </div>
    <div class="field">
        <label for="id_editora">Editora</label>
        <input value='<?= $obra['id_editora'] ?>' type="text" id='id_editora' name='id_editora' disabled>
    </div>
    <div class="field">
        <label for="id_autor">Autores</label>
        <select class='ui dropdown' name="id_autor" id="id_autor" required>
            <option>Selecione</option>
            <?php foreach ($listaAutor as $autor) : ?>
                <option value="<?= $autor['id'] ?>"><?= $autor['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="ui divider"></div>
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui buttons">
                <?= anchor("Obra/", "Cancelar", ['class' => 'ui button']) ?>
                <div class="ui negative button excluir-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        Excluir Obra
    </div>
    <div class="content">
        <?= form_open('Obra/excluir', ['id' => 'formExcluirObra']) ?>
        <input value='<?= $obra['id'] ?>' type="hidden" id='id_excluir' name='id_excluir'> <!-- Renomear para evitar conflitos -->
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