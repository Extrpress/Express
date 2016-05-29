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
		$this->Transfer =D("Transfer");
		$this->Logistics =D("Logistics");
	}

	function add(){//线上填单
		$condition = array();
		$condition['uid'] = $_POST['uid'];
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
		
	}

}