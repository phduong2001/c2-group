<?php
class MemberController extends Controller {

    private $member_model;

    public function __construct() {
        $this->member_model = $this->model('MemberModel');
    }

    public function index() {
        if (!isset($_SESSION['student_id']))
            $this->view('login', []);
        else
            header('Location:' . URLROOT . '/home');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $success = $this->member_model->login($_POST['username'], $_POST['password']);
            if ($success) {
                $current = $this->member_model->watch($_POST['username']);
                $_SESSION['student_id'] = $_POST['username'];
                $_SESSION['name'] = $current->name;
                $_SESSION['avatar'] = $current->avatar;
                header('Location:' . URLROOT . '/home');
            }
            else
                header('Location:' . URLROOT);
        }
    }

    public function logout() {
        unset($_SESSION['student_id']);
        header('Location:' . URLROOT);
    }

    public function watch($student_id) {
        if (isset($_SESSION['student_id'])) {
            $profile_data = $this->member_model->watch($student_id ?? $_SESSION['student_id']);
            $this->view('profile', ['profile_data' => $profile_data]);
        }
        else
            header('Location:' . URLROOT);
    }
}