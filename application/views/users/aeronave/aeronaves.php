

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Aeronaves</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Lista de Aeronaves</li>
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

                    <a href="<?php echo base_url('users/aeronave') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Nova Aeronave</a> &nbsp;


                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th data-sortable="false">Pr&eacute;fixo</th>
                                    <th data-sortable="false">Fabricante</th>
                                    <th data-sortable="false" >Propriet&aacute;rio</th>
                                    <th data-sortable="false" >Serial Number</th>
                                    <th data-sortable="false" >TSN</th>
                                    <th data-sortable="false">CSN</th>
                                    <th data-sortable="false">&Uacute;tima Atualiza&ccedil;&atilde;o </th>
                                    <th data-sortable="false">A&ccedil;&atilde;o </th>
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($aeronaves as $aeronave): ?>
                                
                                <tr>

                                    <td><?php echo $aeronave['AER_PREFIXO']; ?></td>
                                    <td><?php echo $empresa['AER_FABRICANTE']; ?></td>
                                    <td><?php echo $empresa['AER_PROPRIETARIO']; ?></td>
                                    <td><?php echo $empresa['AER_SERIAL_NUMBER']; ?></td>
                                    <td><?php echo $empresa['AER_TSN']; ?></td>
                                    <td><?php echo $empresa['AER_CSN']; ?></td>
                                    <td><?php echo $empresa['AER_CSN']; ?></td>
                                    <td><?php echo $empresa['atualizacao']; ?></td>


                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('users/aeronave/update/'.$aeronave['AER_ID']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>

                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $user['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>


                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('users/aeronave/update/'.$aeronave['AER_ID']) ?>" data-toggle="tooltip" data-original-title="Alterar"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
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



<?php foreach ($aeronaves as $aeronave): ?>
 
<div class="modal fade" id="confirm_delete_<?php echo $aeronave['AER_ID'];?>">
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
                <a href="<?php echo base_url('users/aeronave/delete/'.$aeronave['AER_ID']) ?>" class="btn btn-danger">Delete</a>
                
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


