<?php
//crido de manera general tot el que necessitaré cridar

use persist\JugadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/JugadorView.class.php";
require_once "model/Jugador/persist/JugadorDAO.class.php";
require_once "model/Jugador/Jugador.class.php";
require_once "util/Jugador/JugadorValidation/JugadorMessage.class.php";
require_once "util/Jugador/JugadorValidation/JugadorFormValidation.class.php";
require_once "util/Jugador/functions_extra/make_letters.php";
require_once "util/Jugador/functions_extra/funcions_archivos.php";

class JugadorController {

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct() {

        // càrrega de la vista
        $this->view=new JugadorView();

        // càrrega del model de dades
        $this->model=new JugadorDAO();
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
            case "home"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->home();
                break;

            case "ejer1"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->ejer1();
                break;

            case "ejer2": //opció de formulari
                $this->ejer2();
                break;

            case "ejer3": //opció de formulari
                $this->ejer3();
                break;

            case "ejer4": //opció de formulari
                $this->ejer4();
                break;

           
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe JugadorView.class.php
        }
    }

//carrega el llistat de totes les categories
    public function home() {

        //necessitem cridar al model
        $mensaje=$this->model->home();
        
        if (!empty($mensaje)) { // array void or array of Jugador objects?
            $_SESSION['info']=JugadorMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['not_found'];
        }
        
        $this->view->display("view/options/JugadorHome/JugadorHome.php", $mensaje);
    }


    // carrega el formulari d'insertar categoria
    public function ejer1() {


        $mensaje=$this->model->ejer1_arrayNombres();

        $directory = "./util/Jugador/dataCreatedWithTemplate/";

        $written = writeInFileTxt($mensaje, $directory);


        if($written) {
            $_SESSION['info']=JugadorMessage::INF_FORM['written'];
        }else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['not_written'];
        }

        $this->view->display("view/options/JugadorEj1/JugadorEj1.php",); //li passem la variable que es diu $template a la vista JugadorView.class.php



    }



    // ejecuta la acción de insertar categoría
    public function ejer2() {

        $mensaje=$this->model->ejer1_arrayNombres();

        $text = createCardFormat($mensaje);

        if($mensaje) {
            $_SESSION['info']=JugadorMessage::INF_FORM['found'];
            $this->view->display("view/options/JugadorEj2/JugadorEj2.php", $text); //li passem la variable que es diu $template a la vista JugadorView.class.php

        }else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['not_found'];
        }



    }


    //aquests mètodes els deixem ara per ara així
    public function ejer3(){
        $mensaje=$this->model->ejer1_arrayNombres();

        $location = "./util/Jugador/templateToRead/index.view.html";


        $text = make_letters_file_html($location, $mensaje);

        if($mensaje) {
            $_SESSION['info']=JugadorMessage::INF_FORM['found'];
            $this->view->display("view/options/JugadorEj2/JugadorEj2.php", $text); //li passem la variable que es diu $template a la vista JugadorView.class.php

        }else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['not_found'];
        }


    }


    public function ejer4(){

        $mensaje=$this->model->ejer1_arrayNombres();

        $location = "./util/Jugador/templateToRead/index.view.html";

        $text = make_letters_file_html($location, $mensaje);

        $directoryToWrite = "./util/Jugador/dataCreatedWithTemplate/html/";

        $written = writeInFilehtml($mensaje, $directoryToWrite);

        if($written) {
            $_SESSION['info']=JugadorMessage::INF_FORM['found'];
            $this->view->display("view/options/JugadorEj4/JugadorEj4.php", $mensaje); //li passem la variable que es diu $template a la vista JugadorView.class.php

        }else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['not_found'];
        }



    }
    public function searchById()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $jugadorValid = JugadorFormValidation::checkData(JugadorFormValidation::SEARCH_FIELDS);

        $this->view->display("view/form/JugadorForm/JugadorFormSearch.php");

        $searchID = $this->model->searchById($jugadorValid->getId());


        //si no hi ha declarat cap sessió d'error
        if ($searchID) {

            if (!empty($searchID)) { // array void or array of Products objects?
                $_SESSION['info'] = JugadorMessage::INF_FORM['found'];
                $this->view->displaySearch("view/form/JugadorForm/JugadorHome.php", $searchID);

            } else {
                $_SESSION['error'] = JugadorMessage::ERR_FORM['not_found'];
            }

        }else {
            $_SESSION['error'] = JugadorMessage::ERR_FORM['not_found'];

        }

    }
    /*
    // carregaria el formulari de modificar si el programessim al menú  
    public function formModify() {
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php");
    }    

    // executaria la modificació si el programessim al menú 
    public function modify() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::MODIFY_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {            
                $result=$this->model->modify($categoryValid);

                if ($result == TRUE) {
                    $_SESSION['info']=CategoryMessage::INF_FORM['update'];
                }
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }
        
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }

    // ejecuta la acción de eliminar categoría    
    public function delete() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::DELETE_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {            
                $result=$this->model->delete($categoryValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info']=CategoryMessage::INF_FORM['delete'];
                    $categoryValid=NULL;
                }
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }
        
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }

    
    

    // ejecuta la acción de buscar categoría por id de categoría
    public function searchById() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::SEARCH_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) { // is NULL or Category object?
                $_SESSION['info']=CategoryMessage::INF_FORM['found'];
                $categoryValid=$category;
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
            }
        }
            
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }    

    // carga el formulario de buscar productos por nombre de categoría
    public function formListProducts() {
        $this->view->display("view/form/CategoryForm/CategoryFormSearchProduct.php");
    }    
    
    // ejecuta la acción de buscar productos por nombre de categoría
    public function listProducts() {
        $name=trim(filter_input(INPUT_POST, 'name'));

        $result=NULL;
        if (!empty($name)) { // Category Name is void?
            $result=$this->model->listProducts($name);            

            if (!empty($result)) { // array void or array of Product objects?
                $_SESSION['info']="Data found"; 
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
            }
            
            $this->view->display("view/form/CategoryForm/CategoryListProduct.php", $result);
        }
        else {
            $_SESSION['error']=CategoryMessage::ERR_FORM['invalid_name'];
            
            $this->view->display("view/form/CategoryForm/CategoryFormSearchProduct.php", $result);
        }
    }
    */
}
