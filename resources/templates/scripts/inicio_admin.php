<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 23-07-2017
 * Time: 16:36
 */
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("myChart"),{
        "type":"line",
        "data":{
            "labels":["Mayo","Junio","Julio","Agosto"],
            "datasets":[
                {
                    "label":"Eventos Creados",
                    "data":[<?= $actividad[0] ?>],
                    "fill":false,
                    "borderColor":"rgb(75, 192, 192)",
                    "lineTension":0.1
                },
                {
                    "label":"Eventos Eliminados",
                    "data":[<?= $actividad[1] ?>],
                    "fill":false,
                    "borderColor":"rgb(255, 0, 0)",
                    "lineTension":0.1
                },
                {
                    "label":"Eventos Modificados",
                    "data":[<?= $actividad[2] ?>],
                    "fill":false,
                    "borderColor":"rgb(0, 102, 0)",
                    "lineTension":0.1
                }
                ]
        },
        "options":{}
    });
</script>
<script>
    new Chart(document.getElementById("myChart2"),{
        "type":"doughnut",
        "data":{
            "labels":["Google","Facebook","Registro"],
            "datasets":[
                {
                    "label":"Usuarios Registrados",
                    "data":[<?= $usuarios[0] ?>,<?= $usuarios[1] ?>,<?= $usuarios[2] ?>],
                    "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
                }
                ]
        }
    });
</script>
