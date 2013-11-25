<?php

	class pessoa_model extends CI_Model{
		var $id;
		var $nome;
		var $telefone;
		var $email;
		var $bairro;
		var $rua_numero;
		var $status;
		var $foto;
		var $sexo;


		function recuperaPorId($id)
		{
			$sqlPessoa = 'SELECT 
							p.id AS id, p.nome as nome, p.email AS email, p.foto AS foto,
							p.telefone AS telefone, p.bairro AS bairro,
							p.sexo AS sexo, p.data_nascimento AS data_nascimento, p.data_batismo AS data_batismo,
							p.rua_numero AS rua_numero, s.descricao AS status, s.id AS status_id
						FROM 
							pessoa AS p LEFT JOIN status AS s ON p.status = s.id
						WHERE 
							p.id = ?';

			//$this->db->select('id, nome');
			///$result = $this->db->get_where('pessoa',array('id' => $id));
			$result = $this->db->query($sqlPessoa, array($id));
			return $result->row();
		}

		function recuperaNome($id){
			$this->db->select('nome');
			$result = $this->db->get_where('pessoa',array('id' => $id));
			return $result->row();
		}
		
		function recuperaTodos()
		{
			$sqlPessoa = 'SELECT 
								p.id AS id, p.nome as nome, p.foto AS foto,
								p.sexo AS sexo, p.data_nascimento AS data_nascimento, p.data_batismo AS data_batismo,
								p.telefone AS telefone, s.descricao AS status, s.id AS status_id
							FROM 
								pessoa AS p LEFT JOIN status AS s ON p.status = s.id
							ORDER BY
								p.nome ASC';
			
			//$this->db->select('id, nome');
			//$this->db->order_by('nome','asc');
			//$result = $this->db->get('pessoa');
			$result = $this->db->query($sqlPessoa);
			return $result->result();
		}

		function recuperaTodosAtivos()
		{
			$sqlPessoa = "SELECT 
								p.id AS id, p.nome as nome, p.foto AS foto,
								p.sexo AS sexo, p.data_nascimento AS data_nascimento, p.data_batismo AS data_batismo,
								p.telefone AS telefone, s.descricao AS status, s.id AS status_id
							FROM 
								pessoa AS p LEFT JOIN status AS s ON p.status = s.id
							WHERE
								p.status <> 4
							ORDER BY
								p.nome ASC";
			
			$result = $this->db->query($sqlPessoa);
			return $result->result();
		}

		function criar($arr){
			
			$data_nascimento = dataMaskReverse($_POST['data_nascimento']);
			$data_batismo = dataMaskReverse($_POST['data_batismo']);

			$telefone = preg_replace('/\D+/', '', $_POST['telefone']);
			$sql = "INSERT INTO pessoa (nome, telefone, email, bairro, rua_numero, status, sexo, data_nascimento, data_batismo) VALUES ('$_POST[nome]', '$telefone', '$_POST[email]','$_POST[bairro]', '$_POST[rua_numero]', $_POST[status], '$_POST[sexo]', '$data_nascimento', '$data_batismo') RETURNING id";
			
			
			$resultPessoa = pg_query($sql);

			$row = pg_fetch_row($resultPessoa);
			$idPessoa = $row[0];

			return $idPessoa;
		}

		function atualizar($arr){
			if(!empty($_POST['data_nascimento'])){
				$data_nascimento = ", data_nascimento = '".dataMaskReverse($_POST['data_nascimento'])."'";
			} else{
				$data_nascimento = '';
			}
			if(!empty($_POST['data_batismo'])){
				$data_batismo = ", data_batismo = '".dataMaskReverse($_POST['data_batismo'])."'";
			} else{
				$data_batismo = '';
			}
			$telefone = preg_replace('/\D+/', '', $arr['telefone']);
			
			$sql = "UPDATE 
						pessoa
   					SET 
   						nome='$arr[nome]', telefone='$telefone', email='$arr[email]', 
   						bairro='$arr[bairro]', rua_numero='$arr[rua_numero]', status='$arr[status]', sexo='$arr[sexo]'
   						$data_nascimento $data_batismo
 					WHERE 
 						id = $arr[id]";


			$resultPessoa = pg_query($sql);

			return $arr['id'];
		}

		function excluir($id){
			$sql = "UPDATE 
						pessoa
   					SET 
   						status='4'
 					WHERE 
 						id = $id";


			$resultPessoa = pg_query($sql);

			return $id;
		}

	}

?>