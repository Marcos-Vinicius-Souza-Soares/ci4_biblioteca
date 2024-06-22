<div class="ui container">
    <h2>Aluno</h2>
    <!-- Button do Modal -->
    <button class="ui button primary" id="modalButton">Novo</button>

    <!-- Tabela de Usuario -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CPF</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>TURMA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaAlunos as $au) :?>
            <tr>
                <td><?=anchor("Aluno/editar/".$au['id'],$au['id'])?></td>
                <td><?=$au['nome']?></td>
                <td><?=$au['cpf']?></td>
                <td><?=$au['email']?></td>
                <td><?=$au['telefone']?></td>
                <td><?=$au['turma']?></td>
            </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="ui modal" id="exampleModal">
        <div class="header">
            Novo Aluno
        </div>
        <div class="content">
            <?=form_open("Aluno/cadastrar")?> 
            <div class="ui form">
                <div class="field">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf">
                </div>
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
                <div class="field">
                    <label for="turma">Turma:</label>
                    <select name="turma" id="turma">
                        <option hidden>Selecione Uma Turma...</option>
                        <option value="1A">1A</option>
                        <option value="1B">1B</option>
                        <option value="1C">1C</option>
                        <option value="1D">1D</option>
                        <option value="2A">2A</option>
                        <option value="2B">2B</option>
                        <option value="2C">2C</option>
                        <option value="2D">2D</option>
                        <option value="3A">3A</option>
                        <option value="3B">3B</option>
                        <option value="3C">3C</option>
                        <option value="3D">3D</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="actions">
            <?=anchor("Aluno/","Cancelar",['class' => 'ui button'])?>
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