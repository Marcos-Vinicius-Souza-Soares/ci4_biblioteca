<div class="ui container">
    <h2>Autor</h2>

    <!-- Button do Modal -->
    <button type="button" class="ui button primary" id="modalButton">Novo</button>

    <!-- Tabela de Autor -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaAutor as $a) :?>
                <tr>
                    <td><?=anchor("Autor/editar/".$a['id'],$a['id'])?></td>
                    <td><?=$a['nome']?></td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="ui modal" id="exampleModal">
        <div class="header">
            Novo Autor
        </div>
        <div class="content">
            <?=form_open("Autor/cadastrar")?>
                <div class="ui form">
                    <div class="field">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome">
                    </div>
                </div>
        </div>
        <div class="actions">
            <?=anchor("Autor/","Cancelar",['class' => 'ui button'])?>
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
