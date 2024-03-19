<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Регистрация</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link href="style/sign-in.css" rel="stylesheet" />
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
      <?php
        if (!empty($_POST['login']) and !empty($_POST['user-name']) and !empty($_POST['password'])) {
            require __DIR__ . '/auth.php';
            session_start();
            $login = $_POST['login'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userName = $_POST['user-name'] ?? '';
            $location = $_COOKIE['request'] ?? "index.php";
            
            $userResult = checkReg($login, $password, $userName);
            if ($userResult != null) {
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userResult;
                $_SESSION['username'] = $userName;
                header("Location: $location");
            } else { 
                echo("<p>Пользователь с таким номером уже существует</p>");
            }
        }
      ?>
      <form form action="registration.php" method="post">
       <a href="index.php"><img
          class="mb-4"
          src="image/carlogo.png"
          alt=""
          width="120"
          height="40"
        /></a>
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-floating">
          <input
            class="form-control"
            id="floatingInput"
            placeholder="Имя"
            name="user-name"
          />
          <label for="floatingInput">Имя</label>
        </div>
        <div class="form-floating">
          <input
            type="tel"
            class="form-control"
            id="floatingTel"
            placeholder="Телефон"
            name="login"
          />
          <label for="floatingTel">Телефон</label>
        </div>
        <div class="form-floating">
          <input
            type="password"
            class="form-control"
            id="floatingPassword"
            placeholder="Пароль"
            name="password"
          />
          <label for="floatingPassword">Пароль</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
      </form>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
