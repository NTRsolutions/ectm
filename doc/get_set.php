<html> 
<head> 
    <title>Gerador de Classes para PHP</title> 
    <style> 
        body, input, textarea { 
            font-family: verdana; 
            font-size: 12px;         
        } 
    </style>     
    <script type="text/javascript"> 
        function procuraEnter(evt) { 
            evt = (evt) ? evt : event 
            var c = (evt.which) ? evt.which : evt.keyCode 
            if (c == 13) { 
                callAjax(); 
                return false 
            } 
            return true 
        } 
        function procuraEnter(evt) { 
            evt = (evt) ? evt : event 
            var c = (evt.which) ? evt.which : evt.keyCode 
            if (c == 13) { 
                document.formulario.submit(); 
                return false 
            } 
            return true 
        } 
        function limpaCampos() { 
            document.getElementById('vars').value = ''; 
            document.getElementById('text_area').value = ''; 
        }         
    </script> 
</head> 
<body> 
    <form name="formulario" method="POST"> 
        <span style="font-size: 14px;"><b>Gerador de Classes para PHP</b></span><br><br> 
        <span style="font-size: 12px;">Preencha este campo com os nomes das vari�veis separando por espa�o.<br>Lembrando do primeiro nome ser o nome da classe</span><br> 
        <span style="font-size: 10px;"><b>Ex: </b>Cliente nome email dataNascimento cpf telefoneResidencial</span><br><br>
        <textarea rows="15" cols="100" name="vars" id="vars"><?php echo @$_POST['vars']; ?></textarea>
        <input type="submit" value="OK">&nbsp;<input type="button" value="Limpar" onclick="limpaCampos()"> 
    </form> 
    <textarea id="text_area" rows="1000" cols="500">
