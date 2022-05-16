<?php
require_once 'app.php';

class ApplyController extends BaseController {

    protected function index () {
        global $title ;
        $title= 'Nextgen | Apply';

        $selectedId =$_POST['selected'] ?? '';

        $this->viewParams['auctions'] = Auction::getAll();

        if( isset($_POST['update-horse']) ){
            $updatedHorse = new Horse();

            $updatedHorse->name = htmlspecialchars(trim($_POST['name']));
            $updatedHorse->age = htmlspecialchars(trim($_POST['age']));
            $updatedHorse->mother = htmlspecialchars(trim($_POST['mother']));
            $updatedHorse->father = htmlspecialchars(trim($_POST['father']));
            $updatedHorse->color = htmlspecialchars(trim($_POST['color']));
            $updatedHorse->discipline = htmlspecialchars(trim($_POST['discipline']));
            $updatedHorse->gender = htmlspecialchars(trim($_POST['gender']));
            $updatedHorse->description = htmlspecialchars(trim($_POST['description']));
            $updatedHorse->pedigree = htmlspecialchars(trim($_POST['pedigree']));
            $updatedHorse->height = htmlspecialchars(trim($_POST['height']));
            $updatedHorse->owner = htmlspecialchars(trim($_POST['owner']));

            $updatedHorse->updateHorse($selectedId);
        }

        if(isset ($_POST['delete-horse'])) {
            Horse::deleteHorse($selectedId);
        }

        $this->loadView();
    }
}