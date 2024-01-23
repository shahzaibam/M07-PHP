<?php

//este fichero es el controller del User llama a las funciones del dao y muestra las vistas - SHAH ZAIB ASGHAR MUNIR - 23/01/2024


use persist\JugadorDAO;

require_once "controller/ControllerInterface.php";
require_once "view/UserView.class.php";
require_once "model/User/persist/UserDAO.class.php";
require_once "model/Category/persist/CategoryDAO.class.php";
require_once "model/User/User.class.php";
require_once "util/User/UserValidation/UserMessage.class.php";
require_once "util/User/UserValidation/UserFormValidation.class.php";
require_once "util/User/functions_extra/funcions_archivos.php";

class UserController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new UserView();

        // càrrega del model de dades
        $this->model = new \persist\UserDAO();

        //model de categorias para obtener el contenido a mostrar
        $this->modelCategory = new \persist\CategoryDAO();
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

            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->login();
                break;
        }
    }


    /**
     * Login page, al iniciar la pagina por defecto se verá el login
     * @return void
     */
    public function login()
    {

        $csvFile = 'util/User/csvUsers/usersLogin.csv';
        $username = '';
        $password = '';

        $loggedIn = '';
        $mensaje = '';



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            echo $username;
            echo $password;


        }

        if($username && $password) {
            $loggedIn = $this->model->login($username, $password, $csvFile);
            echo $loggedIn;
        }else {
            $_SESSION['error']=UserMessage::ERR_FORM['passUser'];
        }



        if($loggedIn) {
            $_SESSION["loggedIn"] = true;
            $mensaje = $this->modelCategory->home();
            $_SESSION["rol"] = $loggedIn;


            $this->view->displayLoggedIn("view/options/CategoryHome/CategoryHome.php", $mensaje);
        }else {
            $this->view->display("view/form/UserForm/LoginForm/LoginForm.php"); //li passem la variable que es diu $template a la vista JugadorView.class.php

        }



    }



}
