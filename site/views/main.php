<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

    <script src="/site/static/js/reg.js"></script>

    <title><?php
        if (isset($data["title"])) {
            echo $data["title"];
        } else {
            echo "Главная страница";
        }

        ?>
    </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">


    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/registration">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile/all">Список пользователей</a>
            </li>

        </ul>
        <span class="nav-item">
            <?php
            if (isset($data["user"])) {
                echo '<a class="nav-link d-inline" href="/profile">Здравствуйте, ' . $data["user"]["full_name"] . '.</a>, ' .
                    '<a class="nav-link" href="/login/exit">Выйти</a>';
            } else {

                echo '<a class="nav-link" href="/login">Войти</a>';
            }

            ?>
        </span>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" placeholder="Search" type="text">-->
        <!--            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->

    </div>
</nav>


<div class="container">
    <div class="row">

        <?php
        if (isset($this->content_template)) {
            include "site/views/" . $this->content_template;
        }else{

            echo "

        <ul class=\"mt-3\">
            <li>
                <a class=\"\" href=\"/\">Главная</a>
            </li>


            <li>
                <a class=\"\" href=\"/login\"> /login - Страница логина (недоступна, если пользователь залогинен (выбрасывает на главную))</a>
            </li>


            <li>
                <a class=\"\" href=\"/registration\"> /registration - Страница регистрации (недоступна, если пользователь залогинен (выбрасывает на профиль))</a>
            </li>


            <li>
                <a class=\"\" href=\"/profile\"> /profile - Профиль текущего юзера</a>
            </li>


            <li>
                <a class=\"\" href=\"/profile/all\"> /profile/all - Профили всех юзеров из базы (страница доступна только вошедшим пользователям)</a>
            </li>


            <li>
                <a class=\"\" href=\"\"> /profile?user=example@example.com - профиль по почте</a>
            </li>

        </ul>";
        }
        ?>
    </div>
</div>


</body>
</html>