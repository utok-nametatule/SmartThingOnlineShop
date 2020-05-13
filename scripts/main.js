//Подключение xml-файла
var doc = document.getElementById("purchase-order").contentDocument;
var Items = doc.getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML", "Figure");
//Вывод в html
var code = "";


//Вывод информации про новость на главной странице
function setNews()
{
  document.querySelector('.items').style="display:none";
  document.querySelector('.slider').style="display:block";
}

function setItem(i)
{
  //Описание предмета
  var context = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML" ,"context")[0].textContent;
  //Ссылка на картинку
  var img = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","img")[0].textContent;
  //Стоимость
  var price = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","price")[0].textContent;
  //Для акции цена (старая)
  var old = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","old")[0].textContent;
  //Общий шаблон выаода о предмете
  code+="<figure><p><img class='pics' src='"+img+"' alt='item1'></p><figcaption class='item_box'> <p class='price'>"
  if (Number(old) != 0)
    code+="<old>"+old+"</old> ";            
  code+="<span class='item_price'>"+ price+"</span> руб</p><p class='context'>"+context+"</p><button class='buy add_item' onclick='countItems()' data-id='"+(i+1)+"' ><img src='images/basketw.png' alt='В корзину'>В корзину</button></figcaption></figure>";     
}

//Функция для добавления события и функции
function addEvent(elem, evType, fn) 
{
  if (elem.addEventListener) 
    elem.addEventListener(evType, fn, false);
  else 
  {
    if (elem.attachEvent) 
      elem.attachEvent('on' + evType, fn)
    else 
        elem['on' + evType] = fn
  }  
}

//Создает события для кнопок В корзину
function setEventForButtons()
{
  var d = document,
      itemBox = d.querySelectorAll('.item_box'); // блок каждого товара
  for(var i = 0; i < itemBox.length; i++)
  {
    
    addEvent(itemBox[i].querySelector('.add_item'), 'click', countItems);
    addEvent(itemBox[i].querySelector('.add_item'), 'click', addToCart);
  } 
}

//Для главной страницы вывод акций
function setIndex()
{
  document.querySelector('.slider').style="display:none";
  document.querySelector('.items').style="display:flex";
  code="";
  document.getElementById('article').innerHTML=code;  
  for(var i=0;i<Items.length;i++)
  {
    //Проверка на то имеет ли он акцию предмет
    var old = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","old")[0].textContent;
    if (Number(old) != 0)
      setItem(i);
  }
  
  document.getElementById('article').innerHTML=code; 
  //Задание событий кнопкам В корзину
  setEventForButtons();
}