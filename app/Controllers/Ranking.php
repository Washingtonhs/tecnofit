<?php 

namespace App\Controllers;

class Ranking extends BaseController
{
	function __construct()
	{
		$this->competitorModel = model('App\Models\CompetitorModel');
		$this->movementModel = model('App\Models\MovementModel');
		$this->personalRecordModel = model('App\Models\PersonalRecordModel');
	}
	
	public function index()
	{
		$result = $this->personalRecordModel
		->select('personal_record.id as register, competitor.name as competitor, movement.name as movement, personal_record.value')
		->join('competitor', 'personal_record.competitor_id = competitor.id')
		->join('movement', 'personal_record.movement_id = movement.id')
		->orderBy('register', 'asc')
		->findAll();

		return $this->response->setJSON([
			'data' => $result
		]);
	}

	public function show($movement_id)
	{
		$competitors = $this->personalRecordModel
		->select('personal_record.id as register, competitor.name as competitor, movement.name as movement, personal_record.value, personal_record.created_at as date')
		->join('competitor', 'personal_record.competitor_id = competitor.id')
		->join('movement', 'personal_record.movement_id = movement.id')
		->where('personal_record.movement_id', $movement_id)
		->orderBy('personal_record.value', 'DESC')
		->groupBy('competitor.id')
		->selectMax('personal_record.value')
		->findAll();

		self::setPositions($competitors);
		
		return $this->response->setJSON([
			'ranking' => $competitors
		]);
	}
	
	public function create()
	{
		$data = $this->request->getPost();

		$competitor = $this->competitorModel->find($data['competitor']);
		
		if (is_null($competitor)) {
			return $this->response->setJSON([
				'error' => 'Competidor não encontrado'
			]);
		}

		$movement = $this->movementModel->find($data['movement']);

		if (is_null($movement)) {
			return $this->response->setJSON([
				'error' => 'Movimento não encontrado'
			]);
		}

		$data = [
			'competitor_id' => $data['competitor'],
			'movement_id' => $data['movement'],
			'value' => $data['score'],
			'date' => date('Y-m-d H:i:s')
		];

		$this->personalRecordModel->insert($data);

		return $this->response->setJSON([
			'success' => true
		]);
	}

	public function update($register)
	{
		$data = [
			'id' => $register,
			'competitor_id' => putDelete('competitor'),
			'movement_id' => putDelete('movement'),
			'value' => putDelete('score')
		];

		$competitor = $this->competitorModel->find($data['competitor_id']);
		
		if (is_null($competitor)) {
			return $this->response->setJSON([
				'error' => 'Competidor não encontrado'
			]);
		}

		$movement = $this->movementModel->find($data['movement_id']);

		if (is_null($movement)) {
			return $this->response->setJSON([
				'error' => 'Movimento não encontrado'
			]);
		}

		$result = $this->personalRecordModel->find($data['id']);

		if (is_null($result)) {
			return $this->response->setJSON([
				'error' => 'Registro não encontrado'
			]);
		}

		$this->personalRecordModel->save($data);

		return $this->response->setJSON([
			'success' => true
		]);
	}

	public function delete($register)
	{
		$result = $this->personalRecordModel->find($register);

		if (is_null($result))
		{
			return $this->response->setJSON([
				'error' => 'Registro não encontrado'
			]);
		}

		$this->personalRecordModel->delete($register);

		return $this->response->setJSON([
			'success' => true
		]);
	}

	public function setPositions(&$ranking)
	{
		$position = 0;
		$lastValue = 0;

		foreach ($ranking as $key => $value)
		{
			if ($lastValue != $ranking[$key]->value)
			{
				$position++;
			}

			$ranking[$key]->position = $position;

			$lastValue = $ranking[$key]->value;
		}

		return $ranking;
	}
}