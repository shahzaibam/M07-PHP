<?php
//crido de manera general tot el que necessitaré cridar

use persist\CategoryDAO;

require_once "controller/ControllerInterface.php";
require_once "view/CategoryView.class.php";
require_once "model/Category/persist/CategoryDAO.class.php";
require_once "model/Category/Category.class.php";
require_once "util/Category/JugadorMessage.class.php";
require_once "util/Category/JugadorFormValidation.class.php";

class CategoryController implements ControllerInterface {

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct() {

        // càrrega de la vista
        $this->view=new CategoryView();

        // càrrega del model de dades
        $this->model=new CategoryDAO();
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
            case "list_all"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->listAll();
                break;

            case "form_add"://opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->formAdd();
                break;

            case "add": //opció de formulari
                $this->add();
                break;

            case "modify": //opció de formulari
                $this->modify();
                break;

            case "search": //opció de formulari
                $this->searchById();
                break;

            case "delete": //opció de formulari
                $this->delete();
                break;
           
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe CategoryView.class.php
        }
    }

//carrega el llistat de totes les categories
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

    
// carrega el formulari d'insertar categoria
    public function formAdd() {
        $this->view->display("view/form/CategoryForm/JugadorHome.php"); //li passem la variable que es diu $template a la vista CategoryView.class.php
    }

// ejecuta la acción de insertar categoría
    public function add() {
       //validem i omplim missatges d'error, si n'hi hagués
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::ADD_FIELDS);        
        
        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $category=$this->model->searchById($categoryValid->getId());

            //si no hem trobat l'id...
            if ($category == null) {
                //afegim la categoria a l'arxiu
                $result=$this->model->add($categoryValid);

                if ($result == TRUE) {
                    $_SESSION['info']=CategoryMessage::INF_FORM['insert'];
                    $categoryValid=NULL;
                }
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['exists_id'];          
            }
        }

        $this->view->display("view/form/CategoryForm/JugadorHome.php", $categoryValid);
    }

//aquests mètodes els deixem ara per ara així
    public function modify(){
        //validem i omplim missatges d'error, si n'hi hagués
        $categoryValid = ProductFormValidation::checkData(ProductFormValidation::MODIFY_FIELDS);


        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            $searchID = $this->model->searchByIdModify($categoryValid->getId());


            $getName = $categoryValid->getName();

            if ($searchID) {
                $product = [$searchID, $getName];

                $this->model->modify($product);
                $_SESSION['info'] = ProductMessage::INF_FORM['update'];

            }else {
                $_SESSION['error'] = ProductMessage::ERR_FORM['not_exists_id'];
            }

        }

        $this->view->display("view/form/CategoryForm/CategoryFormModify.php");

    }
    public function delete(){
        //validem i omplim missatges d'error, si n'hi hagués
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::DELETE_FIELDS);


        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            $searchID = $this->model->searchByIdModify($categoryValid->getId());

            if ($searchID != -1) {

                $this->model->delete($searchID);
                $_SESSION['info'] = ProductMessage::INF_FORM['delete'];

            }else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['not_exists_id'];
            }

        }

        $this->view->display("view/form/ProductForm/ProductFormDelete.php");
    }
    public function searchById()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::SEARCH_FIELDS);

        $this->view->display("view/form/CategoryForm/CategoryFormSearch.php");

        $searchID = $this->model->searchById($categoryValid->getId());


        //si no hi ha declarat cap sessió d'error
        if ($searchID) {

            if (!empty($searchID)) { // array void or array of Products objects?
                $_SESSION['info'] = CategoryMessage::INF_FORM['found'];
                $this->view->displaySearch("view/form/CategoryForm/CategoryList.php", $searchID);

            } else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['not_found'];
            }

        }else {
            $_SESSION['error'] = CategoryMessage::ERR_FORM['not_found'];

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
