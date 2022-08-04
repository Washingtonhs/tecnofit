<?php 

namespace App\Controllers;

class Competitor extends BaseController
{
	function __construct()
	{
		$this->competitorModel = model('App\Models\CompetitorModel');
	}
	
	public function list()
	{
		$competitors = $this->competitorModel
		->select('*')
		->orderBy('name', 'ASC')
		->findAll();
		
		return view('template', array(
			'view' => 'competitor/list',
			'title' => 'Competidor',
			'competitors' => $competitors,
		));
	}

	public function manage($id = NULL)
	{
		if ($data = $this->request->getPost())
		{
			if (!empty($id))
			{
				$data['id'] = $id;
			}

			$data['status'] = !empty($data['status']) ? 1 : 0;
		
			if ($this->competitorModel->save($data))
			{
				$flashKey = 'success';
				$flashMessage = 'Operação realizada com sucesso.';
			}
			else
			{
				$flashKey = 'error';
				$flashMessage = 'Falha ao realizar essa operação.';
			}

			return redirect()->to(base_url('competitor'))->with($flashKey, $flashMessage);
		}

		$action = (!empty($id)) ? "Editar" : "Adicionar";

		return view('template', array(
			'view' => 'competitor/manage',
			'title' => $action.' competidor',
			'competitor' => (!empty($id)) ? $this->competitorModel->find($id) : NULL
		));
	}

	public function delete($id = null)
	{
		if (!empty($id))
		{
			return $this->response->setJSON([
				'success' => $this->competitorModel->delete($id)
			]);
		}
	}
}