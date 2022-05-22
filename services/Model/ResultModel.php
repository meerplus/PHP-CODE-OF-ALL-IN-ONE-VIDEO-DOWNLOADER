<?php

class VideoResult{
	public $VideoUrl;
	public $thumbnil;
	public $AudioUrl;
	public $ServiceName;
	public $Title;
	public $Quality;
	public $FileSize;
	
	
	public static function  GetVideoResult($ViedeoUrl,$thumbnil,$serviceName,$audioUrl=null,$title=null,$fileSize=null){
		$instance=new VideoResult();
		$instance->VideoUrl=$ViedeoUrl;
		$instance->thumbnil=$thumbnil;
		$instance->AudioUrl=$audioUrl;
		$instance->ServiceName=$serviceName;
		$instance->Title=$title;
		$instance->FileSize=$fileSize;
		return $instance;
	}
	
	 function setQuality($Quality) {
		$this->Quality= $Quality;
		
	  }

	function __construct(){
		//$this->VideoUrl=$ViedeoUrl;
		//$this->thumbnil= $thumbnil;
		///$this->AudioUrl=$audioUrl;
	}
	
	
	 function set_VideoUrl($VideoUrl) {
		$this->VideoUrl= $VideoUrl;
		
	  }
	  function get_VideoUrl() {
		return $VideoUrl->VideoUrl;
	  }
	   
	  function set_thumbnil($thumbnil) {
		$this->thumbnil= $thumbnil;
	  }
	  function get_thumbnil() {
		return $thumbnil->thumbnil;
	  }
	
}

class ResultModel{
	public $Status;
	public $VideoResult=array() ;
	public $ErrorLog=array();
	public $InternalDownload=false;
	public $NeedClientExecution=false;
	public $HTMLData;

	function __construct(){

	}

	public function set_HTMLData($_HTMLData){
		$this->HTMLData=$_HTMLData;
	}

	public function set_NeedClientExecution($_NeedClientExecution){
		$this->NeedClientExecution=$_NeedClientExecution;
	}

	public function set_InternalDownload($_InternalDownload){
		$this->InternalDownload=$_InternalDownload;
	}
	public function set_VideoResults($tmp) {
		$this->VideoResult[]=$tmp;
	}
	public function set_ErrorLog($tmp) {
		$this->ErrorLog[]=$tmp;
	}
	function set_Status($Status) {
		$this->Status= $Status;
	  }
	  function get_Status() {
		return $Status->Status;
	  }
}
?>