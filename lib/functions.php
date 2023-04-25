<?php

function asset(string $path)
{
    return BASE_URL . '/' . $path;
}


function constructUrl(string $routeName, array $params = [])
{

    // Si la route donnée en paramètre n'existe pas, on lance une Exception
    if (!array_key_exists($routeName, ROUTES)) {
        throw new Exception('ERREUR : pas de route nommée' . $routeName);
    }

    $url =  BASE_URL . '/index.php' . ROUTES[$routeName]['path'];

    if ($params) {
        $url .= '?' . http_build_query($params);
    }

    return $url;
}



function validateCommentForm(string $nickname, string $content)
{
    $errors = [];

    if (!$nickname) {
        $errors['nickname'] = 'Le champ "pseudo" est obligatoire';
    }

    if (strlen($content) < 10) {
        $errors['content'] = 'Le commentaire doit comporter au moins 10 caractères';
    }

    return $errors;
}


// function validateContactForm(string $email, string $subject, string $content)
// {
//     $errors = [];

//     if (!$email) {
//         $errors['email'] = 'Le champ "email" est obligatoire';
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "L'email doit être valide";
//     }

//     if (!$subject) {
//         $errors['subject'] = 'Le champ "subject" est obligatoire';
//     }

//     if (!$content) {
//         $errors['content'] = 'Le champ "message" est obligatoire';
//     }
// }
