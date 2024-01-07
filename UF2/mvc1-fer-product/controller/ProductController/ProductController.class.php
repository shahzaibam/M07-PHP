<?php
//crido de manera general tot el que necessitaré cridar

use persist\ProductDAO;

require_once "controller/ControllerInterface.php";
require_once "view/ProductView.class.php";
require_once "model/Product/persist/ProductDAO.class.php";
require_once "model/Product/Product.class.php";
require_once "util/Product/ProductMessage.class.php";
require_once "util/Product/ProductFormValidation.class.php";

class ProductController implements ControllerInterface
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;


    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new ProductView();

        // càrrega del model de dades
        $this->model = new ProductDAO();
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
            case "list_all"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->listAll();
                break;

            case "form_add"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->formAdd();
                break;

            case "add": //opció de formulari
                $this->add();
                break;

            default: //en el cas que vinguem per primer cop a productes o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe ProductView.class.php
        }
    }

//carrega el llistat de tots els productes
    public function listAll()
    {
        $productes = array();
        //necessitem cridar al model
        $productes = $this->model->listAll();

        if (!empty($productes)) { // array void or array of Products objects?
            $_SESSION['info'] = ProductMessage::INF_FORM['found'];
        } else {
            $_SESSION['error'] = ProductMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/ProductForm/ProductList.php", $productes);
    }


// carrega el formulari d'insertar producte
    public function formAdd()
    {
        $this->view->display("view/form/ProductForm/ProductFormAdd.php"); //li passem la variable que es diu $template a la vista ProductView.class.php
    }

// ejecuta la acción de insertar categoría
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $productValid = ProductFormValidation::checkData(ProductFormValidation::ADD_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $product = $this->model->searchById($productValid->getId());

            //si no hem trobat l'id...
            if (is_null($product)) {
                //afegim la categoria a l'arxiu
                $result = $this->model->add($productValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = ProductMessage::INF_FORM['insert'];
                    $productValid = NULL;
                }
            } else {
                $_SESSION['error'] = ProductMessage::ERR_FORM['exists_id'];
            }
        }

        $this->view->display("view/form/ProductForm/ProductFormAdd.php", $productValid);
    }

//aquests mètodes els deixem ara per ara així
    public function modify()
    {
//to do
    }

    public function delete()
    {
//to do
    }

    public function searchById()
    {
//to do
    }
    /*
    // carregaria el formulari de modificar si el programessim al menú
    public function formModify() {
        $this->view->display("view/form/ProductForm/ProductFormModify.php");
    }

    // executaria la modificació si el programessim al menú
    public function modify() {
        $productValid=ProductFormValidation::checkData(ProductFormValidation::MODIFY_FIELDS);

        if (empty($_SESSION['error'])) {
            $product=$this->model->searchById($productValid->getId());

            if (!is_null($product)) {
                $result=$this->model->modify($productValid);

                if ($result == TRUE) {
                    $_SESSION['info']=ProductMessage::INF_FORM['update'];
                }
            }
            else {
                $_SESSION['error']=ProductMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/ProductForm/ProductFormModify.php", $productValid);
    }

    // ejecuta la acción de eliminar categoría
    public function delete() {
        $productValid=ProductFormValidation::checkData(ProductFormValidation::DELETE_FIELDS);

        if (empty($_SESSION['error'])) {
            $product=$this->model->searchById($productValid->getId());

            if (!is_null($product)) {
                $result=$this->model->delete($productValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info']=ProductMessage::INF_FORM['delete'];
                    $productValid=NULL;
                }
            }
            else {
                $_SESSION['error']=ProductMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/ProductForm/ProductFormModify.php", $productValid);
    }




    // ejecuta la acción de buscar categoría por id de categoría
    public function searchById() {
        $productValid=ProductFormValidation::checkData(ProductFormValidation::SEARCH_FIELDS);

        if (empty($_SESSION['error'])) {
            $product=$this->model->searchById($productValid->getId());

            if (!is_null($product)) { // is NULL or Product object?
                $_SESSION['info']=ProductMessage::INF_FORM['found'];
                $productValid=$product;
            }
            else {
                $_SESSION['error']=ProductMessage::ERR_FORM['not_found'];
            }
        }

        $this->view->display("view/form/ProductForm/ProductFormModify.php", $productValid);
    }

    // carga el formulario de buscar productos por nombre de categoría
    public function formListProducts() {
        $this->view->display("view/form/ProductForm/ProductFormSearchProduct.php");
    }

    // ejecuta la acción de buscar productos por nombre de categoría
    public function listProducts() {
        $name=trim(filter_input(INPUT_POST, 'name'));

        $result=NULL;
        if (!empty($name)) { // Product Name is void?
            $result=$this->model->listProducts($name);

            if (!empty($result)) { // array void or array of Product objects?
                $_SESSION['info']="Data found";
            }
            else {
                $_SESSION['error']=ProductMessage::ERR_FORM['not_found'];
            }

            $this->view->display("view/form/ProductForm/ProductListProduct.php", $result);
        }
        else {
            $_SESSION['error']=ProductMessage::ERR_FORM['invalid_name'];

            $this->view->display("view/form/ProductForm/ProductFormSearchProduct.php", $result);
        }
    }
    */
}
