<div class="ui container">
    <h2>Editora</h2>

    <!-- Button do Modal -->
    <button type="button" class="ui button primary" id="modalButton">Novo</button>

    <!-- Tabela de Editora -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaEditora as $e) :?>
                <tr>
                    <td><?=anchor("Editora/editar/".$e['id'],$e['id'])?></td>
                    <td><?=$e['nome']?></td>
                    <td><?=$e['email']?></td>
                    <td><?=$e['telefone']?></td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="ui modal" id="exampleModal">
        <div class="header">
            Nova Editora
        </div>
        <div class="content">
            <?=form_open("Editora/cadastrar")?>
                <div class="ui form">
                    <div class="field">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome">
                    </div>
                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="field">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone">
                    </div>
                </div>
        </div>
        <div class="actions">
            <?=anchor("Editora/","Cancelar",['class' => 'ui button'])?>
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
