$(".removerTreino").on('click', function(e) {
    var dataId = $(this).attr("data-id");
    var form = $("#" + dataId);
    var formData = form.serialize();
    $.ajax({
        url: "/GymPlanYii/frontend/web/index.php?r=site%2Fremover-treino&id=" + dataId,
        type: "post",
        data: formData,
        success: function (data) {
            console.log(data);
            alert(data);
            form.fadeOut(600, function() { $(this).remove(); });
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$(".adicionarTreino").on('click', function(e) {
    var dataId = $(this).attr("data-id");
    var form = $("#" + dataId);
    var formData = form.serialize();
    $.ajax({
        url: "/GymPlanYii/frontend/web/index.php?r=site%2Fadicionar-treino&id=" + dataId,
        type: "post",
        data: formData,
        success: function (data) {
            console.log(data);
            alert(data);
            form.fadeOut(600, function() { $(this).remove(); });
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$(".removerTreino2").on('click', function(e) {
    var dataId = $(this).attr("data-id");
    $.ajax({
        url: "/GymPlanYii/frontend/web/index.php?r=site%2Fremover-treino&id=" + dataId,
        type: "post",
        data: "a",
        success: function (data) {
            window.location.reload();
            alert(data);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$(".adicionarTreino2").on('click', function(e) {
    var dataId = $(this).attr("data-id");
    $.ajax({
        url: "/GymPlanYii/frontend/web/index.php?r=site%2Fadicionar-treino&id=" + dataId,
        type: "post",
        data: "b",
        success: function (data) {
            window.location.reload();
            alert(data);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});