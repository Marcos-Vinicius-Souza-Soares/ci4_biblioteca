<div class="ui container">
    <div class="text-light">
        <h2>Emprestimo</h2>
    </div>
    <!-- Button do Modal -->
    <button type="button" class="ui button primary" id="modalButton">
        Novo
    </button>
    <!-- Tabela de Emprestimo -->
    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>DATA DE INICIO</th>
                <th>DATA DO FIM</th>
                <th>DATA DO PRAZO</th>
                <th>LIVRO</th>
                <th>ALUNO</th>
                <th>USUARIO</th>
                <th>DEVOLUÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaEmprestimo as $em) :?>
                <?php
                    $data_inicio = $em['data_inicio'];
                    $data_inicio = explode('-',$data_inicio);
                    $data_inicio = mktime(0,0,0,$data_inicio[1],$data_inicio[2],$data_inicio[0]);
                    $data_fim = $em['data_fim'];
                    $data_fim = explode('-',$data_fim);
                    $data_fim = mktime(0,0,0,$data_fim[1],$data_fim[2],$data_fim[0]);
                    $prazo = $em['data_prazo']*24*60*60;
                    $prazo += $data_inicio;
                    $prazo_date = date('d/m/Y', $prazo);
                    $prazo_color = ($data_fim - $prazo <= 0) ? 'green' : 'red';
                ?>
                <tr>
                    <td><?=anchor("Emprestimo/editar/".$em['id'],$em['id'])?></td>
                    <td><?=date('d/m/Y',$data_inicio)?></td>
                    <td><?=date('d/m/Y',$data_fim)?></td>
                    <td style="color: <?=$prazo_color?>"><?= $prazo_date ?></td>
                    <td>
                        <?php
                            foreach($listaObra as $obra){
                                $obras[$obra['id']] = $obra['titulo'];
                            }
                            foreach($listaLivro as $livro){
                                $livros[$livro['id']] = $obras[$livro['id_obra']];
                            }
                        ?>
                        <?=$livros[$em['id_livro']]?>
                    </td>
                    <td>
                        <?php
                            foreach($listaAluno as $aluno){
                                $alunos[$aluno['id']] = $aluno['nome'];
                            }
                        ?>
                        <?=$alunos[$em['id_aluno']]?>
                    </td>
                    <td>
                        <?php
                            foreach($listaUsuario as $usuario){
                                $usuarios[$usuario['id']] = $usuario['nome'];
                            }
                        ?>
                        <?=$usuarios[$em['id_usuario']]?>
                    </td>
                    <td>
                        <div class="field">
                            <div class="ui button returnButton" data-id="<?= $em['id'] ?>">Devolver</div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="ui modal" id="exampleModal">
        <div class="header">
            Novo Empréstimo
        </div>
        <div class="content">
            <?=form_open("Emprestimo/cadastrar")?>
                <div class="ui form">
                    <div class="field">
                        <label for="data_inicio">Data de Início:</label>
                        <input type="date" id="data_inicio" name="data_inicio">
                    </div>
                    <div class="field">
                        <label for="data_prazo">Prazo:</label>
                        <input type="text" id="data_prazo" name="data_prazo">
                    </div>
                    <div class="field">
                        <label for="id_livro">Livro:</label>
                        <select class="ui dropdown" name="id_livro" id="id_livro" required>
                            <option value="">Selecione um Livro</option>
                            <?php foreach($listaLivro as $livro) : ?>
                                <?php if ($livro['disponivel'] == 1) :?>
                                    <option value="<?=$livro['id']?>"><?=$livro['id']?></option>
                                <?php endif?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field">
                        <label for="id_aluno">Aluno:</label>
                        <select class="ui dropdown" name="id_aluno" id="id_aluno" required>
                            <option value="">Selecione um Aluno</option>
                            <?php foreach($listaAluno as $aluno) : ?>
                                <option value="<?=$aluno['id']?>"><?=$aluno['nome']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field">
                        <label for="id_usuario">Usuário:</label>
                        <select class="ui dropdown" name="id_usuario" id="id_usuario" required>
                            <?php foreach($listaUsuario as $usuario) : ?>
                                <?php if($usuario['email'] == session()->get('email')):?>
                                    <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="actions">
            <?=anchor("Emprestimo/","Cancelar",['class' => 'ui button'])?>
            <button type="submit" class="ui positive right labeled icon button">
                Cadastrar
                <i class="checkmark icon"></i>
            </button>
            <?=form_close()?> 
        </div>
    </div>

    <!-- Modal de Devolução -->
    <div class="ui modal" id="returnModal">
        <div class="header">
            Devolver Empréstimo
        </div>
        <div class="content">
            <?= form_open('Emprestimo/salvar_devolucao', ['class' => 'ui form', 'id' => 'returnForm']) ?>
                <input type="hidden" id="returnId" name="id">
                <div class="field">
                    <label for="data_fim">Data do Fim:</label>
                    <input required type="date" id="returnDataFim" name="data_fim">
                </div>
                <div class="field">
                    <label for="id_livro">Livro:</label>
                    <select class='ui dropdown' name="id_livro" id="returnIdLivro" required>
                        <?php foreach ($listaLivro as $livro) : ?>
                            <option value="<?= $livro['id'] ?>"><?= $livros[$livro['id']] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
        </div>
        <div class="actions">
            <div class="ui button" data-bs-dismiss="modal">Cancelar</div>
            <button type="submit" class="ui positive button">Salvar</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Abrir o modal ao clicar no botão Novo
        $('#modalButton').click(function(){
            $('#exampleModal').modal('show');
        });
        
        // Abrir o modal ao clicar no botão Devolver
        $('.returnButton').click(function(){
            var id = $(this).data('id');
            $('#returnId').val(id);
            $('#returnModal').modal('show');
        });
    });
</script>
