function trocarInput() {

    var select = document.getElementById('categories');
    var text = document.getElementById('new_category');
    var bt = document.getElementById('bt_new_category');
    var bt2 = document.getElementById('bt_cancel');

    select.style.display = 'none';
    text.style.display = 'block';
    bt.style.display = 'none';
    bt2.style.display = 'block';
}

function cancelarCategoria() {

    var select = document.getElementById('categories');
    var text = document.getElementById('new_category');
    var bt = document.getElementById('bt_new_category');
    var bt2 = document.getElementById('bt_cancel');

    select.style.display = 'block';
    text.style.display = 'none';
    bt.style.display = 'block';
    bt2.style.display = 'none';

}