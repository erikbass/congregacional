<?php

	class visitante_model extends CI_Model{
		var $id;
		var $data;
		var $visita;
		var $pessoa;
		var $convidado_por;
		
		function recuperaPorId($id)
		{
			$sqlVisitante = 'SELECT 
								v.id AS id, p.id AS id_pessoa, p.nome as nome, v.data AS data_visita,
								v.convidado_por AS convidado_por,
								p.telefone AS telefone, p.bairro AS bairro, p.email AS email,
								p.rua_numero AS rua_numero, s.descricao AS status, s.id AS status_id
							FROM 
								visitante AS v LEFT JOIN pessoa AS p ON v.pessoa = p.id
								LEFT JOIN status AS s ON p.status = s.id
							WHERE 
								v.id = ?';

			$result = $this->db->query($sqlVisitante, array($id));
			return $result->row();
		}

		function recuperaTodos()
		{
			$this->db->select('id, pessoa');
			$this->db->order_by('pessoa','asc');
			//$result = $this->db->get('visitante');
			$result = $this->db->query('SELECT 
											v.id AS id, p.id AS id_pessoa, p.nome as nome, v.data AS data_visita,
											p.telefone AS telefone, p.bairro AS bairro,
											p.rua_numero AS rua_numero, s.descricao AS status, s.id AS status_id
										FROM 
											visitante AS v LEFT JOIN pessoa AS p ON v.pessoa = p.id
											LEFT JOIN status AS s ON p.status = s.id
										WHERE
											p.status = 3
										ORDER BY
											v.data DESC');
			return $result->result();
		}

		function ultimos(){
			$result = $this->db->query('SELECT 
											v.id AS id, p.id AS id_pessoa, p.nome as nome, v.data AS data_visita,
											p.telefone AS telefone, p.bairro AS bairro,
											p.rua_numero AS rua_numero, s.descricao AS status, s.id AS status_id
										FROM 
											visitante AS v LEFT JOIN pessoa AS p ON v.pessoa = p.id
											LEFT JOIN status AS s ON p.status = s.id
										WHERE
											p.status = 3
										ORDER BY
											v.data DESC
										LIMIT 5');
			return $result->result();
		}

		function criar($arr){
			$data = substr($arr['data'],6,4)."-".substr($arr['data'],3,2)."-".substr($arr['data'],0,2)." 00:00:00";
			
			$telefone = preg_replace('/\D+/', '', $arr['telefone']);

			$sqlPessoa = "INSERT INTO pessoa (nome, telefone, email, rua_numero, bairro, status) VALUES ('$arr[nome]', '$telefone', '$arr[email]', '$arr[rua_numero]', '$arr[bairro]', '$arr[status]') RETURNING id";
			//$idPessoa = $this->db->query($sqlPessoa);

			$resultPessoa = pg_query($sqlPessoa);

			$row = pg_fetch_row($resultPessoa);
			$idPessoa = $row[0];


			$sqlVisitante = "INSERT INTO visitante (data, visita, pessoa) VALUES ('$data', $arr[visita], $idPessoa)";
			$vis = $this->db->query($sqlVisitante);			
		}

		function contagemPorSexo($sexo){
			$result = $this->db->query("SELECT 
											v.id AS contagem
										FROM 
											visitante AS v LEFT JOIN pessoa AS p ON v.pessoa = p.id
											LEFT JOIN status AS s ON p.status = s.id
										WHERE
											p.sexo = '$sexo'");
			$qtde = $result->num_rows();
			return $qtde;
		}
	}

?>