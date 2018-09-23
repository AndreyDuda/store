
//Burger menu в моб. версии
$(document).ready(function(){
	$('.fa-bars').on('click', function(event){
			$('.menu-left-mobile').slideToggle();
			event.stopPropagation();
		});

	$('.page').click(function () {
		var page = $(this).text();
		$('#page').val(page);
		$('#send').click();
	});
	$('.checkbox').click(function () {
        $('#page').val(1);
    });

	$('.sort').change(function () {
        var value = $('.sort option:selected').val();
        $('#sort').val(value);
        $('#send').click();
    });

    //$('.product-buy, .pruduct-plust').on('click', function() {
	$('main').on('click', '#del_prod', function(){
        var id    =  $(this).data('id');
        var minus =  $(this).data('minus');
        var count_product = 0;
        var url   = '/delProd';
        var total = 0;
        var count =  parseInt($('.product-count'+id).text());
        var jpg = '';
        $.ajax({
            type:'POST',
            url:url,
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            data:{id:id},
            datatype:'JSON',
            success: function(data) {

                console.log(data);
                var tableHead = '<tr>' +
                    '<th>Наименование товара</th>' +
                    '<th>Цена за шт.</th>' +
                    '<th class="coli">Кол-во</th>' +
                    '<th>Общая стоимость</th>' +
                    '<th>Удалить</th>' +
                    '</tr>';
                var start = '';
                var urlImg = $('#url').val();
                $('.ttt tbody').empty();
                $('.ttt tbody').append(tableHead);

                $.each(data, function(index, value){
                    jpg = (value.photo.trim() == 'system/no-image')? '.png':'.jpg';
                    start += '<tr data-id="'+value.id+'"><td><div class="cart-product-info"><img src="'+urlImg +  (value.photo) + jpg+'" ><div>' +
                        '<a href="#" class="cart-product-company">' + value.lable + '</a><br><a href="#" class="cart-product-title">' + value.title + '</a>' +
                        '<p class="cart-product-code"><span></span> </p></div></div></td><td class="font-politica">' + value.price + '<span> $</span></td>' +
                        '<td class="cart-quantity"><span><i data-minus="1" data-id="'+value.id+'" data-url="'+value.url+'" class="fa fa-minus-circle product-minus" aria-hidden="true"></i></span><p class="product-count'+value.id+'">' + value.count + ' уп.</p>'+
                        '<span><i  data-id="'+value.id+'" data-url="'+value.url+'"  class="fa fa-plus-circle pruduct-plust" aria-hidden="true"></i></span></td><td class="font-politica">' + ((value.count*parseInt(value.count_in_pack))*value.price) + '<span> $</span></td><td data-id="'+value.id+'"><span style="font-weight: 800; cursor: pointer; color:red" data-id="'+value.id+'" id="del_prod" title="Удалить">X</span></td></tr>';
                    total += value.count*value.price;
                    count_product += 1;
                });
                $('.ttt tbody').append(start);
                $('.total span').empty();
                $('.total span').append(total);
                $('#count-cart').empty();
                $('#count-cart').text(count_product);
                $('.modal-cart').css('display', 'block');
            },
            error:function() {
                console.log('ERRORE');
            }
        });
	});

	$('main').on('click','.product-buy, .pruduct-plust, .product-minus', function() {
		var id    =  $(this).data('id');
        var minus =  $(this).data('minus');
        var count_product = 0;
        var count =  parseInt($('.product-count'+id).text());
        var jpg = '';


        if(minus == '1'){
        	if(count > 0){
                minus = true;
			}else{
        		return false;
			}

		}else{
        	minua = false;
		}

		var url   = '/by';
		var total = 0;
            $.ajax({
                type:'POST',
                url:url,
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
				data:{id:id, minus:minus},
                datatype:'JSON',
                success: function(data) {


                    var tableHead = '<tr>' +
										'<th>Наименование товара</th>' +
										'<th>Цена за шт.</th>' +
										'<th class="coli">Кол-во</th>' +
										'<th>Общая стоимость</th>' +
										'<th>Удалить</th>' +
									'</tr>';
                    var start = '';
                    var urlImg = $('#url').val();
                    $('.ttt tbody').empty();
                    $('.ttt tbody').append(tableHead);

                    $.each(data, function(index, value){

                    	jpg = (value.photo.trim() == 'system/no-image')? '.png':'.jpg';
                        start += '<tr><td><div class="cart-product-info"><img src="'+urlImg +  (value.photo) + jpg+'" ><div>' +
                        '<a href="#" class="cart-product-company">' + value.lable + '</a><br><a href="#" class="cart-product-title">' + value.title + '</a>' +
                        '<p class="cart-product-code"><span></span> </p></div></div></td><td class="font-politica">' + value.price + '<span> $</span></td>' +
                        '<td class="cart-quantity"><span><i data-minus="1" data-id="'+value.id+'" data-url="'+value.url+'" class="fa fa-minus-circle product-minus" aria-hidden="true"></i></span><p class="product-count'+value.id+'">' + value.count + ' уп.</p>'+
						'<span><i  data-id="'+value.id+'" data-url="'+value.url+'"  class="fa fa-plus-circle pruduct-plust" aria-hidden="true"></i></span></td><td class="font-politica">' + ((value.count*parseInt(value.count_in_pack)*value.price)) + '<span> $</span></td><td><span style="font-weight: 800; cursor: pointer; color:red" data-id="'+value.id+'" id="del_prod" title="Удалить">X</span></td></tr>';
                        total += ((value.count*parseInt(value.count_in_pack)*value.price));
                        count_product += 1;
                      });
                    $('.ttt tbody').append(start);
                    $('.total span').empty();
                    $('.total span').append(total);
                    $('#count-cart').empty();
                    $('#count-cart').text(count_product);
                    $('.modal-cart').css('display', 'block');
                },
                error:function() {
                    console.log('ERRORE');
                }
            });
    });



    $('.search input').keyup(function () {
        var search = $('.search input').val();
        var url = '/search';
        var urlImg = $('#url_maine').val();
        var prod = '';
        var jpg = '';
        var img_product = $('#url_product').val();
        $.ajax({
            type:'POST',
            url:url,
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            data:{search:search},
            datatype:'JSON',
            success: function(data) {
                /*console.log(data);*/
                $('.search ul:first').show();
                /*console.log(data.eq(i));*/
				data = jQuery.parseJSON(data);
                for(var i=0;i<data.length; i++){
                    jpg = (data[i].photo == 'system/no-image')? '.png':'.jpg';
                    prod += '<li class="flex"><a href="'+img_product+'/'+data[i].id+'"><img src="'+urlImg +  (data[i].photo) + jpg+'"><p>'+data[i].label+'</p></a></li>'
				}
                $('.search ul:first').empty();
                $('.search ul:first').append(prod);


            },
            error:function() {

            }
        });

        $('main').click(function () {
            $('.search ul:first').hide();
        })


    });




});