<?php
	$classes = trim(@$_POST['vars']);
	$classes = str_replace("\r\n","",$classes);
	$arrClasses = explode(";", $classes);
	
	//Caso indique uma pasta
	$pasta = null;
	
	function pegaAtt($att) {
		if (strpos($att,"(") > 0) { 
			return substr($att,0,strpos($att,"("));
		} else {
			return $att;		
		}
	}
	function pegaClass($att) {
		if (strpos($att,"(") > 0) {
			return substr($att,strpos($att,"(")+1, -1). " ";
		} else {
			return "";		
		}
	}
 	function escreve($nome,$txt,$pastaModel = null){
		//if($pasta == null) {
			$pasta = str_replace('get_set.php','',$_SERVER['SCRIPT_FILENAME'])."model/";
		//}

		@mkdir($pasta.$pastaModel);

		$pasta.= $pastaModel;

 		@unlink($pasta.'/'.$nome);
  		$fp = @fopen($pasta.'/'.$nome, "x+");
		@fwrite($fp, $txt);
		@fclose($fp);

		//file_put_contents($pasta.strtolower($nome), $txt);

		$fp = null;
	}
	
		
	
	foreach ($arrClasses as $classe) {
		$txt = "";
		while (strpos($classe, "  ")) $classe = str_replace("  ", " ", $classe);
		if ($classe) {
			$classe = explode(" ", $classe);
			$hua = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n";
			$hua.= "class Rep".(ucfirst($classe[0]))." extends CI_Model {\n";
			$tam = Count($classe);
			//$hua .= "\tprivate \$arr".ucfirst($classe[0]).";\n";

			$hua .= "\n";
			
			$hua .="\tpublic function __construct() {
\t\tparent::__construct();
\t\t\$this->load->model('".$classe[0].'/'.$classe[0]."dto');
\t}\n
\tpublic function __destruct() {
\t}\n\n";	
			$hua .= "\tpublic function getAll(\$limit = null, \$offset = null, \$where = null, \$like = null, \$order_by = null, \$group_by = null, \$selectColumns = null) {
\t\t\$arr".ucfirst($classe[0])." = array();
\t\tif (\$limit != null) {
\t\t\t\$this->db->limit(\$limit, \$offset);
\t\t}
\t\tif (\$where != null) {
\t\t\tforeach(\$where as \$key => \$value) {
\t\t\t\tif(is_array(\$value)) {
\t\t\t\t\t\$this->db->where_in(\$key,\$value);
\t\t\t\t} else {
\t\t\t\t\t\$this->db->where(\$key,\$value);
\t\t\t\t}
\t\t\t}
\t\t}
\t\tif (\$like != null) {
\t\t\t\$this->db->like(\$like);
\t\t}
\t\tif (\$order_by != null) {
\t\t\tif(is_array(\$order_by)) {
\t\t\t\tforeach(\$order_by as \$key => \$value) {
\t\t\t\t\t\$this->db->order_by(\$key, \$value);
\t\t\t\t}
\t\t\t} else {
\t\t\t\t\$this->db->order_by(\$order_by);
\t\t\t}
\t\t}
\t\tif (\$group_by != null) {
\t\t\tif(is_array(\$group_by)) {
\t\t\t\tforeach(\$group_by as \$key => \$value) {
\t\t\t\t\t\$this->db->group_by(\$value);
\t\t\t\t}
\t\t\t} else {
\t\t\t\t\$this->db->group_by(\$group_by);
\t\t\t}
\t\tif(\$selectColumns != null) {
\t\t\t\$this->db->select(\$selectColumns);
\t\t}
\t\t}";
// \t\t\$this->db->where(\"condicao <>\", REGISTRO_EXCLUIDO);
$hua .= "\r\n\t\t\$query = \$this->db->get ('".$classe[0]."');
\t\tforeach(\$query->result_array() as \$row ) {
\t\t\tarray_walk(\$row, 'decDb');
\t\t\t\$arr".ucfirst($classe[0])."[] = new ".ucfirst($classe[0]).'Dto'."(\r\n\t\t\t\t";
		for ($i = 1 ; $i < $tam ; $i++) {
			$hua .= "@\$row['".pegaAtt($classe[$i])."'],\r\n\t\t\t\t";		
		}
		$hua = substr($hua,0,-7);
$hua .= "\r\n\t\t\t);
\t\t}
\t\t\$query->free_result();
\t\treturn \$arr".ucfirst($classe[0]).";
\t}\n
\tpublic function getWhere(\$where = null, \$limit = null, \$offset = null) {
\t\treturn \$this->getAll(\$limit, \$offset, \$where);
\t}\r\n
\tpublic function getLike(\$like = null, \$limit = null, \$offset = null) {
\t\treturn \$this->getAll(\$limit, \$offset, null, \$like);
\t}\r\n
\tpublic function getId(\$id = null) {
\t\t\$arrObj = \$this->getAll(1, null, array('".pegaAtt($classe[1])."' => \$id));
\t\tif(isset(\$arrObj[0])) {
\t\t\treturn \$arrObj[0];
\t\t} else {
\t\t\treturn false;
\t\t}
\t}\n
\tpublic function salvar(".ucfirst($classe[0])."Dto \$obj) {
\t\t\$arrDados = array(\r\n\t\t\t";
		for ($i = 2 ; $i < $tam ; $i++) {
				$hua .= "'".pegaAtt($classe[$i])."' => \$obj->get".ucfirst(pegaAtt($classe[$i]))."(),\r\n\t\t\t";		
		}
		$hua = substr($hua,0,-6);
$hua .= "\r\n\t\t);
\t\tarray_walk_ci(\$arrDados);
\t\tif (\$obj->get".ucfirst($classe[1])."() === NULL) { 
\t\t\t\$ret = \$this->db->insert('".$classe[0]."', \$arrDados);
\t\t\t\$obj->set".ucfirst(pegaAtt($classe[1]))."(\$this->db->insert_id());
\t\t\treturn \$obj;
\t\t} else {
\t\t\t\$ret = \$this->db->update('".$classe[0]."', \$arrDados, array('".pegaAtt($classe[1])."' => \$obj->get".ucfirst(pegaAtt($classe[1]))."()));
\t\t}
\t\tif (\$ret == true) {		 
\t\t\treturn true;
\t\t}
\t}\n
\tpublic function excluir(".ucfirst($classe[0])."Dto \$obj) {
\t\t\$retUpd = \$this->db->delete('$classe[0]',array('".pegaAtt($classe[1])."' => \$obj->get".ucfirst(pegaAtt($classe[1]))."()));
\t\tif (\$retUpd == true) {
\t\t\treturn true;
\t\t}
\t}\n
}\n?>";

/*
m�todos add e upd

\tpublic function add(".ucfirst($classe[0])." \$obj) {
\t\t\$retIns = \$this->db->insert('".$classe[0]."',array(";
		for ($i = 2 ; $i < $tam ; $i++) {
				$hua .= "'".pegaAtt($classe[$i])."' => \$obj->get".ucfirst(pegaAtt($classe[$i]))."(),";		
		}
		$hua = substr($hua,0,-1);
$hua .= "));
\t\tif (\$retIns == true) {		 
\t\t\treturn true;
\t\t}
\t}\n
\tpublic function upd(".ucfirst($classe[0])." \$obj) {
\t\t\$retUpd = \$this->db->update('$classe[0]',array(";
		for ($i = 2 ; $i < $tam ; $i++) {
			$hua .= "'".pegaAtt($classe[$i])."' => \$obj->get".ucfirst(pegaAtt($classe[$i]))."(),";		
		}
		$hua = substr($hua,0,-1);
		$hua .= "),array('".pegaAtt($classe[1])."' => \$obj->get".ucfirst(pegaAtt($classe[1]))."()));
\t\tif (\$retUpd == true) {
\t\t\treturn true;
\t\t}
\t}\n
*/

	/**
	 * Come�a a constru��o da classe !!!
	 */


			$txt = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n";
			$txt .= "class ".ucfirst($classe[0])."Dto extends CI_Model {\n";	

			for ($i = 1 ; $i < $tam ; $i++) {
				$txt .= "\tprivate $".pegaAtt($classe[$i]).";\n";
			}
			$txt .= "\n";

			$txt .= "\tpublic function __construct (";
			for ($i = 1 ; $i < $tam-1 ; $i++) {
				$txt .= "$".pegaAtt($classe[$i])." = null, ";
			}
			if ($tam > 1)
				$txt .= "$".pegaAtt($classe[$i])." = null";
			$txt .= ") {\n";
			for ($i = 1 ; $i < $tam ; $i++) {
	        	$txt .= "\t\t\$this->set".ucfirst(pegaAtt($classe[$i]))."($".pegaAtt($classe[$i]).");\n";
			}
			$txt .= "\t}\n\n";
			
			$txt .= "\tpublic function __destruct () {\n";			
			$txt .= "\t}\n\n";			

	$txt .= "\tpublic function __toString () {
\t\treturn \$this->".pegaAtt($classe[1]).";\n\t}\n";			
			
