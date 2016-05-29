<?php
namespace Logistics\Controller;
use Common\Controller\HomebaseController;

/**
* 
*/
class LogisticsController extends HomebaseController{
	
	private $Package;
	private $Transfer;
	private $Logistics;
	private $data = array();
	function _initialize() {
		parent::_initialize();
		//$this->Package =D("Package");
		$this->Transfer =D("Transfer");
		$this->Logistics =M("Logistics");
	}

	function add(){//线上填单
		$condition = array();
		$condition['uid'] = $_POST['uid'];
		$condition['uname'] = $_POST['uname'];
		$condition['uaddress'] = $_POST['uaddress'];
		$condition['uphone'] = $_POST['uphone'];
		$condition['lname'] = $_POST['lname'];
		$condition['lphone'] = $_POST['lphone'];
		$condition['laddress'] = $_POST['laddress'];
		$condition['lweight'] = $_POST['lweight'];
		$condition['lremark'] = $_POST['lremark'];
		$condition['lcode'] = date("YmdHis",time()).$condition['uid'];
		$condition['timex'] = date("Y-m-d",time());
		$result = $this->Logistics->add($condition);
		//var_dump($result);exit();
		if ($result) {
			$this->data['success'] = true;
		}
		else{
			$this->data['success'] = false;
		}
		//var_dump($this->data);exit();
		echo json_encode($this->data);
	}

	function logisticsInfo(){
		$condition = array();
		$condition['uid'] = 3;
		//$condition['uid'] = $_POST['uid'];
		$logis = D("Logistics");
		$result = $logis->field("lcode,uname,uaddress,timex")->where($condition)->select();
		//var_dump($logis->getLastSql());
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