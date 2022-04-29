<?php

namespace App\Controller;

use App\Routes;

class LoginController extends AbstractController
{

    /**
     * Display login page and process form data if sent
     *
     * @return string
     */
    function loginAction(): string
    {
        // Check if user is logged in already
        if ($this->isLoggedIn()) {
            redirect(Routes::INDEX);
        }

        // Store entered form values and error messages
        $formValues = [];
        $formErrors = [];

        // Check if form has been sent
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $userId = $this->db->getUserId($username) ?? 0;
            $passHash = $this->db->getPasswordHash($userId);
            if (password_verify($password, $passHash)) {
                // Correct password
                $_SESSION['userId'] = $userId;
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;
                redirect(Routes::INDEX);
            } else {
                $formValues['username'] = $username;
                $formErrors['login'] = 'Username or password incorrect.';
            }
        }

        $parameters = [
            'loggedIn' => $this->isLoggedIn(),
            'formValues' => $formValues,
            'formErrors' => $formErrors,
        ];
        return $this->twig->render('login.html.twig', $parameters);
    }

    /**
     * Logout the user if they are logged in
     *
     * @return void
     */
    function logoutAction(): void
    {
        // Check if user is logged in
        if ($_SESSION['loggedIn'] ?? false) {
            session_destroy();
        }

        redirect(Routes::LOGIN);
    }
}