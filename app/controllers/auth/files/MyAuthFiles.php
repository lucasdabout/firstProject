<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
  * Class MyAuthFiles
  */
class MyAuthFiles extends AuthFiles{
	public function getViewIndex(){
		return "MyAuth/index.html";
	}

	public function getViewDisconnected(){
		return "MyAuth/disconnected.html";
	}

	public function getViewNoAccess(){
		return "MyAuth/noAccess.html";
	}


}
