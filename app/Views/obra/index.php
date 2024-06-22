<div class="ui container">
    <h2>Obra</h2>

    <!-- Button do Modal -->
    <button type="button" class="ui button primary" id="modalButton">Novo</button>

    <!-- Tabela de Obra -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>CATEGORIA</th>
                <th>ANO</th>
                <th>ISBN</th>
                <th>EDITORA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaObra as $ob) :?>
                <tr>
                    <td><?=anchor("Obra/editar/".$ob['id'],$ob['id'])?></td>
                    <td><?=$ob['titulo']?></td>
                    <td><?=$ob['categoria']?></td>
                    <td><?=$ob['ano_publicacao']?></td>
                    <td><?=$ob['isbn']?></td>
                    <td>
                        <?php
                            foreach($listaEditora as $editora){
                                if ($editora['id'] == $ob['id_editora']) {
                                    echo $editora['nome'];
                                    break;
                                }
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="ui modal" id="exampleModal">
        <div class="header">
            Nova Obra
        </div>
        <div class="content">
            <?=form_open("Obra/cadastrar")?>
                <div class="ui form">
                    <div class="field">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo">
                    </div>
                    <div class="field">
                        <label for="categoria">Categoria:</label>
                        <input type="text" id="categoria" name="categoria">
                    </div>
                    <div class="field">
                        <label for="ano_publicacao">Ano:</label>
                        <input type="text" id="ano_publicacao" name="ano_publicacao">
                    </div>
                    <div class="field">
                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn">
                    </div>
                    <div class="field">
                        <label for="id_editora">Editora:</label>
                        <select class="ui dropdown" name="id_editora" id="id_editora" required>
                            <option value="">Selecione uma editora</option>
                            <?php foreach($listaEditora as $editora) : ?>
                                <option value="<?=$editora['id']?>"><?=$editora['nome']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="actions">
            <?=anchor("Obra/","Cancelar",['class' => 'ui button'])?>
            <button type="submit" class="ui positive right labeled icon button">
                Cadastrar
                <i class="checkmark icon"></i>
            </button>
            <?=form_close()?> 
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Abrir o modal ao clicar no botão
        $('#modalButton').click(function(){
            $('#exampleModal').modal('show');
        });
    });
</script>
