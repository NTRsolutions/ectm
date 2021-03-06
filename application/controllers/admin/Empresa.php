<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        
       $this->load->model('empresa_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Empresas';
        $data['empresa'] = $this->empresa_model->select('empresaaereo');
        $data['main_content'] = $this->load->view('admin/empresa/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function add()
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

            $data = $this->security->xss_clean($data);

            //-- check duplicate email
            $nomeempresa = $this->empresa_model->check_nome($_POST['nomeempresa']);

            if (empty($nomeempresa)) {
                $empresa_id = $this->empresa_model->insert($data, 'empresaaereo');
            
                $this->session->set_flashdata('msg', ' Empresa cadastrada com sucesso');
                redirect(base_url('admin/empresa/empresa_lista'));
            } else {
                $this->session->set_flashdata('error_msg', ' Empresa j&aacute existe, tente outra!');
                redirect(base_url('admin/empresa'));
            }
            
        }
    }

    public function empresa_lista()
    {
    	//$arrListaUsuario = $this->replogin->getAll(array('idempresa' => $this->session->userdata("logado")));
    	
    	$data['empresas'] = $this->empresa_model->get_all_empresas();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_empresa_total();
        $data['main_content'] = $this->load->view('admin/empresa/empresa_lista', $data, TRUE);
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

            $this->empresa_model->edit_option($data, $id, 'empresaaereo');
            $this->session->set_flashdata('msg', ' Informa&ccedil;&atilde;o alterada com sucesso');
            redirect(base_url('admin/empresa/empresa_lista'));

        }

        $data['user'] = $this->empresa_model->get_empresa_info($id);
        $data['main_content'] = $this->load->view('admin/empresa/edit_empresa', $data, TRUE);
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