

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Usu&aacute;rios</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Listar Usu&aacute;rios</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-12">

            <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <div class="card">

                <div class="card-body">

                <?php if ($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin/user') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Novo usu&aacute;rio</a> &nbsp;

                    <a href="<?php echo base_url('admin/user/power') ?>" class="btn btn-info"><i class="fa fa-user-o"></i> &nbsp; Adicionar permiss&otilde;es</a>
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('users/user') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Novo</a>
                    <?php endif; ?>
                <?php endif ?>
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th data-sortable="false" >Nome</th>
                                    <th data-sortable="false" >Email</th>
                                    <th data-sortable="false" >Celular</th>
                                    <th data-sortable="false" >Pa&iacute;s</th>
                                    <th data-sortable="false" >Status</th>
                                    <th data-sortable="false" >Fun&ccedil;&otilde;es</th>
                                    <th data-sortable="false" >Cadastro</th>
                                    <th data-sortable="false" >A&ccedil;&otilde;es</th>
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                
                                <tr>

                                    <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['mobile']; ?></td>
                                    <td><?php echo $user['country']; ?></td>

                                    <td>
                                        <?php if ($user['status'] == 0): ?>
                                            <div class="label label-table label-danger">Inativo</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">Ativo</div>
                                        <?php endif ?>
                                    </td>
                                    <td width="10%">
                                        <?php if ($user['role'] == 'superv'): ?>
                                            <div class="label label-table label-info"><i class="fa fa-user"></i>supervisor</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">us&aacute;rio</div>
                                        <?php endif ?>
                                    </td>

                                    <td><?php echo my_date_show_time($user['created_at']); ?></td>
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('users/user/update/'.$user['id']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>

                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $user['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>


                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('users/user/update/'.$user['id']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            <?php endif; ?>
                                            <?php if(check_power(3)):?>
                                                <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $user['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            <?php endif; ?>

                                        <?php endif ?>

                                        
                                        
                                        <?php if ($user['status'] == 1): ?>
                                            <a href="<?php echo base_url('users/user/deactive/'.$user['id']) ?>" data-toggle="tooltip" data-original-title="Desativar"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                                        <?php else: ?>
                                            <a href="<?php echo base_url('users/user/active/'.$user['id']) ?>" data-toggle="tooltip" data-original-title="Ativar"> <i class="fa fa-check text-info m-r-10"></i> </a>
                                        <?php endif ?>
                                        
                                    </td>
                                </tr>

                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Page Content -->

</div>



<?php foreach ($users as $user): ?>
 
<div class="modal fade" id="confirm_delete_<?php echo $user['id'];?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
            <div class="form-body">
                
                Tem creteza que deseja excluir ? <br> <hr>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancela</button>
                <a href="<?php echo base_url('admin/user/delete/'.$user['id']) ?>" class="btn btn-danger">Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>


<?php endforeach ?>

<script>


$(document).ready(function () {
  $('#example23').DataTable({
	  "searching": false ;
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>


