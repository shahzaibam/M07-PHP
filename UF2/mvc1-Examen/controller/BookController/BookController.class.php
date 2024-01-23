<?php

//este fichero es el controller del book llama a las funciones del dao y muestra las vistas - SHAH ZAIB ASGHAR MUNIR - 23/01/2024

use persist\JugadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/BookView.class.php";
require_once "model/Book/persist/BookDAO.class.php";
require_once "model/Book/Book.class.php";
require_once "util/Book/BookValidation/BookMessage.class.php";
require_once "util/Book/BookValidation/BookFormValidation.class.php";
require_once "util/Book/functions_extra/funcions_archivos.php";

class BookController {

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct() {

        // càrrega de la vista
        $this->view=new BookView();

        // càrrega del model de dades
        $this->model=new \persist\BookDAO();
    }

    // aquest mètode el tenen tots els nostres controladors
    // serveix per saber en quin lloc del menú estem

    public function processRequest() {
        
        //inicialitzem 3 variables que necessitarem
        $request=NULL; //aquest NULL serveix per al cas que sigui la primera vegada que hi entrem, sinó valdrà $_POST["action"] o $_GET["option"]
        $_SESSION['info']=array(); //per donar sortida a tots els missatges generals d'informació
        $_SESSION['error']=array(); ////per donar sortida a tots els missatges d'error
        
        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions,
       

        $request=isset($_POST["action"])?$_POST["action"]:NULL;
        if(isset($_POST["action"])){
            $request=$_POST["action"];
        }else if(isset($_GET["option"])){
            $request=$_GET["option"];
        }
        
                
        //mirem totes les opcions d'action o d'option ASSIGNADES a la variable $request
        switch ($request) {

            case "listAll":
                $this->listAll();
                break;

//            case "add":
//                $this->add();
//                break;

        }




    }




    //metodo listar todas las categorias
    public function listAll() {

        $book=array();

        //necessitem cridar al model
        $book=$this->model->listAll();

        if (!empty($book)) { // array void or array of Book objects?
            $_SESSION['info']=BookMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=BookMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/BookForm/BookList.php", $book);
    }


//    /**
//     * Ejecuta la acción de insertar categoria
//     * @param none
//     * @return none
//     **/
//    public function add()
//    {
//        $bookValid = BookFormValidation::checkData(BookFormValidation::ADD_FIELDS); //const ADD_FIELDS = array('id','name');
//
//        if (empty($_SESSION['error'])) {
//            //busco que no haya una categoria con este id que quieren añadir
//            $book = $this->model->searchById($bookValid->getIsbn());
//
//            //si lo hemos encontrado o no
//            if (is_null($book)) {
//                //añadir la nueva categoria
//                $result = $this->model->add($book);
//
//                if ($result == TRUE) {
//                    $_SESSION['info'] = BookMessage::INF_FORM['insert'];
//                    //$categoryValid=NULL;
//                } else {
//                    $_SESSION['error'] = BookMessage::ERR_DAO['insert'];
//                }
//            } else { //el id existe
//                $_SESSION['error'] = BookMessage::ERR_FORM['exists_id'];
//            }
//        }
//
//        $this->view2->displayLoggedIn("view/options/JugadorHome/JugadorHome.php", $bookValid);
//    }




}
