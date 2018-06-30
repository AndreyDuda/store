

/*-----------------------Загрузка файлов --------------------*/
$(document).ready(function () {

    $('.content').on('keyup','.search-img',function(){
        var search = $(this).val();
        $('.img-for-product').hide();
        if(search.length >0){
            $('.img-for-product[title*="'+search+'"]').show();
        }else{
            $('.img-for-product').show();
        }




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