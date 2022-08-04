<div class="row">
   <div class="col-md-3">
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
         <div class="card-body box-profile">
            <div class="text-center">
               <img class="profile-user-img img-fluid img-circle" src="<?= base_url("public/uploads/users/".session('picture')) ?>" alt="User profile picture" />
            </div>
            <h3 class="profile-username text-center"><?= session('name') ?></h3>
            <p class="text-muted text-center"><?= session('email') ?></p>
            <ul class="list-group list-group-unbordered mb-3">
               <li class="list-group-item">
                  <b>Último acesso</b> <a class="float-right"><?= date('d/m/Y \à\s H:i:s', strtotime(session('last_login'))) ?></a>
               </li>
            </ul>
            <a href="<?= base_url('logout') ?>" class="btn btn-primary btn-block"><b>Sair</b></a>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="card card-primary card-outline">
         <div class="card-body box-profile">
            <p class="login-box-msg">Dados pessoais</p>
            <form action="<?= current_url(); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
               <div class="form-group row">
                  <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="name" id="nome" placeholder="Nome" value="<?= session('name') ?>" required />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?= session('login') ?>" required />
                  </div>
               </div>
               
               <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                     <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= session('email') ?>" required />
                  </div>
               </div>

               <div class="form-group row">
                  <label for="customFile" class="col-sm-2 col-form-label">Foto</label>
                  <div class="col-sm-10">
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="customFile" name="picture" />
                           <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                        </div>
                     </div>
                  </div>
               </div>
               <p class="login-box-msg">Alterar senha ( Deixe em branco caso não deseje alterar )</p>
               <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Senha</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="repassword" class="col-sm-2 col-form-label">Repita a senha</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Repita a senha">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                     <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>