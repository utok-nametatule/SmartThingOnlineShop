var d = document,
    itemBox = d.querySelectorAll('.item_box'); // блок каждого товара 

// Получаем данные из LocalStorage
function getCartData()
{
  return JSON.parse(localStorage.getItem('cart'));
}

// Записываем данные в LocalStorage
function setCartData(o){
  localStorage.setItem('cart', JSON.stringify(o));
  return false;
}

//Добавление в корзину
function addToCart(e)
{
  this.disabled = true;
  var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
      parentBox = this.parentNode,// родительский элемент кнопки "Добавить в корзину"
      itemId = this.getAttribute('data-id'), // ID товара
      itemTitle = parentBox.querySelector('.context').innerHTML, // название товара
      itemPrice = parentBox.querySelector('.item_price').innerHTML; // стоимость товара
  if(cartData.hasOwnProperty(itemId))
  {
    // если такой товар уже в корзине, то добавляем +1 к его количеству
    cartData[itemId][3] += 1;
  } 
  else 
  {
    // если товара в корзине еще нет, то добавляем в объект
    cartData[itemId] = [itemId, itemTitle, itemPrice, 1];
  }
  if(!setCartData(cartData))
  { 
    // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
    // Пересчет предметов в корзине
    var sum=0;
    for(var items in cartData)
      sum+=Number(cartData[items][3]);
    document.getElementById("number-items").value=sum;
  }
 return false;
 
}

//Корзина
var cartData = getCartData();

//Загрузка корзины
function openCart(e){
      var totalItems = '';
      var total=0;
  // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if(cartData !== null)
  {
    //Заголовок таблицы
    totalItems = '<table class="shopping_list"><tr class="top" ><th width="10%">Код товара</th><th>Наименование</th><th width="10%">Цена</th><th width="10%">Кол-во</th><th width="10%">Сумма</th><th width="10%">Удаление</th></tr>';
    //Выгрузка иформации о предмете
    for(var items in cartData)
    {
      totalItems += '<tr>';
      //Каждый отдельный элемент
      for(var i = 0; i < cartData[items].length; i++)
      {
        //Код товара и наименование
        if((i!=cartData[items].length-1)&&(i!=2))
          totalItems += '<td>' + cartData[items][i] +  '</td>';
        //Стоимость за одну вещь
        if(i==2)
          totalItems += '<td>' + cartData[items][i] +  ' руб.</td>';
        //Количество этого товара
        if(i==cartData[items].length-1)
          totalItems += '<td><input id="'+cartData[items][0] +'" value="' + cartData[items][i] +  '" onchange="changecount(this);countItems();" type="number" min="1" max="99"></td>';
      }
      //Подсчет суммы за этот товар
      totalItems += '<td id="s' +cartData[items][0]+'">'  +(Number(cartData[items][2])*Number(cartData[items][3]))+' руб.</td>';
      //Подсчет итоговой суммы
      total+=(Number(cartData[items][2])*Number(cartData[items][3]));
      //Кнопка на удалить предмет
      totalItems += '<td ><button row-id="'+cartData[items][0]+'" onclick="deleterow(this);countItems();" title="Удалить предмет"><img src="images/delete.png" ></button></td></tr>';
    }
    //Вывод общей стоимости, кнопки очитсить и оформить заказ
    totalItems += '<tr><td colspan="3" class="itog">Общая стоимость: '+ total + ' руб.</td><td colspan="3" align="left"><button onclick="clearCart();countItems();" class="clear" title="Стереть"><img src="images/clear.png" ></button></td></tr>';
    totalItems += '<tr><td class="last" colspan="6" align="center"><a href="" class="buy" onclick="setZakaz();clearCart();countItems();">Оформить заказ</a></td></tr>';
    totalItems += '</table>';
    //Выгрузка в HTML
    document.getElementById("cart_content").innerHTML = totalItems;
  } 
  else 
  {
    // если в корзине пусто, то сигнализируем об этом
    document.getElementById("cart_content").innerHTML = 'В корзине пусто';
  }
  // если в корзине пусто, то сигнализируем об этом
  if (Object.keys(cartData).length == 0) 
  {
    document.getElementById("cart_content").innerHTML = 'В корзине пусто';
  }
  return false;
}

//Очистка всей корзины
function clearCart(e){
  localStorage.removeItem('cart');
  document.getElementById("cart_content").innerHTML = 'В корзине пусто!';
  countItems();
}

//Изменяет итоговую сумму каждой вещи
function changecount(e)
{
  cartData[e.id][3] = e.value;
  document.getElementById("s"+e.id).innerHTML=cartData[e.id][2]*cartData[e.id][3];
  //Перезаписывает всю таблицу
  setCartData(cartData);
  openCart();
  //Пересчет общего количества предметов в корзине
  countItems();
}

//Удаление одной вещи
function deleterow(e){
  delete cartData[e.getAttribute('row-id')];
  //Перезаписывает всю таблицу
  setCartData(cartData); 
  openCart();
  //Пересчет общего количества предметов в корзине
  countItems();
}

//Пересчет общего количества предметов в корзине
function countItems(){
  var sum=0;
  for(var items in cartData)
    sum+=Number(cartData[items][3]);
  document.getElementById("number-items").value=sum;
}

//Оповещение об оформлении заказа
function setZakaz(){
  alert("Ваш заказ принят, ожидайте, с вами свяжутся!");
}