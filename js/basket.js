function addToCart(id) {
    console.log('add ' + id);
    $.ajax({
        async: false,
        type: "POST",
        url: '/pages/basket.php',
        dataType: "text",
        data: 'action=add&id=' + id,
        error: function () {
            alert("Не смог");
        },
        success: function (response) {
            alert("Добавили " + id);
        }
    });
}

function showMyCart() {
    console.log('show');
    $.ajax({
        async: false,
        type: "POST",
        url: "pages/basket.php",
        data: "action=show",
        dataType: "text",
        error: function () {
            alert("Произошла ошибка");
        },
        success: function (response) {
            $('#in-chek').html(response);
        }
    });
}

function delFromCart(id) {
    console.log('del ' + id);
    $.ajax({
        async: false,
        type: "POST",
        url: "pages/basket.php",
        data: 'action=del&id' + id,
        dataType: "text",
        error: function () {
            alert("Произошла ошибка при добавлении");
        },
        success: function (response) {
            showMyCart();
            console.log(response);
        }
    });
}