<?php

class LoginController extends BaseController {

    public function index () {
        global $title ;
        $title= 'Nextgen | Login';

        $this->loadView();
    }

    public function profile() {
        $user_id = $_SESSION['user_id'];
        $user = User::getUserById($user_id);

        if( isset($_POST['update-user']) ){
            $updatedUser = new User();

            $updatedUser->firstname = htmlspecialchars(trim($_POST['firstname']));
            $updatedUser->lastname = htmlspecialchars(trim($_POST['lastname']));
            $updatedUser->email = htmlspecialchars(trim($_POST['email']));
            //$updatedUser->firstname = htmlspecialchars(trim($_POST['firstname']));

            $updatedUser->updateUser($user_id);
            header('Location:/login/profile/');
        }

        if( isset($_POST['delete-user']) ){
            User::deleteUser($user_id);
        }

        include BASE_URL . 'views/login/profile.php';
    }
}