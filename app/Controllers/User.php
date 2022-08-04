<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
	function __construct()
	{
		$this->usersModel = new UsersModel();
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$auth = $this->auth($this->request->getPost('login'), $this->request->getPost('password'));

		if ($auth)
		{
			$this->usersModel->save(array(
				'id'         => $auth->id,
				'last_login' => date('Y-m-d H:i:s')
			));

			$user = array(
				'id'         => $auth->id,
				'name'       => $auth->name,
				'login'      => $auth->login,
				'email'      => $auth->email,
				'picture'    => !empty($auth->picture) ? $auth->picture : 'nopic.jpg',
				'last_login' => !empty($auth->last_login) ? $auth->last_login : date("Y-m-d H:i:s"),
				'auth'       => true
			);

			$this->session->set($user);
			return redirect()->to(base_url('competitor'));
		}
		
		return view('user/template', array(
			'view' => 'login'
		));
	}

	public function auth($login, $password)
	{
		if (!empty($login))
		{
			$user = $this->usersModel->where('login', $login)->first();

			if (!empty($user))
			{
				if (password_verify($password, $user->password))
				{
					return $user;
				}
			}
		}
		
		return false;
	}

	public function manage()
	{
		if ($data = $this->request->getPost())
		{
			if ( (!empty($data['password']) || !empty($data['repassword'])) )
			{
				if ($data['password'] != $data['repassword'])
				{
					return redirect()
							->to(base_url('myprofile'))
							->with("error", "Os campos de senha devem ser iguais.");
				} else {
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					unset($data['repassword']);
				}
			}
			else
			{
				unset($data['password']);
				unset($data['repassword']);
			}

			$data['id'] = session('id');

			if($file = $this->request->getFile('picture'))
			{
				if ($file->isValid() && ! $file->hasMoved())
				{
					$pathFile = ROOTPATH.'public/uploads/users/';
					
					$picOld = $this->usersModel->select('picture')->find($data['id']);

					if (!empty($picOld->picture))
					{
						@unlink($pathFile.$picOld->picture);
					}

					$newName = mb_url_title($data['name'], '_', true).'_'.$data['id'].'.'.$file->getClientExtension();
					$file->move($pathFile, $newName);

					\Config\Services::image()
					->withFile($pathFile.$file->getName())
					 ->fit(128, 128, 'center')
					->save($pathFile.$file->getName());

					$data['picture'] = $file->getName();
				}
				elseif (!empty($file->getName()))
				{
					return redirect()
							->to(base_url('myprofile'))
							->with('error', 'Falha ao carregar o arquivo.');
				}
			}

			if ($this->usersModel->save($data))
			{
				$user = array(
					'name'    => $data['name'],
					'email'   => $data['email'],
					'picture' => !empty($data['picture']) ? $data['picture'] : session('picture')
				);

				$this->session->set($user);

				$flashKey = 'success';
				$flashMessage = 'Operação realizada com sucesso.';
			}
			else
			{
				$flashKey = 'error';
				$flashMessage = 'Falha ao realizar essa operação.';
			}

			return redirect()->to(base_url('myprofile'))->with($flashKey, $flashMessage);
		}

		$user = (!empty($id)) ? $this->usersModel->find($id) : NULL;

		return view('template', array(
			'view' => 'user/profile',
			'title' => 'Meu Perfil',
			'users' => $user
		));
	}

	public function logout()
	{
		session_destroy();
		return redirect()->to(base_url('login'));
	}
}