<?php

use persist\JugadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/JugadorView.class.php";
require_once "model/Jugador/persist/JugadorDAO.class.php";
require_once "model/Jugador/Jugador.class.php";
require_once "util/Jugador/JugadorValidation/JugadorMessage.class.php";
require_once "util/Jugador/JugadorValidation/JugadorFormValidation.class.php";
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

            case "login": //opció de formulari
                $this->login();
                break;

           
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe JugadorView.class.php
        }
    }


    /**
     * Displays the home page with a menu containing 4 options: Ejercicio1, Ejercicio2, Ejercicio3, and Ejercicio4.
     * The body of the home page welcomes the selection and presents the entire team of players (20 icons/photos).
     * @return void
     */
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


    /**
     * Activity 1: Generates a letter for each player and saves the files on disk.
     * Players are defined in a file, and the generated files will be named, for example, ferranTorres.txt, gavi.txt.
     * @return void
     */
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


    /**
     * This function is part of Activity 2. It retrieves an array of names from the model,
     * formats them into card-like structures, and displays them using HTML <pre> tags.
     * @return void
     */
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


    /**
     * Activity 3: Similar to exercise 2, but the letter template is in a file that the program reads.
     * The file is named index.view.html, and it contains HTML with the text of the letter.
     *
     * @return void
     */
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


    /**
     * Activity 4: Based on exercise 3, generate letters and save them to disk in HTML files (e.g., ferranTorres.html, gavi.html).
     * Also, create a file 'index.html' with a list of links to the generated letter files.
     *
     * @return void
     */
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



    public function login(){


            $this->view->display("view/form/JugadorForm/LoginForm/LoginForm.php"); //li passem la variable que es diu $template a la vista JugadorView.class.php

    }

}
