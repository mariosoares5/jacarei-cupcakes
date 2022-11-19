<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function getSituacao($dataI,$dataF,$proced,$paciente,$nasc) {
		//[protes_saidas_remessas]
		$requisicao1 = "SELECT eDataEntrada, eNomePaciente, eDataNascimento, pNomeProcedimento, eQuantidadeVagas, eCID10, eUrgente, eObservacao, rNomeUnidade, soNomeUnidade, mDescricaoMotivo, sObservacao, dNomeUnidade, fDataRemessa, fObservacaoRemessa, sIdRemessa
		FROM protes_saidas_remessas WHERE ";
		if(!empty($paciente)) $requisicao1 .= "(eNomePaciente LIKE '%".$paciente."%') AND ";
        if(!empty($nasc)) $requisicao1 .= "(eDataNascimento='".$nasc."') AND ";
        if(!empty($proced)) $requisicao1 .= "(pNomeProcedimento LIKE '%".$proced."%') AND ";
        $requisicao1 .= "(eDataEntrada BETWEEN '".$dataI."' AND '".$dataF."') ORDER BY eDataEntrada DESC, sIdSaida DESC";
		$query = $this->db->query($requisicao1); $results1 = $query->result(); //executando requisicao
		
		//[protes_saidas_semremessa]
        $requisicao2 = "SELECT eDataEntrada, eNomePaciente, eDataNascimento, pNomeProcedimento, eQuantidadeVagas, eCID10, eUrgente, eObservacao, rNomeUnidade, soNomeUnidade, mDescricaoMotivo, sObservacao
		FROM protes_saidas_semremessa WHERE ";
		if(!empty($paciente)) $requisicao2 .= "(eNomePaciente LIKE '%".$paciente."%') AND ";
        if(!empty($nasc)) $requisicao2 .= "(eDataNascimento='".$nasc."') AND ";
        if(!empty($proced)) $requisicao2 .= "(pNomeProcedimento LIKE '%".$proced."%') AND ";
        $requisicao2 .= "(eDataEntrada BETWEEN '".$dataI."' AND '".$dataF."') ORDER BY eDataEntrada DESC, sIdSaida DESC";
		$query = $this->db->query($requisicao2); $results2 = $query->result(); //executando requisicao
		
		//[protes_entradas_semsaida]
		$requisicao3 = "SELECT eDataEntrada, eNomePaciente, eDataNascimento, pNomeProcedimento, eQuantidadeVagas, eCID10, eUrgente, eObservacao, rNomeUnidade, soNomeUnidade
		FROM protes_entradas_semsaida WHERE ";
		if(!empty($paciente)) $requisicao3 .= "(eNomePaciente LIKE '%".$paciente."%') AND ";
        if(!empty($nasc)) $requisicao3 .= "(eDataNascimento='".$nasc."') AND ";
        if(!empty($proced)) $requisicao3 .= "(pNomeProcedimento LIKE '%".$proced."%') AND ";
        $requisicao3 .= "(eDataEntrada BETWEEN '".$dataI."' AND '".$dataF."') ORDER BY eDataEntrada DESC, eIdEntrada DESC";
		$query = $this->db->query($requisicao3); $results3 = $query->result(); //executando requisicao
		
		//depois de executar as requisicoes, mesclar os resultados na matriz resposta
		$resposta = array();
		foreach ($results1 as $row) {
			$resposta[] =array(
				$eDataEntrada = (substr($row->eDataEntrada,4,1)=="/" AND strlen($row->eDataEntrada)==10) ? substr($row->eDataEntrada,8,2)."/".substr($row->eDataEntrada,5,2)."/".substr($row->eDataEntrada,0,4) : $row->eDataEntrada,
				$eNomePaciente = $row->eNomePaciente,
				$eDataNascimento = $row->eDataNascimento,
				$pNomeProcedimento = $row->pNomeProcedimento,
				$eQuantidadeVagas = $row->eQuantidadeVagas,
				$eCID10 = $row->eCID10,
				$eUrgente = $row->eUrgente == 1 ? $_SESSION['nivel1_Classificacao'] : $_SESSION['nivel2_Classificacao'],
				$eObservacao = $row->eObservacao,
				$rNomeUnidade = $row->rNomeUnidade,
				$soNomeUnidade = $row->soNomeUnidade,
				$mDescricaoMotivo = $row->mDescricaoMotivo,
				$sObservacao = $row->sObservacao,
				$dNomeUnidade = $row->dNomeUnidade,
				$fDataRemessa = (substr($row->fDataRemessa,4,1)=="/" AND strlen($row->fDataRemessa)==10) ? substr($row->fDataRemessa,8,2)."/".substr($row->fDataRemessa,5,2)."/".substr($row->fDataRemessa,0,4) : $row->fDataRemessa,
				$fObservacaoRemessa = $row->fObservacaoRemessa,
				$sIdRemessa = $row->sIdRemessa
			);
		}
		foreach ($results2 as $row) {
			$resposta[] =array(
				$eDataEntrada = (substr($row->eDataEntrada,4,1)=="/" AND strlen($row->eDataEntrada)==10) ? substr($row->eDataEntrada,8,2)."/".substr($row->eDataEntrada,5,2)."/".substr($row->eDataEntrada,0,4) : $row->eDataEntrada,
				$eNomePaciente = $row->eNomePaciente,
				$eDataNascimento = $row->eDataNascimento,
				$pNomeProcedimento = $row->pNomeProcedimento,
				$eQuantidadeVagas = $row->eQuantidadeVagas,
				$eCID10 = $row->eCID10,
				$eUrgente = $row->eUrgente == 1 ? $_SESSION['nivel1_Classificacao'] : $_SESSION['nivel2_Classificacao'],
				$eObservacao = $row->eObservacao,
				$rNomeUnidade = $row->rNomeUnidade,
				$soNomeUnidade = $row->soNomeUnidade,
				$mDescricaoMotivo = $row->mDescricaoMotivo,
				$sObservacao = $row->sObservacao,
				$dNomeUnidade = '',
				$fDataRemessa = '',
				$fObservacaoRemessa = '',
				$sIdRemessa = ''
			);
		}
		foreach ($results3 as $row) {
			$resposta[] =array(
				$eDataEntrada = (substr($row->eDataEntrada,4,1)=="/" AND strlen($row->eDataEntrada)==10) ? substr($row->eDataEntrada,8,2)."/".substr($row->eDataEntrada,5,2)."/".substr($row->eDataEntrada,0,4) : $row->eDataEntrada,
				$eNomePaciente = $row->eNomePaciente,
				$eDataNascimento = $row->eDataNascimento,
				$pNomeProcedimento = $row->pNomeProcedimento,
				$eQuantidadeVagas = $row->eQuantidadeVagas,
				$eCID10 = $row->eCID10,
				$eUrgente = $row->eUrgente == 1 ? $_SESSION['nivel1_Classificacao'] : $_SESSION['nivel2_Classificacao'],
				$eObservacao = $row->eObservacao,
				$rNomeUnidade = $row->rNomeUnidade,
				$soNomeUnidade = $row->soNomeUnidade,
				$mDescricaoMotivo = '',
				$sObservacao = '',
				$dNomeUnidade = '',
				$fDataRemessa = '',
				$fObservacaoRemessa = '',
				$sIdRemessa = ''
			);
		}
		return $resposta;
	}
}
?>