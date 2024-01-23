<?php


//este fichero es el controller del Category llama a las funciones del dao y muestra las vistas - SHAH ZAIB ASGHAR MUNIR - 23/01/2024


use persist\JugadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/CategoryView.class.php";
require_once "model/Category/persist/CategoryDAO.class.php";
require_once "model/Category/Category.class.php";
require_once "util/Category/CategoryValidation/CategoryMessage.class.php";
require_once "util/Category/CategoryValidation/CategoryFormValidation.class.php";
require_once "util/Category/functions_extra/funcions_archivos.php";

class CategoryController {

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct() {

        // càrrega de la vista
        $this->view=new CategoryView();

        // càrrega del model de dades
        $this->model=new \persist\CategoryDAO();
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
           
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->home();
                break;
        }




    }







    /**
     * Home page, al logearse se mostrara el category
     * @return void
     */
    public function home()
    {

        $mensaje=$this->model->home();

        if (!empty($mensaje)) { // array void or array of Jugador objects?
            $_SESSION['info']=CategoryMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/options/CategoryHome/CategoryHome.php", $mensaje);


    }


    //metodo listar todas las categorias
    public function listAll() {
        $categories=array();

        //necessitem cridar al model
        $categories=$this->model->listAll();

        if (!empty($categories)) { // array void or array of Category objects?
            $_SESSION['info']=CategoryMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/CategoryForm/CategoryList.php", $categories);
    }



}
