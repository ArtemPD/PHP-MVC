<?php

namespace application\controllers;

use application\core\Controller;

class CsvController extends Controller {

    public function indexAction() {
        $result = $this->model->getData();
        $vars = [
            'data' => $result,
        ];

        $this->view->render('Головна', $vars);
    }

    public function saveAction() {
        $this->view->render('Збереження csv файлу');
    }

    public function downloadAction() {

            if (!empty($_POST)) {
                $fileName = $_FILES["file"]["tmp_name"];

                if($_FILES["file"]["size"] > 0){
                    $file = fopen($fileName, "r");

                    while (($column = fgetcsv($file, 10000, "," )) !== false){
                        if($column[0] == 'UID'){
                            continue;
                        }

                        if(count($column) !== 6){
                            $_SESSION['error'] = 'Дані не додані, не правильна структура файлу';
                            $this->view->redirect('/csv');
                        }

                        $status = $this->model->saveData($column);

                        if($status){
                            $_SESSION['success'] = 'Дані успішно додані';
                        }else{
                            $_SESSION['error'] = 'Дані не додані';
                        }
                    }
                    $this->view->redirect('/csv');
                }
                $_SESSION['error'] = 'Пустий файл';
                $this->view->redirect('/csv/save');
            }

        $this->view->redirect('/');

    }

    public function deleteAction() {

        $status = $this->model->deleteData();
        $this->view->redirect('/');

    }

}