for ($i = 1 ; $i < $tam ; $i++) {
	$txt .= "\tpublic function get".ucfirst(pegaAtt($classe[$i]))." () {
\t\treturn \$this->".pegaAtt($classe[$i]).";\n\t}\n";
				
	$txt .= "\tpublic function set".ucfirst(pegaAtt($classe[$i]))." (\$".pegaAtt($classe[$i]).") {
\t\t\$this->".pegaAtt($classe[$i])." = $".pegaAtt($classe[$i]).";\n\t}\n";
	
	//$txt .= "\tpublic function set".ucfirst(pegaAtt($classe[$i]))." (".ucfirst(pegaClass($classe[$i]))."$".pegaClass($classe[$i]).") {\n
	//\t\t\$this->".pegaAtt($classe[$i])." = $".pegaClass($classe[$i]).";\n\t}\n";
}
			$txt .= "}\n?>";
	    }
	    
	    //echo "\n--------------------------------------------------------------------------------------\n";
	    //echo $txt;
	    //echo "\n######################################################################################\n";
	    //echo $hua;
	    
	    //echo $txt;
		escreve(ucfirst(@$classe[0])."dto.php",     $txt,     @$classe[0]);
		escreve(ucfirst('rep'.@$classe[0].".php"), $hua, @$classe[0]);
		

	}
	//@unlink($pasta.'rep.php');
	//@unlink($pasta.'.php');
?>
	</textarea>
    <br><input type="button" onClick="document.getElementById('text_area').select();" value="Selecionar todo o texto">
    <br><br><font size=2 face=tahoma>
    Desenvolvido por: Roberto "Katabrok" Hugo<br>
    rhwp@hotlink.com <br>
    Aluno do PHP DEVELOPER<br>
    Desenvolvido por: Francisco Conrado<br>
	fracmt@gmail.com <br>
	Doido por PHP<br>
	</font>
</body> 
</html> 
