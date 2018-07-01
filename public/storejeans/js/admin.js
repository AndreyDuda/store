

/*-----------------------Загрузка файлов --------------------*/
$(document).ready(function () {
    $('.all-foto').on('click','.foto', function () {
       $('.modal-edit-product').show();
    });


    $('.click_order').click(function () {

        if (!confirm("Заказ обработан?")) {
            return false;
        } else {
            var obj  = $(this);
            var id   = obj.parent().parent().find('input').val();
            var data = obj.data('order');
            var url  = $('#url').val();
            alert(id);
            $.ajax({
                type:'POST',
                url:url,
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                data:{id:id, data:data},
                datatype:'JSON',
                success: function(data) {
                    if(obj.data('order') == 'success'){
                        obj.parent().parent().css('background', 'white');
                    }else{
                        obj.parent().parent().css('background', 'red');
                    }

                    console.log(data);

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

    $('.edit-product .img-for-product').on('click','img',function(){

       console.log($(this).parent().next().text());
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
                console.log(obj);
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
        console.log('ajax');
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
        console.log('ajax');

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
                console.log(data);
            }
        });
    }));






});