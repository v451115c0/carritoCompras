//FUNCIONALIDADES GENERALES -----------------------------------------------------------
    //AJAX
    function Ajax()
    {
        /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
        lo que se puede copiar tal como esta aqui */
        var xmlhttp=false;
        try
        {
            // Creacion del objeto AJAX para navegadores no IE
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {
            try
            {
                // Creacion del objet AJAX para IE
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(E) { xmlhttp=false; }
        }
        if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }

        return xmlhttp;
    }
    //AJAX

    //SOLO PERMITIR NUMEROS
    function JustNumbers(e)
    {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8)
        {
            return true;
        }

        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
    //SOLO PERMITIR NUMEROS

    //ALERTA
    function View_alert(text, type)
    {
        $.notify({
            message: text

        },{
            type: type,
            timer: 10000
        });
    }
    //ALERTA
//FUNCIONALIDADES GENERALES -----------------------------------------------------------

//MOSTRAR PRODUCTOS
function View_products()
{
	var divMensaje = document.getElementById("view-products");
    var ajax = Ajax();

    ajax.onreadystatechange=function()
    {
        if (ajax.readyState == 4 && ajax.status==200)
        {
            var scs=ajax.responseText.extractScript();    //capturamos los scripts
            divMensaje.innerHTML=ajax.responseText;
            scs.evalScript();       //ahora si, comenzamos a interpretar todo
            divMensaje.innerHTML=ajax.responseText;
        }
        else
        {
            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';
        }
    }

    ajax.open("POST", "custom/page/view-products.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
}
//MOSTRAR PRODUCTOS

//MOSTRAR DETALLE CARRITO DE COMPRAS
function View_detail_products()
{
    var divMensaje = document.getElementById("view-detail-products");
    var ajax = Ajax();

    ajax.onreadystatechange=function()
    {
        if (ajax.readyState == 4 && ajax.status==200)
        {
            var scs=ajax.responseText.extractScript();    //capturamos los scripts
            divMensaje.innerHTML=ajax.responseText;
            scs.evalScript();       //ahora si, comenzamos a interpretar todo
            divMensaje.innerHTML=ajax.responseText;
        }
        else
        {
            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';
        }
    }

    ajax.open("POST", "custom/page/view-detail-products.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
}
//MOSTRAR DETALLE CARRITO DE COMPRAS

//AGREGAR PRODUCTO AL CARRITO
function Add_product(sku)
{
    var dataString = 'sku=' + sku;

    $.ajax({
        type: 'POST',
        url: 'custom/querys/add-product.php',
        data: dataString,
        success: function (data)
        {
            View_detail_products();
        }
    });

    return false;
}
//AGREGAR PRODUCTO AL CARRITO

//ELIMNAR PRODUCTO AL CARRITO
function Delete_product(sku)
{
    var dataString = 'sku=' + sku;

    $.ajax({
        type: 'POST',
        url: 'custom/querys/delete-product.php',
        data: dataString,
        success: function (data)
        {
            View_detail_products();
        }
    });

    return false;
}
//ELIMNAR PRODUCTO AL CARRITO

//CAMBIAR DESCUENTO
function Change_discount(value)
{
    var dataString = 'discount=' + value;

    $.ajax({
        type: 'POST',
        url: 'custom/querys/change-discount.php',
        data: dataString,
        success: function (data)
        {
            View_detail_products();
        }
    });

    return false;
}
//CAMBIAR DESCUENTO

//PROCEDER A PAGAR
function Checkout()
{
    var dataString = '';
    document.getElementById('btn-process').disabled = true;
    document.getElementById('btn-process').innerHTML = '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only"></span>';

    $.ajax({
        type: 'POST',
        url: 'custom/querys/checkout.php',
        data: dataString,
        success: function (data)
        {
            var elements = data.split('///');

            //Variables de documentos
            var type = elements[0];
            var message = elements[1];

            if(type == 1)
            {
                document.location.href = message;
            }
            else
            {
                document.getElementById('btn-process').disabled = false;
                document.getElementById('btn-process').innerHTML = 'Proceder a pagar';

                View_alert("Lo sentimos, " + data, "danger");
                return false;
            }
        }
    });

    return false;
}