<?php


class Controller_User extends Controller
{

    private $user;


    function __construct()
    {
        $this->user = new Model_User();
        $this->view = new View();
    }

    function action_index()
    {

        $this->view->generate('login.php', 'template_view.php');
    }

    function action_registration()
    {
        if (isset($_POST['username']) && isset($_POST['login'])) {
            $this->user->insertUser($_POST['username'], $_POST['login'], $_POST['password']);
            $data = $_POST['login'];
            return $this->view->generate('result.php', 'template_view.php', $data);
        }

        $this->view->generate('registration.php', 'template_view.php');
    }

    function action_login()
    {
        session_start();

        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];
        $isRegisteredUser =  $this->user->getUser($userLogin);
//        echo '<pre>';
//        print_r($isRegisteredUser['password']);
//        echo '<pre>';
//        exit;

        if ($isRegisteredUser['password'] == $userPassword) {
            $_SESSION['login'] = $userLogin;
            return $this->view->generate('result.php', 'template_view.php');
        } else {
            return $this->view->generate('result.php', 'template_view.php');
        }

    }

    function action_logout()
    {
        session_start();

        unset($_SESSION['login']);
        header("Location: /User");
    }

    function action_result()
    {
        return $this->view->generate('result.php', 'template_view.php');
    }
}