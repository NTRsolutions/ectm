

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"> Empresa</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Alterar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
            </div>
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Alterar <a href="<?php echo base_url('users/empresa/empresa_lista') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> Voltar </a></h4>

                </div>
                
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('users/empresa/update/'.$empresa->idempresa) ?>" class="form-horizontal" novalidate>
                        
                        <input type="hidden" name="idempresa" value="<?php echo $empresa->idempresa; ?>" />
                        
                        <div class="form-body">
                            <br>

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label class="control-label">CNPJ </label>
                                         <input type="text" name="cnpj" class="form-control" value="<?php echo $empresa->cnpj; ?>">
                                    </div>
                                </div>
                                <!--/span-->
							</div>


                            <div class="row p-t-20">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label class="control-label">Nome Fantasia </label>
                                         <input type="text" name="nomeempresa" class="form-control" value="<?php echo $empresa->nomeempresa; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label">Endere&ccedil;o Operacional</label>
                                         <input type="text" name="endoperacional" class="form-control" value="<?php echo $empresa->endoperacional; ?>">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label class="control-label">Raz&atilde;o Social </label>
                                         <input type="text" name="razaosocial" class="form-control" value="<?php echo $empresa->razaosocial; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label">Respons&aacute;vel </label>
                                         <input type="text" name="responsavelnome" class="form-control" value="<?php echo $empresa->responsavelnome; ?>">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>



                            <div class="row p-t-20">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label class="control-label">Bairro </label>
                                         <input type="text" name="bairro" class="form-control" value="<?php echo $empresa->bairro; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label">Cidade</label>
                                         <input type="text" name="cidade" class="form-control" value="<?php echo $empresa->cidade; ?>" >
                                     </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row p-t-20">
                                <div class="col-md-6">

			                        <div class="form-group">
			                            <div class="checkbox checkbox-success">
			                                <input name="taxiaereo" id="taxiaereo"  <?php  if($empresa->taxiaereo == 1) { echo ' checked="checked" '; } ?>  value="1"  type="checkbox">
			                                <label for="taxiaereo" > T&aacute;xi A&eacute;reo </label>
			                            </div>
			                            
                                         <input type="text" name="chetanumero" class="form-control" value="<?php echo $empresa->chetanumero;?>" placeholder="CHETA" >
			                            
			                        </div>

                                </div>
                                <!--/span-->
                                <div class="col-md-6">

			                        <div class="form-group">
			                            <div class="checkbox checkbox-success">
			                                <input  name="oficinamnt" id="oficinamnt" <?php  if($empresa->oficinamnt == 1) { echo ' checked="checked" '; } ?> value="1"  type="checkbox">
			                                <label for="oficinamnt" > Empresa de Manuten&ccedil;&atilde;o </label>
			                            </div>

                                      <input type="text" name="chenumero" class="form-control" value="<?php echo $empresa->chenumero; ?>" placeholder="CHE" >

			                        </div>

                                </div>
                                <!--/span-->
                            </div>

                            <div class="row p-t-20">
                                <div class="col-md-4">
                                
                                    <div class="form-group">
                                        <label class="control-label">DDD</label>
                                         <input type="text" name="ddd" class="form-control" value="<?php echo $empresa->ddd; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="control-label">Telefone</label>
                                         <input type="text" name="telefone" class="form-control" value="<?php echo $empresa->telefone; ?>">
                                     </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="control-label">Celular </label>
                                         <input type="text" name="telefone1" class="form-control small" value="<?php echo $empresa->telefone1; ?>">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Observa&ccedil;&otilde;es </label>
                                        <div class="col-md-9 controls">
                                            <textarea class="form-control" name="observacoes" ><?php echo $empresa->observacoes; ?> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>



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
                </div>
            </div>
        </div>
    </div>

     <!-- End Page Content -->

</div>