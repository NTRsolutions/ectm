<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aeronave extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();

        $this->load->model('common_model');
       $this->load->model('aeronave_model');
       $this->load->model('login_model');
       $this->load->model('modelo_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Aeronaves';
        $data['aeronave'] = $this->aeronave_model->select('tbaeronave');
        $data['modelos'] = $this->modelo_model->select('tbmodelo');
        $data['main_content'] = $this->load->view('users/aeronave/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function add()
    {   
    	
        if ($_POST) {

            $data = array(
					'idempresa'=> $_POST['idempresa'],
					'prefixo'=> $_POST['prefixo'],
					'partnumber'=> $_POST['partnumber'],
					'serialnumber'=> $_POST['serialnumber'],
					'descricao'=> $_POST['descricao'],
					'fabricante'=> $_POST['fabricante'],
					'localfab'=> $_POST['localfab'],
					'dtfabricacao'=> $_POST['dtfabricacao'],
					'tsn'=> $_POST['tsn'],
					'csn'=> $_POST['csn'], 
					'dtinformacao'=> $_POST['dtinformacao'],
					'assentos'=> $_POST['assentos'],
					'pesovazio'=> $_POST['pesovazio'],
					'pesocarregado'=> $_POST['pesocarregado'],
					'proprietario'=> $_POST['proprietario'], 
					'datacadastro'=> '', 
					'imagem'=> '', 
					'excluido'=> '',  
					'modelo'=> $_POST['modelo'],  
					'tipoproduto'=> 'A'    
            		);

            $data = $this->security->xss_clean($data);

            //-- check duplicate data
            $prefixo = $this->Aeronave_model->check_nome($_POST['idempresa'],$_POST['prefixo']);

            if (empty($prefixo)) {
                $aeronave_id = $this->Aeronave_model->insert($data, 'tbaeronave');
            
                $this->session->set_flashdata('msg', ' Aeronave cadastrada com sucesso');
                redirect(base_url('users/aeronave/aeronave_lista'));
            } else {
                $this->session->set_flashdata('error_msg', ' Aeronave j&aacute cadastrada, tente outra!');
                redirect(base_url('users/aeronave'));
            }
            
        }
    }

    public function aeronave_lista()
    {
    	
    	//$arrListaUsuario = $this->replogin->getAll(array('idempresa' => $this->session->userdata("logado")));
      
    	$data['aeronaves'] = $this->aeronave_model->get_all_aeronaves($this->session->userdata('idempresa'));
        $data['country'] = $this->common_model->select('country');
        //$data['count'] = $this->empresa_model->get_empresa_total();
        $data['main_content'] = $this->load->view('users/aeronave/aeronaves', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
    	
        if ($_POST) {

        	$data = array(
        			'idempresa'=> $_POST['idempresa'],
        			'cnpj'=> $_POST['cnpj'],
        			'nomeempresa'=> $_POST['nomeempresa'],
        			'endoperacional'=> $_POST['endoperacional'],
        			'cidade'=> $_POST['cidade'],
        			'bairro'=> $_POST['bairro'],
        			'taxiaereo'=> $_POST['taxiaereo'],
        			'chetanumero'=> $_POST['chetanumero'],
        			'oficinamnt'=> $_POST['oficinamnt'],
        			'chenumero'=> $_POST['chenumero'],
        			'ddd'=> $_POST['ddd'],
        			'telefone'=> $_POST['telefone'],
        			'telefone1'=> $_POST['telefone1'],
        			'razaosocial'=> $_POST['razaosocial'],
        			'responsavelnome'=> $_POST['responsavelnome'],
        			'observacoes'=> $_POST['observacoes']
        	);

            $this->empresa_model->edit_option($data, $id, 'empresaaero');
            $this->session->set_flashdata('msg', ' Informa&ccedil;&atilde;o alterada com sucesso');
            redirect(base_url('users/empresa/empresa_lista'));

        }

        
        $data['empresa'] = $this->empresa_model->get_empresa_info($id);
        $data['main_content'] = $this->load->view('users/empresa/update', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    //-- delete user
    public function delete($id)
    {
        $this->empresa_model->delete($id,'empresaaero'); 
        $this->session->set_flashdata('msg', 'Empresa exclu&iacute;da com sucesso!'); 
        redirect(base_url('admin/empresa/empresa_lista'));
    }


}