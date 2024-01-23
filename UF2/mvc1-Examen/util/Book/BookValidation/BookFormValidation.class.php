<?php

class BookFormValidation {

    const ADD_FIELDS = array('id','name');
    const MODIFY_FIELDS = array('id','name');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');
    
    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z]/";
    
    public static function checkData($fields) {
        $isbn=NULL;
        $title=NULL;
        $desc=NULL;
        $author=NULL;
        $pubData=NULL;

        foreach ($fields as $field) {
            switch ($field) {
                case 'isbn':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $isbn=trim(filter_input(INPUT_POST, 'isbn'));
                    $isbnValid=!preg_match(self::NUMERIC, $isbn);
                    if (empty($isbn)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_id']);
                    }
                    else if ($isbnValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'title':
                    $title=trim(filter_input(INPUT_POST, 'title'));
                    $titleValid=!preg_match(self::ALPHABETIC, $title);
                    if (empty($title)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_title']);
                    }
                    else if ($titleValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_title']);
                    }
                    break;

                case 'desc':
                    $title=trim(filter_input(INPUT_POST, 'desc'));
                    $titleValid=!preg_match(self::ALPHABETIC, $title);
                    if (empty($title)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_desc']);
                    }
                    else if ($titleValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_desc']);
                    }
                    break;
                case 'author':
                    $author=trim(filter_input(INPUT_POST, 'author'));
                    $authorValid=!preg_match(self::ALPHABETIC, $author);
                    if (empty($author)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_author']);
                    }
                    else if ($authorValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_author']);
                    }
                    break;
                case 'pubData':
                    $pubData=trim(filter_input(INPUT_POST, 'author'));
                    $pubDataValid=!preg_match(self::ALPHABETIC, $pubData);
                    if (empty($pubData)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_author']);
                    }
                    else if ($pubDataValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_author']);
                    }
                    break;
                case 'xx':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id=trim(filter_input(INPUT_POST, 'id'));
                    $idValid=filter_var($id, FILTER_SANITIZE_NUMBER_INT);
                    if ($idValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'xx':
                    $name=trim(filter_input(INPUT_POST, 'name'));
                    $nameValid=filter_var($name, FILTER_SANITIZE_STRING);
                    if ($nameValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_name']);
                    }
                    break;
            }
        }
        
        $category=new Book($isbn, $title, $desc, $author, $pubData);
        
        return $category;
    }
    
}
