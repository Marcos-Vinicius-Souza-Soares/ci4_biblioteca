<div class="ui container">
    <h2>Livro</h2>

    <!-- Button do Modal -->
    <button type="button" class="ui button primary" id="modalButton">Novo</button>

    <!-- Tabela de Livro -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>DISPONÍVEL</th>
                <th>STATUS</th>
                <th>OBRA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaLivro as $li) :?>
                <tr>
                    <td><?=anchor("Livro/editar/".$li['id'],$li['id'])?></td>
                    <td><?=$li['disponivel']?></td>
                    <td><?=$li['status']?></td>
                    <td>
                        <?php
                            foreach($listaObra as $obra){
                                if ($obra['id'] == $li['id_obra']) {
                                    echo $obra['titulo'];
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
            Novo Livro
        </div>
        <div class="content">
            <?=form_open("Livro/cadastrar")?>
                <div class="ui form">
                    <div class="field">
                        <label for="disponivel">Disponível:</label>
                        <input type="text" id="disponivel" name="disponivel">
                    </div>
                    <div class="field">
                        <label for="status">Status:</label>
                        <input type="text" id="status" name="status">
                    </div>
                    <div class="field">
                        <label for="id_obra">Obra:</label>
                        <select class="ui dropdown" name="id_obra" id="id_obra" required>
                            <option value="">Selecione uma obra</option>
                            <?php foreach($listaObra as $obra) : ?>
                                <option value="<?=$obra['id']?>"><?=$obra['titulo']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="actions">
            <?=anchor("Livro/","Cancelar",['class' => 'ui button'])?>
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