//Прокрутка вверх scrollTop
(function($) {
	$(function() {
	  $('#up').click(function() {
	    $('html, body').animate({scrollTop: 0},800);
	    return false;
	  })
	})
})(jQuery);

//Аккордеон - Фильтры товаров
$(document).ready(function(){
	$('.filter-header').on('click', function(){
		$(this).next().slideToggle();
		if($(this).children().hasClass('fa-minus')){
			$(this).children().removeClass('fa-minus');
			$(this).children().addClass('fa-plus');
		}else{
			$(this).children().removeClass('fa-plus');
			$(this).children().addClass('fa-minus');
		}

	})
});

//Фильтры товаров в моб. версии
$(document).ready(function(){
	$('.filter-button').on('click', function(event){
			$('.filter-header').next().slideToggle();
			$('aside').slideToggle();
			event.stopPropagation();
			$('.filter-header').children().removeClass('fa-minus');
			$('.filter-header').children().addClass('fa-plus');
		});
});

//Slider Product
$(document).ready(function(){
	$('.slider-product').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			arrows: false,
			asNavFor: '.slider-product-nav'
		});
		$('.slider-product-nav').slick({
			slidesToShow: 4,
			asNavFor: '.slider-product',
			focusOnSelect: true
		});
	$('.slider_item').zoom({
		on:'grab',
		magnify: '2'
	});
});

//Slider Catalog
$(document).ready(function(){
  $('.multiple-item').slick({
  	infinite: true,
  	autoplay: true,
  	autoplaySpeed: 2000,
  	slidesToShow: 5,
  	slidesToScroll: 1,
  	responsive: [
    {
      breakpoint: 1200,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 5
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4
      }
    },
    {
     breakpoint: 768,
      settings: {
       slidesToShow: 3
  	  }
    },
    {
	 breakpoint: 576,
	  settings: {
	    slidesToShow: 2
	  }
	},
	{
	 breakpoint: 450,
	  settings: {
	    slidesToShow: 1
	  }
	}
  ]
  });
});

// Модальные окна 
//Открытие
		//Таблица размеров
$(document).ready(function(){
	$('#ruler').on('click', function(){
		$('#myModal').fadeIn();
	})
});
		//Оплата
$(document).ready(function(){
	$('.payments-modal').on('click', function(){
		close();
		$('.modal-payment').fadeIn();
	})
});
		//Доставка Украина
$(document).ready(function(){
	$('.ukraine-modal').on('click', function(){
		close();
		$('.modal-ukraine').fadeIn();
	})
});
		//Доставка в Другие страны
