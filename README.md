#ms2Extend
Компонент для расширения функционала miniShop2

##Функционал модуля

###Расширение стандартных классов оформления зазказа
Находятся в папке:
    
    core/components/ms2extend/ms2

Необходимо зарегестрировать через метод регистрации сервисов miniShop2

* cart
    * Расширение класса **msCartHandler**
* order
    * Расширение класса **msOrderHandler**
* delivery
    * Расширение класса **msDeliveryHandler**
* payment
    * Расширение класса **msPaymentHandler**
    
###Расширение стандартного функционала JS и CSS
* JS файл по умолчанию находится в
        
        assets/components/ms2extend/js/web/default.js
        
    * возможно изменение пути через системную настройку
    
            ms2ext_frontend_js
            
* CSS файл по умолчанию находится в
        
        assets/components/ms2extend/сыы/web/default.css
        
    * возможно изменение пути через системную настройку
    
            ms2ext_frontend_css

###Добавление функционала создания дополнительных вкладок товара с характеристиками в админке
Управление доступно по адресу админки

    /manager/?a=mgr/producttabs&namespace=ms2extend

##Список элементов админки

###Пространства имён
* ms2extend
    * Путь к ядру: **{core_path}components/ms2extend/**
    * Путь к активам: **{assets_path}components/ms2extend/**

###Верхнее меню
* 
    * Ключ словаря: **ms2ext**
    * Описание: **ms2ext.management**
    * Пространство имён: **ms2extend**

###Плагины
* ms2extend

###Системные настройки
* ms2ext_frontend_js
* ms2ext_frontend_css