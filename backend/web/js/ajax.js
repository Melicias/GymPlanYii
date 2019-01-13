$('#my-form-dificuldade').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            $(document).find('#myModalDificuldade').modal('hide');
            console.log(data);
            var option = new Option(data.success.dificuldade + "", data.success.id_dificuldade + "");
            $(option).html(data.success.dificuldade + "");
            $("#treino-id_dificuldade").append(option);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#my-form-categoria').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            $(document).find('#myModalCategoria').modal('hide');
            console.log(data);
            var option = new Option(data.success.nome + "", data.success.id_categoria + "");
            $(option).html(data.success.nome + "");
            $("#treino-id_categoria").append(option);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#my-form-zonaexercicio').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            $(document).find('#myModalZonaexercicio').modal('hide');
            console.log(data);
            var option = new Option(data.success.nome + "", data.success.id_zona + "");
            $(option).html(data.success.nome + "");
            $("#exercicio-id_zona").append(option);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});