<?php
use Application\App;

require_once "bootstrap.php";
$config = require_once "config/local.php";

$application = new App($config);
$application->setRouter(new $config['router']['class']);
$application->getRouter()->setRoutes([
    '/' => function () use ($application) {
        $application->getViewManager()->setViewPath('public/views/home.php');
        $application->getViewManager()->renderView();
    },
    'code' => function () use ($application) {
        header('Content-Type: application/json');
        $codeGenerator = new \Application\Components\SmsCodeGenerator();
        echo json_encode([
            'code' => $codeGenerator->generateCode()->getCode(),
            'error' => false
        ]);
    },
    'registration' => function () use ($application) {
        $codeConfirmed = $_COOKIE['codeConfirmed'];
        if ($codeConfirmed) {
            $authConfirmed = isset($_COOKIE['authConfirmed']) ? $_COOKIE['authConfirmed'] : false;
            if ($authConfirmed) {
                header('Location: ' . '/?r=profile');
            } else {
                $registrationForm = new \Application\Forms\RegistrationForm();
                if ($registrationForm->load($_POST) && !$registrationForm->hasErrors()) {
                    setcookie('authConfirmed', 1);
                    setcookie('fullName', $registrationForm->fullName);
                    setcookie('phone', $registrationForm->phone);
                    setcookie('email', $registrationForm->email);
                    setcookie('password', $registrationForm->password);
                    header('Location: ' . '/?r=profile');
                } else {
                    $application->getViewManager()->setViewPath('public/views/registration.php');
                    $application->getViewManager()->renderView(['errors' => $registrationForm->getErrors()]);

                }
            }

        } else {
            header('Location: ' . '/');
        }
    },
    'profile' => function () use ($application) {
        $authConfirmed = isset($_COOKIE['authConfirmed']) ? $_COOKIE['authConfirmed'] : false;
        if ($authConfirmed) {
            $application->getViewManager()->setViewPath('public/views/profile.php');
            $application->getViewManager()->renderView();
        } else {
            header('Location: ' . '/');
        }
    },
    'logout' => function () use ($application) {
    }
]);

$application->run();