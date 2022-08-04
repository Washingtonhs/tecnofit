<?php 

namespace App\Controllers;

class Movement extends BaseController
{
	function __construct()
	{
		$this->movementModel = model('App\Models\MovementModel');
	}
	
	public function list()
	{
		$movements = $this->movementModel
		->select('*')
		->orderBy('name', 'ASC')
		->findAll();
		
		return view('template', array(
			'view' => 'movement/list',
			'title' => 'Movimentos',
			'movements' => $movements,
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
		
			if ($this->movementModel->save($data))
			{
				$flashKey = 'success';
				$flashMessage = 'Operação realizada com sucesso.';
			}
			else
			{
				$flashKey = 'error';
				$flashMessage = 'Falha ao realizar essa operação.';
			}

			return redirect()->to(base_url('movement'))->with($flashKey, $flashMessage);
		}

		$action = (!empty($id)) ? "Editar" : "Adicionar";

		return view('template', array(
			'view' => 'movement/manage',
			'title' => $action.' Movimentos',
			'movement' => (!empty($id)) ? $this->movementModel->find($id) : NULL
		));
	}

	public function delete($id = null)
	{
		if (!empty($id))
		{
			return $this->response->setJSON([
				'success' => $this->movementModel->delete($id)
			]);
		}
	}
}