<div class="card-body">
  <p class="login-box-msg">Faça login para iniciar sua sessão</p>

  <form action="<?= current_url() ?>" method="post">
    <div class="input-group mb-3">
      <input type="text" name="login" required class="form-control" placeholder="Login">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" name="password" required class="form-control" placeholder="Senha">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
       
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div>