<nav>
  <div class="ui inverted vertical masthead center aligned segment">
    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <div class="left menu">
          <?=anchor("Home/","Home",['class' => 'active item'])?>
          <?=anchor("Aluno/","Aluno",['class' => 'item'])?>
          <?=anchor("Autor/","Autor",['class' => 'item'])?>
          <?=anchor("Usuario/","Usuario",['class' => 'item'])?>
          <?=anchor("Editora/","Editora",['class' => 'item'])?>
          <?=anchor("Obra/","Obra",['class' => 'item'])?>
          <?=anchor("Livro/","Livro",['class' => 'item'])?>
          <?=anchor("Emprestimo/","Emprestimo",['class' => 'item'])?>
        </div>
        <div class="right menu">
          <button class="ui secondary button" id="navModalButton">
            <i class="id badge outline icon"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</nav>


<!-- Modal -->
<div class="ui modal" id="navbarModal">
  <i class="close icon"></i>
  <div class="header">
    Perfil
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="/assets/img/perfil.png">
    </div>
    <div class="description">
      <div class="ui header">Foto escolhida automaticamente</div>
      <p>
        Usuario:
        <?=session()->get('email');?>
      </p>
      <p>Deseja sair de sua conta?</p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Não
    </div>
    <div class="ui positive right labeled icon button" onclick="location.href='<?php echo base_url('login/logout') ?>'">
      Sim
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('#navModalButton').click(function(){
            $('#navbarModal').modal('show');
        });
    });
</script>