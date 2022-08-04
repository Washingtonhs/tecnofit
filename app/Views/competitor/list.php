<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-primary card-outline">
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Data Cadastro</th>
                           <th>Nome</th>
                           <th>Ações</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($competitors as $c) { ?>
                        <tr>
                           <td><?= date('d/m/Y', strtotime($c->created_at)) ?></td>
                           <td><?= $c->name; ?></td>
                           <td class="project-actions text-right">
                              <a class="btn btn-info btn-sm" href="<?= base_url('competitor/edit/'.$c->id); ?>">
                                 <i class="fas fa-pencil-alt"></i> Editar</a>

                              <a class="btn delete btn-danger btn-sm" href="<?= base_url('competitor/delete/'.$c->id); ?>">
                                 <i class="fas fa-trash"></i> Deletar</a>
                           </td>
                        </tr>
                     <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.content -->