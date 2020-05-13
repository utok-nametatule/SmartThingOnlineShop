//Подключение xml-файла
var doc = document.getElementById("purchase-order").contentDocument;
var Items = doc.getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML", "Figure");
//Вывод в html
var code = "";
var codes="";
//Для вывода формата денежнего
function formatMoney(num)
{
  if (Math.floor(Number(num)/1000) == 0)
    return Math.floor(Number(num)%1000);
  else
    return Math.floor(Number(num)/1000) +" "+ Math.floor(Number(num)%1000);
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

//Вывод каталога товара
function setStore()
{
  codes="";
  code = "";
  for(var i=0;i<Items.length;i++)
    setItem(i);
  //Вывод ифнормации
  document.getElementById('article').innerHTML+=code;   
  //Задание событий кнопкам В корзину
  setEventForButtons();
  //Функция на задание модальных окон
  Modal();

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
  //Подробности для модального окна
  var modal = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML" ,"modal")[0].textContent;
  //Общий шаблон выаода о предмете
  code+="<figure ><a href='#' class='js-open-modal' data-modal='"+(i+1)+"'><img class='pics' src='"+img+"' alt='item1'></a><div class='modal' data-modal='"+(i+1)+"'><img class='modal__cross js-modal-close' src='images/crest.png'><p class='modal__title'>"+modal+"</p></div><div class='overlay js-overlay-modal'></div><figcaption class='item_box'> <p class='price'>"
  if (Number(old) != 0)
    code+="<old>"+old+"</old> ";            
  code+="<span class='item_price'>"+ price+"</span> руб</p><p class='context'>"+context+"</p><button class='buy add_item' onclick='countItems()' data-id='"+(i+1)+"' ><img src='images/basketw.png' alt='В корзину'>В корзину</button></figcaption></figure>";     
  
}


//Для фильтра
var cost=50990;

//При перемещении ползунка для стоимости во фильтре
function dragMoney(obj)
{
  document.getElementById("money").innerHTML = formatMoney(obj.range.value) + " р.";
  cost=obj.range.value;
}
  
//Для категории
var cate = "";

//Фильтр на категорию
function setCategories(s)
{
  //Получение категории
  cate=s;
  code = "";
  //Очистка предыдущих предметов
  document.getElementById('article').innerHTML= "";
  for(var i=0;i<Items.length;i++)
  {
    //Категория
    var categories = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","categories")[0].textContent;
    //Вывод предметов под нужную категорию
    if (categories == s)
      setItem(i);      
  }
  document.getElementById('article').innerHTML+=code;
  //Задание событий кнопкам В корзину
  setEventForButtons();
  //Функция на задание модальных окон
  Modal();
}
     
//Массив для брендов
var choosenBrand = new Array("");

//Получаем бренд
function getBrand(obj)
{
  //Если он выбран то добавляет его
  if (obj.checked == true)
  {
      choosenBrand[choosenBrand.length] = obj.value;
  }
  else
  {
    //Если нажали для того чтобы убрать, убирает его из списка
    for (var i = 0;i < choosenBrand.length;i++)
      if (obj.value == choosenBrand[i])
        choosenBrand[i] = "";
  } 
}

//Главная функция для фильтров
function Filters()
{
  code = "";
  document.getElementById('article').innerHTML= "";
  var bool = true;
    //Проверка на наличие в фильтре брендов
    for (var i=0; i <= choosenBrand.length;i++)
      if (choosenBrand[i] != "")
        bool = false;
  
  for(var i=0;i<Items.length;i++)
  {
    //Получение категории, брендов и стоисоти
    var categories = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","categories")[0].textContent;
    var brand = Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","brand")[0].textContent;
    var price = Number(Items[i].getElementsByTagNameNS("http://example.mozilla.org/PurchaseOrderML","price")[0].textContent);
    
    //Проверка под фильтры
    
      if (cate!="")
      {
        if (bool = false)
        {
          for (var j = 0;j < choosenBrand.length;j++)
          {
            if (brand == choosenBrand[j] && ((price>990) && (price < cost)) && categories == cate)
            setItem(i);  
          }
        }
        else
        {
          if (((price>990) && (price < cost)) && categories == cate)
            setItem(i);  
        }
      }
      else
      {
        if (bool = false)
        {
          for (var j = 0;j < choosenBrand.length;j++)
          {
            if (brand == choosenBrand[j] && ((price>990) && (price < cost)))
              setItem(i);
          }
        }
        else
        {
          if ((price>990) && (price < cost))
            setItem(i);
        }
      }
    
      
          
  }
  document.getElementById('article').innerHTML+=code;
  setEventForButtons();
  //Функция на задание модальных окон
  Modal();
}


