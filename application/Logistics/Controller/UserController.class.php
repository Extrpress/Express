<?php

namespace Logistics\Controller;
use Common\Controller\HomebaseController;

/**
* 
*/
class UserController extends HomebaseController{
	 private $User;
	 private $data = array();
	 function _initialize() {
		parent::_initialize();
		$this->User =M("user");
	}
	
	function Register(){
		$condition = array();

		$condition['username'] = $_POST['username'];
		$condition['password'] = md5($_POST['password']);
		$condition['phone'] = $_POST['phone'];
		$condition['email'] = $_POST['useremail'];

		$result = $this->User->add($condition);
		//var_dump($condition);exit();
		//var_dump($this->User->getLastSql());
		if ($result) {
			$this->data['success'] = true;
		}else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

	function do_login(){
		$condition = array();
		$condition['username'] = $_POST['username'];
		$condition['password'] = md5($_POST['password']);

		$result = $this->User->where($condition)->select();
		if ($result) {
			$this->data['success'] = true;
		}
		else{
			$this->data['success'] = false;
		}

		echo json_encode($this->data);
	}

	function indentify(){
		$info = array();
		$condition =array();

		$condition['username'] = $_POST['username'];

		$info['truename'] = $_POST['truename'];
		$info['idcard'] = $_POST['idcard'];

		$result = $this->User->where($condition)->save($info);
		if ($result) {
			$this->data['success'] = true;
		}
		else{
			$this->data['success'] = false;
		}

		echo json_encode($this->data);
	}

	function updatePhone(){
		$condition = array();
		$info = array();
		$condition['phone'] = $_POST['phone'];
		$condition['email'] = $_POST['email'];
		$condition['code'] = $_POST['code'];
		//$condition['password'] = md5($_POST['password']);
		$cache = M('cache');
		$result = $cache->where($condition)->select();
		if ($re) {
			$cache->where($condition)->delete();
			$info['phone'] = $_POST['newphone'];

			$co = array();
			$co['phone'] = $condition['phone'];
			$co['email'] = $condition['email'];

			$result = $this->User->where($co)->save($info);
			if ($result) {
				$this->data['success'] = true;
			}
			else{
			$this->data['success'] = false;
			}

		}else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

	function updateEmail(){
		$condition = array();
		$info = array();
		$condition['phone'] = $_POST['phone'];
		$condition['email'] = $_POST['email'];
		$condition['code'] = $_POST['code'];
		//$condition['password'] = md5($_POST['password']);
		$cache = M('cache');
		$result = $cache->where($condition)->select();
		if ($re) {
			$cache->where($condition)->delete();
			$info['email'] = $_POST['newemail'];

			$co = array();
			$co['phone'] = $condition['phone'];
			$co['email'] = $condition['email'];

			$result = $this->User->where($co)->save($info);
			if ($result) {
				$this->data['success'] = true;
			}
			else{
			$this->data['success'] = false;
			}

		}else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

	function updatePassword(){
		$condition = array();
		$info = array();
		$condition['phone'] = $_POST['phone'];
		$condition['email'] = $_POST['email'];
		$condition['password'] = md5($_POST['password']);

		$info['password'] = $_POST['newpassword'];
		$result = $this->where($condition)->save($info);
		if ($result) {
			$this->data['success'] = true;
		}
		else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

	private function cache(){
		$condition = array();
		$condition['phone'] = $_POST['phone'];
		$condition['email'] = $_POST['email'];
		$condition['code'] = $_POST['code'];
		$condition['time'] = time();
		$cache = M('cache');
		$cache->add($condition);
	}

}