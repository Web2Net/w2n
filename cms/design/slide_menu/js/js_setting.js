$(function(){ $('.slide-out-div').tabSlideOut({tabHandle: '.handle',
pathToTabImage: '/cms/design/slide_menu/images/butt_menu.gif',    //путь к изображению "обязательно"           
imageHeight: '200px',                        //высота изображения "обязательно"
imageWidth: '30px',                           //ширина изображения "обязательно"   
tabLocation: 'left',  //сторона где будет вкладка top, right, bottom, или left
speed: 300,                                   //скорость анимации
action: 'click',   //опции=: 'click' или 'hover', анимация при нажатии или наведении
topPos: '30px',    //расположение от верхнего края/ использовать если tabLocation = left или right
fixedPosition: false    //опции (false/true): true сделает данную вкладку неподвижной при скролле
             });
         });
