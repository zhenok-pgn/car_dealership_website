<header class="p-3 text-bg-white shadow-sm">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a
            href="index.php"
            class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
          >
            <svg class="bi me-2" width="100" height="45" role="img">
              <use xlink:href="#bootstrap" />
              <image
                xlink:href="image/carlogo.png"
                x="0"
                y="0"
                height="45px"
                width="100px"
              />
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-3 text-secondary-emphasis">Купить автомобиль</a></li>
            <li><a href="#" class="nav-link px-3 text-secondary-emphasis">Выкуп автомобиля</a></li>
            <li><a href="#" class="nav-link px-3 text-secondary-emphasis">Акции</a></li>
            <li><a href="#" class="nav-link px-3 text-secondary-emphasis">Контакты</a></li>
          </ul>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-1" role="search" action="catalog.php" method="get">
            <div class="row">
            <input
              type="search"
              class="col form-control form-control-dark text-bg-light mx-1"
              placeholder="Поиск автомобиля"
              aria-label="Search"
              name="car-name"
            />
            <input class="col-3 btn btn-outline-secondary mx-1" type="submit" value="Поиск">
            </div>
          </form>

          <div class="ms-3 text-end">
            <?php 
            session_start();
            if (empty($_SESSION['auth'])): ?>
            <a href="registration.php" type="button" class="btn btn-primary">Зарегистрироваться</a>
            <a href="authorization.php" type="button" class="btn btn-primary">Войти</a>
            <?php else: ?>
              <a href="profile.php" type="button" class="btn btn-primary"><?php echo($_SESSION['username'])?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header>