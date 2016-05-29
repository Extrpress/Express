<?php
namespace Logistics\Controller;
use Common\Controller\HomebaseController;

/**
* 
*/
class PackageController extends HomebaseController{
	
	private $Package;
	private $Transfer;
	private $Logistics;
	private $data = array();
	function _initialize() {
		parent::_initialize();
		//$this->Package =D("Package");
		$this->Transfer =M("Transfer");
		$this->Logistics =M("Logistics");
	}

	function add(){//线上填单
		$condition = array();
		$condition['uid'] = $_POST['uid'];
		$condition['uname'] = $_POST['uname'];
		$condition['uaddress'] = $_POST['address'];
		$condition['uphone'] = $_POST['uphone'];
		$condition['pname'] = $_POST['pname'];
		$condition['pphone'] = $_POST['pphone'];
		$condition['paddress'] = $_POST['paddress'];
		$condition['weight'] = $_POST['weight'];
		$condition['lcode'] = date("YmdHis",time()).$condition['uid'];
		$result = $this->Logistics->add();
		if ($result) {
			$tis->data['success'] = true;
		}
		else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

	function logisticsInfo(){
		$condition = array();
		$condition['uid'] = $_POST['uid'];
		$logis = D("Logistics");
		$result = $logis->where($condition)->select();
		if ($result) {
			$this->data['success'] = true;
			$this->data['info'] = $result;
		}
		else{
			$this->data['success'] = false;
		}
		echo json_encode($this->data);
	}

}