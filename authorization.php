<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Вход</title>
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
        if(!empty($_POST['login']) and !empty($_POST['password'])){
          require __DIR__ . '/auth.php';
          session_start();
          $login = $_POST['login'];
          $location = $_COOKIE['request'] ?? "index.php";
          $user = getUserByLoginIfExist($login);
          
          if (!empty($user)) {
            $hash = $user['password'];
  
            if (password_verify($_POST['password'], $hash)) {
              $_SESSION['auth'] = true;
              $_SESSION['id'] = $user['id'];
              $_SESSION['username'] = $user['name'];
              header("Location: $location");
            } 
            else {
              echo("<p>Неправильный логин или пароль</p>");
            }
          } 
          else {
            echo("<p>Неправильный логин или пароль</p>");
          }
        }
      ?>
      <form form action="authorization.php" method="post">
      <a href="index.php"><img
          class="mb-4"
          src="image/carlogo.png"
          alt=""
          width="120"
          height="40"
        /></a>
        <h1 class="h3 mb-3 fw-normal">Вход</h1>

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

        <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
      </form>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
