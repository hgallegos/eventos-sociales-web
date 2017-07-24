<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 22-06-2017
 * Time: 18:38
 */
?>

<script type="application/javascript">
    var table;
    function obtieneInfoEdit(id) {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET", "index.php?page=perfil&fmode=true&function=ws_usuario_id&id=" + id, false);
        xmlhttp.send();
        return JSON.parse(xmlhttp.responseText);
    }
    function deleteUsuario(id) {
        var r = confirm('¿Estás seguro que quieres eliminar este usuario?');
        if(r){
            //elimina ñe
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET", "index.php?page=perfil&fmode=true&function=ws_usuario_delete&id=" + id, false);
            xmlhttp.send();
            if(xmlhttp.responseText == 'OK'){
                //Reload
                table.ajax.reload();
            }else{
                alert('Problema al eliminar el evento, contactar a los super desarrolladores =)');
            }
        }
        return false;

    }

    $(document).ready(function() {
        table = $('#usuario_table').DataTable( {
            ajax: {
                url: "index.php?page=perfil&fmode=true&function=ws_usuario",
                type: "GET"
            }
        } );
        $('#usuario_table_length select').addClass('form-control');
        $('#usuario_table_filter input').addClass('form-control');
        $('#usuario_table_filter input').attr("placeholder", "Buscar...");

    } );


    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var dataGlobal;

    var LastID;

    // When the user clicks on the button, open the modal
    var loader = '<img src="images/loader.gif" alt="Cargando">';
    function editaUsuario(id) {
        LastID = id;
        modal.style.display = "block";
        document.getElementById('loaderBar').innerHTML = loader;
        setTimeout(function(){
            //do what you need here
            dataGlobal = obtieneInfoEdit(id);
            document.getElementById('nombre').value = dataGlobal['nombre'];
            document.getElementById('usuario').value = dataGlobal['usuario'];
//            document.getElementById('edad').value = dataGlobal['edad'];
            document.getElementById('email').value = dataGlobal['email'];
            document.getElementById('nivel').value = dataGlobal['nivel'];
            document.getElementById('loaderBar').innerHTML = '';
        }, 1000);
    }

    function guardaUsuario() {
        dataGlobal['nombre'] = document.getElementById('nombre').value;
//        dataGlobal['edad'] = document.getElementById('edad').value;
        dataGlobal['email'] = document.getElementById('email').value;
        dataGlobal['nivel'] = document.getElementById('nivel').value;
        guardaUsuarioEnWS();
    }

    function guardaUsuarioEnWS() {
        $.ajax({
            type: 'POST',
            url: 'index.php?page=perfil&fmode=true&function=ws_usuario_save&id=' + LastID,
            data: {'data': JSON.stringify(dataGlobal)},
            dataType: 'text',
            success: function (data) {
                console.log(data);
                console.log('Guardado correctamente.');
            },
            error: function (data) {
                console.log(data);
                console.log("Error no existe comuniación con el servicio.");
            }
        });
        modal.style.display = "none";
        table.ajax.reload();
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
