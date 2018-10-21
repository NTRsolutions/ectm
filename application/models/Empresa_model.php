<?php
class Empresa_model extends CI_Model {

    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);        
        return $this->db->insert_id();
    }

    //-- edit function
    function edit_option($action, $id, $table){
        $this->db->where('idempresa',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- update function
    function update($action, $id, $table){
        $this->db->where('idempresa',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- delete function
    function delete($id,$table){
        $this->db->delete($table, array('idempresa' => $id));
        return;
    }


    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('idempresa','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    public function check_nome($nome){
    	$this->db->select('*');
    	$this->db->from('empresaaero');
    	$this->db->where('nomeempresa', $nome);
    	$this->db->limit(1);
    	$query = $this->db->get();
    	if($query->num_rows() == 1) {
    		return $query->result();
    	}else{
    		return false;
    	}
    }
    
    
    //-- select by id
    function select_option($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('idempresa', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 


    //-- select by id
    function get_item_by_id($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('idempresa', $id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    } 

    //get category
    public function get_category($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('empresaaero');
        return $query->row();
    }


    //-- get categories
    function get_categories(){
        $this->db->select();
        $this->db->from('empresaaero');
        $this->db->where('idempresa', 0);
        $this->db->order_by('idempresa', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 

    //-- get sub categories
   /* function get_sub_categories(){
        $this->db->select();
        $this->db->from('empresaaero');
        $this->db->where('parent_id !=', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }*/


    //-- get categories
    function get_all_empresas($idempresa=null){
        $this->db->select('idempresa,cnpj,nomeempresa,endoperacional,cidade,bairro,taxiaereo,chetanumero,oficinamnt,chenumero,ddd,telefone,telefone1,razaosocial,responsavelnome,observacoes');
        $this->db->from('empresaaero');
        $this->db->where('idempresa =', $idempresa);
        $this->db->order_by('idempresa', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        
        return $query;
    } 

    //-- count active, inactive and total user
    function get_empresa_total(){
    	$this->db->select('*');
    	$this->db->select('count(*) as total');
    	$this->db->select('(SELECT count(empresaaero.idempresa)
                            FROM empresaaero
                            WHERE (user.status = 1)
                            )',TRUE);
    	$this->db->from('empresaaero');
    	$query = $this->db->get();
    	$query = $query->row();
    	return $query;
    }
    
    function get_empresa_info($id){
    	$this->db->select('*');
    	$this->db->from('empresaaero');
    	$this->db->where('idempresa',$id);
    	$query = $this->db->get();
    	$query = $query->row();
    	return $query;
    }
    

 
}