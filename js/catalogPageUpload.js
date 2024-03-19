const likeCarEventHandler = async (ev) =>{
  const carId = ev.target.dataset.carid;
  let isLiked = ev.target.dataset.selected;
  let response = await fetch(`likeCar.php?car-id=${carId}&is-liked=${isLiked}`);
  let res = await response.json();
  if(res == "Auth required"){
    alert("Для добавления в избранное требуется авторизация");
  }
  else if(res == "OK"){
    isLiked = isLiked == 'true' ? 'false' : 'true';
    response = await fetch(`classes/getLikeButton.php?isLiked=${isLiked}`);
    res = await response.json();
    ev.target.setAttribute('src', res);
    ev.target.dataset.selected = isLiked;
  }
}

const clickOnCarCardEventHandler = (ev) =>{
  const carId = ev.target.closest('.car-card').dataset.carid;
  if(ev.target.dataset.isNotClickable !== undefined)
    return;
  window.location = `productpage.php?car-id=${carId}`;
}

const makeReservationEventHandler = async (ev) =>{
  const carId = ev.target.dataset.carid;
  let isReserved = ev.target.dataset.reserved;
  let response = await fetch(`makeReservation.php?car-id=${carId}&is-reserved=${isReserved}`);
  let res = await response.json();
  if(res == "Auth required"){
    alert("Чтобы забронировать автомобиль необходимо авторизоваться");
    return;
  }
  let question = isReserved == 'true' ? "Вы действительно хотите отменить бронирование?" : "Вы действительно хотите забронировать автомобиль? После успешного бронирования вам перезвонит менеджер для согласования времени";
  let isContinue = confirm(question);
  if(!isContinue)
    return;
  if(res == "OK"){
    isReserved = isReserved == 'true' ? 'false' : 'true';
    ev.target.innerHTML = isReserved == 'true' ? 'Забронирована' : 'Забронировать';
    ev.target.dataset.reserved = isReserved;
  }
  else if(res == "Error"){
    alert("Выбранный автомобиль сейчас забронирован");
  }
}

const canselIfCursorOnBtn = () =>{
  document.querySelectorAll('.make-reservation-btn')
    .forEach(el => {
      el.addEventListener("mouseover", function() {
        if(this.dataset.reserved == 'true')
          this.innerHTML = "Отменить";
      });
      el.addEventListener("mouseout", function() {
        if(this.dataset.reserved == 'true')
          this.innerHTML = "Забронирована";
      });
    });
}

const init = () =>{
  document.querySelectorAll('.like-button').forEach(el => el.onclick = likeCarEventHandler);
  document.querySelectorAll('.car-card').forEach(el => el.onclick = clickOnCarCardEventHandler);
  document.querySelectorAll('.make-reservation-btn').forEach(el => el.onclick = makeReservationEventHandler);
  canselIfCursorOnBtn();
}

init();
