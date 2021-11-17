<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;

/**
  * Controller TodosController
  */
class TodosController extends \controllers\ControllerBase
{

    use WithAuthTrait;

    const CACHE_KEY = 'datas/lists/';
    const EMPTY_LIST_ID = 'not saved';
    const LIST_SESSION_KEY = 'list';
    const ACTIVE_LIST_SESSION_KEY = 'active-list';

    #[Route(path: "/_default/", name: "home")]
    public function index()
    {
        //Modifie une valeur à la position list
        $list = USession::get(self::ACTIVE_LIST_SESSION_KEY, []);

        $this->loadView("TodosController/index.html");
    }

    #[Post(path: "todos/add", name: "todos.add")]
    public function addElement()
    {
        USession::addValueToArray(self::ACTIVE_LIST_SESSION_KEY, URequest::post('element'));
        $this->index();

    }


    #[Get(path: "todos/delete/{index}", name: "todos.delete")]
    public function deleteElement($index)
    {
        $list = USession::get(self::ACTIVE_LIST_SESSION_KEY);
        unset($list[$index]);
        USession::set(self::ACTIVE_LIST_SESSION_KEY, $list);
        $this->index();
    }


    #[Post(path: "todos/edit/{index}", name: "todos.edit")]
    public function editElement($index)
    {

        $this->loadView('TodosController/editElement.html');

    }


    #[Get(path: "todos/loadList/{uniqid}", name: "todos.loadList")]
    public function loadList($uniqid)
    {

        $this->loadView('TodosController/loadList.html');

    }


    #[Post(path: "todos/loadList", name: "todos.loadListPost")]
    public function loadListFromForm()
    {

        $this->loadView('TodosController/loadListFromForm.html');

    }

    private function showMessage(string $header, string $message, string $type = '', string $icon = 'info circle', array $buttons = [])
    {
        $this->loadView('main/message.html', compact('header', 'type', 'icon', 'message', 'buttons'));
    }

    #[Get(path: "todos/new/{force}", name: "todos.new")]
    public function newliste($force = false)
    {
        if (!$force) {
            $this->showMessage(
                'Nouvelle liste',
                'Une liste a déjà été créée, souhaitez-vous la vider ?',
                'info',
                'warning circle',
                [
                    ['caption' => 'Annuler', 'class' => 'inverted', 'url' => []],
                    ['caption' => 'Confirmer', 'class' => 'inverted', 'url' => ['todos.new', [1]]]
                ]
            );
            return;
        }
        USession::delete(self::ACTIVE_LIST_SESSION_KEY);
        $this->index();
    }

    #[Get(path: "todos/saveList", name: "todos.save")]
    public function saveList()
    {

        $this->loadView('TodosController/saveList.html');
    }


    protected function getAuthController(): AuthController
    {
        return new MyAuth($this);
    }
}

