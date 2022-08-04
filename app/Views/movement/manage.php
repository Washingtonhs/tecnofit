<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-primary card-outline">
               <div class="card-body">
                  <form action="<?= current_url(); ?>" method="post">
                        
                     <div class="form-group">
                        <label for="name">Parceiro</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nome" required value="<?= (!empty($movement)) ? $movement->name : '' ?>">
                     </div>

                     <button type="submit" class="btn btn-primary"><?= (!empty($movement)) ? 'Atualizar' : 'Cadastrar' ?></button>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.content -->