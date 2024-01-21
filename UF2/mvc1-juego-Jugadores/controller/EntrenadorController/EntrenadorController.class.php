<?php
//crido de manera general tot el que necessitaré cridar

use persist\EntrenadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/EntrenadorView.class.php";
require_once "model/Entrenador/persist/EntrenadorDAO.class.php";
require_once "model/Entrenador/Entrenador.class.php";
require_once "util/Entrenador/EntrenadorValidation/EntrenadorMessage.class.php";


 require_once "util/Entrenador/EntrenadorValidation/EntrenadorMessage.class.php";
 require_once "util/Entrenador/EntrenadorValidation/EntrenadorFormValidation.class.php";

class EntrenadorController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new EntrenadorView();

        // càrrega del model de dades
        $this->model = new EntrenadorDAO();

        $this->modelJugador = new \persist\JugadorDAO();
    }

    // aquest mètode el tenen tots els nostres controladors
    // serveix per saber en quin lloc del menú estem

    public function processRequest()
    {

        //inicialitzem 3 variables que necessitarem
        $request = NULL; //aquest NULL serveix per al cas que sigui la primera vegada que hi entrem, sinó valdrà $_POST["action"] o $_GET["option"]
        $_SESSION['info'] = array(); //per donar sortida a tots els missatges generals d'informació
        $_SESSION['error'] = array(); ////per donar sortida a tots els missatges d'error

        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions,


        $request = isset($_POST["action"]) ? $_POST["action"] : NULL;
        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) {
            $request = $_GET["option"];
        }


        //mirem totes les opcions d'action o d'option ASSIGNADES a la variable $request
        switch ($request) {

            case "ejer5": //opció de formulari
                $this->ejer5();
                break;

            case "login": //opció de formulari
                $this->login();
                break;

            case "homeLoggedIn": //opció de formulari
                $this->homeLoggedIn();
                break;

            case "listar": //opció de formulari
                $this->listarJugadores();
                break;

            case "add": //opció de formulari
                $this->anyadirJugador();
                break;

            case "logout": //opció de formulari
                $this->logout();
                break;


            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe EntrenadorView.class.php
        }
    }

    //carrega el llistat de totes les categories

    public function ejer5()
    {
        $mensaje=$this->model->ejer5();

        if (!empty($mensaje)) { // array void or array of Jugador objects?
            $_SESSION['info']=EntrenadorMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=EntrenadorMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/options/EntrenadorEj5/EntrenadorEj5.php", $mensaje);

    }


    /**
     * Displays the home page with a menu containing 4 options: Ejercicio1, Ejercicio2, Ejercicio3, and Ejercicio4.
     * The body of the home page welcomes the selection and presents the entire team of players (20 icons/photos).
     * @return void
     */
    public function homeLoggedIn() {

        if($_SESSION["loggedIn"]) {

            //necessitem cridar al model
            $mensaje=$this->modelJugador->home();

            if (!empty($mensaje)) { // array void or array of Jugador objects?
                $_SESSION['info']=JugadorMessage::INF_FORM['found'];
            }
            else {
                $_SESSION['error']=JugadorMessage::ERR_FORM['not_found'];
            }

            $this->view->displayLoggedIn("view/options/JugadorHome/JugadorHome.php", $mensaje);
        }else {
            $this->view->display("view/form/JugadorForm/LoginForm/LoginForm.php"); //li passem la variable que es diu $template a la vista JugadorView.class.php
        }

    }



    public function login(){

        $csvFile = 'util/Entrenador/csvEntrenadores/entrenadoresLogin.csv';
        $username = '';
        $password = '';

        $loggedIn = '';
        $mensaje = '';

        $_SESSION["loggedIn"] = false;



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
        }

        if($username && $password) {
            $loggedIn = $this->model->login($username, $password, $csvFile);
        }else {
            $_SESSION['error']=JugadorMessage::ERR_FORM['empty_username'];
            $_SESSION['error']=JugadorMessage::ERR_FORM['empty_pass'];
        }

        if($loggedIn) {

            $_SESSION["loggedIn"] = true;
        }

        if($_SESSION["loggedIn"]) {
            $mensaje = $this->modelJugador->home();
            $this->view->displayLoggedIn("view/options/JugadorHome/JugadorHome.php", $mensaje);
        }else {
            $this->view->display("view/form/EntrenadorForm/LoginForm/LoginForm.php"); //li passem la variable que es diu $template a la vista JugadorView.class.php
        }


    }



    public function listarJugadores() {

        $csvFile = 'util/Entrenador/csvJugadores/jugadores.csv';

        $resultado = $this->model->listarJugadores($csvFile);

        $this->view->displayLoggedIn("view/options/EntrenadorLogged/ListarJugador.php", $resultado);
    }



    public function anyadirJugador() {
        $this->view->displayLoggedIn("view/options/EntrenadorLogged/AnyadirJugador.php");
    }


    public function logout() {
        $mensaje = $this->modelJugador->home();
        $_SESSION["loggedIn"] = false;

        $this->view->display("view/options/JugadorHome/JugadorHome.php", $mensaje);
    }



}
