<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;

/**
  * Controller TodosController
  */
class TodosController extends \controllers\ControllerBase{

    #[Route(path: "/_default/",name: "home")]
	public function index(){
		$this->loadView("TodosController/index.html");
	}

	#[Post(path: "todos/add",name: "todos.add")]
	public function addElement(){
		
		$this->loadView('TodosController/addElement.html');

	}


	#[Get(path: "todos/delete/{index}",name: "todos.delete")]
	public function deleteElement($index){
		
	}


	#[Post(path: "todos/edit/{index}",name: "todos.edit")]
	public function editElement($index){
		
		$this->loadView('TodosController/editElement.html');

	}


	#[Get(path: "todos/loadList/{uniqid}",name: "todos.loadList")]
	public function loadList($uniqid){
		
		$this->loadView('TodosController/loadList.html');

	}


	#[Post(path: "todos/loadList",name: "todos.loadListPost")]
	public function loadListFromForm(){
		
		$this->loadView('TodosController/loadListFromForm.html');

	}


	#[Get(path: "todos/new/{force}",name: "todos.new")]
	public function newliste($force){
		
		$this->loadView('TodosController/newliste.html');

	}


	#[Get(path: "todos/saveList",name: "todos.save")]
	public function saveList(){
		
		$this->loadView('TodosController/saveList.html');

	}

}
