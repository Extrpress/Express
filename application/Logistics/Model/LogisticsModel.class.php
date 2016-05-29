<?php
namespace Home\Model;
use Think\Model\ViewModel;
class PackageModel extends ViewModel {
	public $viewFields = array(
		'User'=>array('uid'),
		'Logistics'=>array('uid','lcode','timex','uname','uaddress','_on'=>'User.uid=Logistics.uid'),
		);
}