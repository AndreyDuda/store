

/*-----------------------Загрузка файлов --------------------*/
$(document).ready(function () {
    $('.delete-product').click(function(){
        if (!confirm("Удалить товар ?")) {
            return false;
        }
    });

     $('.close').click(function(){
         $('.modal-edit-product').hide();
     });

    $('.all-foto').on('click','.change_photo', function () {
       var change = $(this).data('photo');
       $('#for_change').val(change);
       $('.modal-edit-product').show();
    });

    $('.all-foto').on('click', '.change-image', function(){
        var no_img = $('#no_image').val();
        var photo = $(this).parent().data('photo');
        $(this).parent().find('.ch').attr('src', no_img);
        $(this).parent().find('.change-image').hide();
        $(this).parent().addClass('change_photo');
        $('#'+photo).val();

    });

    $('.modal-edit-product').on('click', 'img', function(){
        var img   = $(this).data('img').replace('.jpg','');
        var photo = $('#for_change').val();
        $('#'+photo).val('catalog/'+img);
        var url = $(this).attr('src').replace('no-image.png',img+'jpg');
        $('.'+photo+' .ch').attr('src', url);
        $('.'+photo+' span').show();
        $('.'+photo).removeClass('change_photo');


        $('.modal-edit-product').hide();

    });



    $('.click_order').click(function () {

        if (!confirm("Заказ обработали?")) {
            return false;
        } else {
            var obj  = $(this);
            var id   = obj.parent().parent().find('input').val();
            var data = obj.data('order');
            var url  = $('#url').val();
            /*alert(id);*/

            console.log(id);
            $.ajax({
                type:'POST',
                url:url,
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                data:{id:id, data:data},
                datatype:'JSON',
                success: function(data) {
                    if(obj.data('order') == 'success'){
                        obj.parent().parent().css('background', 'grey');
                        /*$('.haeder-text').css('background', 'white');*/
                    }else{
                        obj.parent().parent().css('background', 'red');
                    }
                    $('.click_order').hide();
                },
                error:function() {
                    console.log('ERRORE');
                }
            });
        }

    });


    $('.content, .edit-product, .modal-edit-product').on('keyup','.search-img',function(){
        var search = $(this).val();
        $('.img-for-product').hide();
        if(search.length >0){
            $('.img-for-product[title*="'+search+'"]').show();
        }else{
            $('.img-for-product').show();
        }
    });

    function adminSerchP(){
        var url = $('adminSearchP').val();
        var urlD = $('adminDelete').val();
        var urlE = $('adminEdit').val();
        var urlImg = $('adminImgSystem').val();
        var search = $('#serchCode').val();
        if (search.length > 0) {
            $.ajax({
                type: 'GET',
                url: url,
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                data: {product: search},
                datatype: 'JSON',
                success: function (data) {
                    var table = '';

                    $('#productAdmin').empty();
                    data = jQuery.parseJSON(data);

                    for(var i = 0; i < data.data.length; i++) {
                        table += '<tr>';
                        table += '<td title="'+data.data[i].code+'">'+data.data[i].code+'</td>';
                        table += '<td title="'+data.data[i].label+'">'+data.data[i].label+'</td>';
                        table += '<td title="'+data.data[i].title+'">'+data.data[i].title+'</td>';
                        table += '<td title="'+data.data[i].desc+'">'+data.data[i].desc+'</td>';
                        table += '<td>' +
                                        '<a class="delete-product" title="Удалить товар" href="'+urlD+'/id'+data.data[i].id+'">'+
                                            '<img  style="float: right;" src="'+urlImg+'/img/delete.png" alt="" class="edit-delete">' +
                                        '</a>'+
                                        '<a title="Редактировать товар" href="'+urlE+'/id'+data.data[i].id+'">'+
                                            '<img  style="float: right;" src="'+urlImg+'/img/edit.png" alt="" class="edit-delete">' +
                                        '</a>';
                        table += '</tr>';

                        console.log(data.data[i].code);
                    }
                    $('#productAdmin').append(table);

                    var info = '<>';




                },
                error: function () {

                }
            });
        }
    }

   /* $('.content').on('keyup', '#serchCode', function(){
       adminSerchP();
    });
    $('.content').on('paste', '#serchCode', function(){
        adminSerchP();
    });
    $('.content').on('click', '#serchCode', function(){
        adminSerchP();
    });*/



    $('.edit-product .img-for-product').on('click','img',function(){

        $('.modal-edit-product').hide();
    });


    $('.content').on('click','.delete-for-img',function(){
        var obj = $(this);
        var del = obj.prev().text();

        var url = $('#urlDelImg').val();

        $.ajax({
            type:'POST',
            url:url,
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            data:{del:del},
            datatype:'JSON',
            success: function(data) {
                obj.parent().remove();


            },
            error:function() {
                console.log('ERRORE');
            }
        });
    });

    $('#upload').on('click', function() {
        var url = $('#uploadPhoto').val();
        var formData = new FormData(this);
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        alert(form_data);
        $.ajax({
        headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        type:'POST', // Тип запроса
        url: url, // Скрипт обработчика
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(php_script_response){
            alert(php_script_response);
        }
        });
    });


    $('#upload-image').on('.submit',(function(e) {
        e.preventDefault();
        var url = $('#uploadPhoto').val();
        var formData = new FormData(this);

        $.ajax({
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            type:'POST', // Тип запроса
            url: url, // Скрипт обработчика
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                printMessage('#result', data);

            },
            error:function(data){

            }
        });
    }));






});