<?php

namespace app\controllers\site;

use vendor\Controller;
use app\models\User;

class UserController extends Controller 
{    
    //create in DB new user
    public function register()
    {
        $errorReg = '';
        if(!empty($this->post())) {

            $errorReg = User::insertUser($this->post());
            if(!$errorReg) {
                $errorReg = "Авторизовано, увійдіть в свій аккаунт";
                // return $this->redirect('home');
                return $this->view('site/login', compact('errorReg'));
            }
        }
        return $this->view('site/registr', compact('errorReg'));
        
    }

    //login user on site
    public function login() 
    {
        $loginError = '';
        if(!empty($this->post())) {
            $loginError = User::login($this->post());
            if(!$loginError) {
                return $this->redirect('home');
            }
        }
        
        return $this->view('site/login', compact('loginError'));
    }

    //logout
    public function logout() 
    {
        unset($_SESSION['user']);

        return $this->redirect('home');
    }

    //cabinet
    public function cabinet() 
    {
        return $this->view('site/cabinet');
    }

    //update user data
    public function update() 
    {
        $_SESSION['user'] = User::update($this->post());

        return $this->redirect("cabinet");
    }

    //delete user from db
    public function delete()
    {
        User::delete($this->post('id'));

        unset($_SESSION['user']);

        return $this->redirect("home");
    }


}