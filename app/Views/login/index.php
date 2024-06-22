<div class="ui middle aligned center aligned grid" style="height: 100%;">
  <div class="column" style="max-width: 450px;">
    <h2 class="ui teal image header">
      <div class="content">
        Faça Login Para Continuar
      </div>
    </h2>
    <?php if (session()->has('error')): ?>
      <div class="ui negative message">
        <?= session()->get('error') ?>
      </div>
    <?php endif; ?>

    <form action="<?php echo base_url('login/authenticate'); ?>" method="post" class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <label for="email">Email</label>
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo old('email'); ?>">
          </div>
        </div>
        <div class="field">
          <label for="senha">Senha</label>
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" id="senha" name="senha" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="ui fluid large teal submit button">Entrar</button>
      </div>
      <div class="ui error message"></div>
    </form>
  </div>
</div>