$(document).ready(function(){
	$('.index-box-country').click(function(event){
		close();
		if (event.target.localName == 'span') {
			event.currentTarget.children[0].style.display = "block";
		}else{
			event.target.children[0].style.display = "block";
		}
	})
});
		//Закрытие - клик по крестику
$('.close').on('click', function(){
		close();
	});

var close = function(){
		$('#myModal').fadeOut();
		$('.modal-box').fadeOut();
	}

		//Закрытие - клик вне окна Product
$(document).ready(function(){
	$(window).on('click', function(event){
		var modal = document.getElementById("myModal");
		if(event.target == modal){
			$('#myModal').fadeOut();
		}
	})
});

		//Закрытие всех окон при клике вне окна - Delivery
$(document).ready(function(){
	$(window).mouseup(function (e){
		var block = $(".modal-box");
		if (!block.is(e.target) && block.has(e.target).length === 0){
			$('.modal-box').fadeOut();
		}
	})
});

//Contacts - Часы
var digits_map = [[".item--1", ".item--2", ".item--3", ".item--5", ".item--6", ".item--7"],
	[".item--3", ".item--6"],
	[".item--1", ".item--3", ".item--4", ".item--5", ".item--7"],
	[".item--1", ".item--3", ".item--4", ".item--6", ".item--7"],
	[".item--2", ".item--3", ".item--4", ".item--6"],
	[".item--1", ".item--2", ".item--4", ".item--6", ".item--7"],
	[".item--1", ".item--2", ".item--4", ".item--5", ".item--6", ".item--7"],
	[".item--1", ".item--3", ".item--6"],
	[".item--1", ".item--2", ".item--3", ".item--4", ".item--5", ".item--6", ".item--7"],
	[".item--1", ".item--2", ".item--3", ".item--4", ".item--6", ".item--7"]
	];

var head = document.querySelector('head');
head.insertAdjacentHTML('beforeend', '<style id="coloring"></style>');
var style_container = document.getElementById("coloring");

var color_step = 0;
var color_steps_max = 12;
var color_period = 1;
var color_time_counter = 0;
var color_class = "js-color--active";

var digits = document.querySelectorAll('.digit');
var digit_item_class = ".digit__item";
var digits_items = document.querySelectorAll(".digit__item");
var dottes = document.querySelector(".dottes");
var dottes_items = document.querySelectorAll(".dottes__item");

setTime();
var interval = setInterval(setTime,1000);	

function setTime() {

	var now = new Date();
	var hour = now.getHours() >= 10 ? now.getHours() : "0" + now.getHours();
	var min = now.getMinutes() >= 10 ? now.getMinutes() : "0" + now.getMinutes();
	var sec = now.getSeconds() >= 10 ? now.getSeconds() : "0" + now.getSeconds();
	var date_string = hour + "" + min + "" + sec;

	for ( var i = 0; i < digits.length; i++ ) {
		
		var digit = digits[i];
		var digit_value = +date_string.charAt(i);

		remove_class_from_items (digit, color_class);
		remove_class_from_elem(dottes, color_class);

		var digit_elems_classes = digits_map[digit_value];

		if ( digit_elems_classes.length > 0 ){
			for ( var l = 0; l < digit_elems_classes.length; l++ ){
				var item = digit.querySelector(digit_elems_classes[l]);
				item.classList.add( color_class  );
			}
		}	
	}
	change_color_by_style();
}
function add_class_to_items ( elem ) {
	var items = elem.querySelectorAll(".item");

	for ( var i = 0; i < items.length; i++ ){
		items[i].classList.add ( class_color );
	}
}
function remove_class_from_items ( elem, class_prefix ) {
	var items = elem.querySelectorAll(".item");

	for ( var i = 0; i < items.length; i++ ){
		remove_class_from_elem(items[i], class_prefix);
	}
}
function remove_class_from_elem ( elem, class_prefix ) {
	var classes = elem.classList;
			
	for ( var k = 0; k < classes.length; k++ ){
		if ( classes[k].indexOf(class_prefix) >= 0 ){
			elem.classList.remove(classes[k]);
		}
	}
}
function change_color_by_style(){
	var hue_value = 360 / color_steps_max * color_step;
	var bright_value = 50; 
	var current_color = "hsl(" + hue_value + ", 70%, " + bright_value + "%)";
	var color_class_local = "." + color_class;
	var styles = color_class_local + " { background: " + '#5c2a75' + "; }";
		styles += color_class_local + ":before, " + color_class_local + ":after { border-color: " + '#5c2a75' + "; }";
	style_container.innerHTML = styles;

	if ( color_step < color_steps_max ){
		color_step++;
	}
	else {
		color_step = 0;
	}
}
