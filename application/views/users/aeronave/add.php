<!DOCTYPE html>
<html lang="pt-br">


<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Aeronave</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Nova aeronave</li>
            </ol>
        </div>
        
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Nova aeronave <a href="<?php echo base_url('users/aeronave/aeronave_lista') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> Voltar </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('users/aeronave/add') ?>" class="form-horizontal" novalidate>
                        
                      <input type="hidden" name="idempresa" value="<?php echo $this->session->userdata('idempresa'); ?>" />
                                              
                        <div class="form-body">
                            <br>

                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Prefixo </label>
                                         <input type="text" name="prefixo" class="form-control" required data-validation-required-message="Prefixo &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Fabricante</label>
                                        <select name="fabricante" id="fabricante" class="selectpicker" data-style="form-control btn-secondary">
							                <?php
							                foreach ($modelos as $modelo) 
							                {
							                   echo '<option value="'.$modelo['MD_ID'].'"';
							                   echo '>'.$modelo['MD_DESCRICAO'].'</option>';
							                }
							                ?>
                                        </select>
                                     </div>
                                </div>
                                <!--/span-->
                                
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Modelo </label>
							            <select name="modelo" class="selectpicker" data-style="form-control btn-secondary" id="modelo">
							                <?php
							                foreach ($modelos as $modelo) 
							                {
							                   echo '<option value="'.$modelo['MD_ID'].'"';
							                   echo '>'.$modelo['MD_DESCRICAO'].'</option>';
							                }
							                ?>
							            </select>
                                        
                                        
                                     </div>
                                    </div>
                                </div>

							</div>

                            <div class="row p-t-20">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Propriet&aacute;rio </label>
                                         <input type="text" name="proprietario" class="form-control" required data-validation-required-message="Propriet&aacute;rio &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                
                                 <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                           <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-4"></i>Imagem</span>
                                             <input type="file" class="upload">                                    
                                           </div>
                                    </div>
                                </div>
                                
                                
							</div>

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Part Number </label>
                                         <input type="text" name="partnumber" class="form-control" required data-validation-required-message="Part Number &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Serial Number</label>
                                         <input type="text" name="serialnumber" class="form-control" required data-validation-required-message="Serial Number &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label class="control-label">Descri&ccedil;&atilde;o da Aeronave</label>
                                         <input type="text" name="descricao" class="form-control" data-validation-required-message="Descri&ccedil;&atilde;o &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Local de Fabrica&ccedil;&atilde;o </label>
                                         <input type="text" name="localfab" class="form-control" required data-validation-required-message="Local de Fabrica&ccedil;&atilde;o &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                
                                
                                
                            </div>

                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Data de Fabrica&ccedil;&atilde;o </label>
                                         <input type="date" name="dtfabricaocao" placeholder="dd/mm/yyyy" class="form-control" required data-validation-required-message="Data de Fabrica&ccedil;&atilde;o &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"> N&uacute;meros de Assentos </label>
                                         <input type="number" name="assentos" class="form-control" data-validation-required-message="  N&uacute;meros de Assentos &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Peso Vazio </label>
                                         <input type="number" name="pesovazio" class="form-control" data-validation-required-message="Peso Vazio &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Peso Carregado </label>
                                         <input type="number" name="pesocarregado" class="form-control" data-validation-required-message="Peso Carregado &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->
                            

                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">TSN(Time Since New) </label>
                                         <input type="number"  name="tsn" class="form-control" placeholder="0.00" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required data-validation-required-message="TSN &eacute; obrigat&oacute;rio">   
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">CSN(Cicle Since New)</label>
                                         <input type="number" name="csn" class="form-control" required data-validation-required-message="CSN &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Data da Informa&ccedil;&atilde;o </label>
                                         <input type="date" name="dtinformacao" class="form-control" required data-validation-required-message="Data da Informa&ccedil;&atilde;o &eacute; obrigat&oacute;rio">   
                                     </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->

                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Gravar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        
                    </form>
                </div> <!-- fim form -->
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>

</html>