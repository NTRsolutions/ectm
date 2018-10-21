

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Empresa</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dados da Empresa</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                    </div>
                </div>
            </div>
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

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th data-sortable="false">CNPJ</th>
                                    <th data-sortable="false">Nome Empresa</th>
                                    <?php if ($empresas[0]['taxiaereo']!= 0):?>
                                    <th data-sortable="false" >CHETA</th>
                                    <?php endif; ?>
                                    <?php if ($empresas[0]['oficinamnt']!=0):?>
                                      <th data-sortable="false">CHE</th>
                                    <?php endif; ?>
                                    <th data-sortable="false">Respons&aacute;vel</th>
                                    <th data-sortable="false">A&ccedil;&atilde;o</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($empresas as $empresa): ?>
                                
                                <tr>

                                    <td><?php echo $empresa['cnpj']; ?></td>
                                    <td><?php echo $empresa['nomeempresa']; ?></td>
                                    <?php if ($empresas[0]['taxiaereo']!=0):?>
                                    <td><?php echo $empresa['chetanumero']; ?></td>
                                    <?php endif; ?>
                                    <?php if ($empresas[0]['oficinamnt']!=0):?>
                                    <td><?php echo $empresa['chenumero']; ?></td>
                                    <?php endif; ?>
                                    <td><?php echo $empresa['responsavelnome']; ?></td>

                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('users/empresa/update/'.$user['id']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>

                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $user['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>


                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('users/empresa/update/'.$empresa['idempresa']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            <?php endif; ?>

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



<?php foreach ($empresas as $empresa): ?>
 
<div class="modal fade" id="confirm_delete_<?php echo $empresa['idempresa'];?>">
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
                <a href="<?php echo base_url('users/empresa/delete/'.$empresa['id']) ?>" class="btn btn-danger">Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>


<?php endforeach ?>

<script>


$(document).ready(function () {
  $('#example23').DataTable({
	  "searching": false;
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>


