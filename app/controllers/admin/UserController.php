<?php
 
namespace app\controllers\admin;

use vendor\Controller;
use app\models\User;

class UserController extends Controller 
{
    // read all users
    public function index() 
    {
        $users = User::selectAll();

        // update user role
        if(isset($_POST['update_id'])) {
            User::updateRole($this->post());
            
            return $this->redirect('users');
        }

        // delete user from db
        if(isset($_POST['delete_id'])) {
            User::delete($this->post('delete_id'));
            
            return $this->redirect('users');
        }

        return $this->view('admin/users/index', compact('users'));
    }
}
