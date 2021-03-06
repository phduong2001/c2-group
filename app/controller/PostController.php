<?php
class PostController extends Controller {

    private $post_model;

    public function __construct() {
        $this->post_model = $this->model('PostModel');
    }

    public function create() {
        if (isset($_SESSION['student_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $this->post_model->create(
                    $_SESSION['student_id'],
                    $_POST['post'],
                    Storage::get_instance()->save_file('pin-file', 'data/post/')
                );
                header('Location:' . URLROOT . '/home');
            }
        }
    }

    public function comment($post_id) {
        if (isset($_SESSION['student_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if (!empty($_POST['comment'])) {
                    $comment_id = $this->post_model->comment(
                        $_SESSION['student_id'],
                        $post_id,
                        $_POST['comment']
                    );
                    $comment = $this->post_model->get_comment_by_id($comment_id);
                    $comment->creator = URLROOT . '/member/watch/' . $comment->creator;
                    $comment->avatar = URLROOT . '/data/img/' . $comment->avatar;
                    if (!isset($comment->file))
                        $comment->file = 'empty';
                    echo Storage::get_instance()->array_to_xml($comment);
                }
            }
        }
    }
}