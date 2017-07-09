<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 22-06-2017
 * Time: 10:59
 */
?>

<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #f1f2f6;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="page-title" style="background-image: url('images/eventos-fondo.jpg');">
    <div class="inner">
        <h2>Gestión de Eventos</h2>
        <p>Zona de administración.</p>
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<div class="section boxed-section light text-center">
    <div class="inner">
        <div class="container">
            <div class="box">
                <div class="dashboard">
                    <h4>Lista Eventos</h4>
                </div> <!-- end .dashboard -->
            <table id="eventos_table" class="display" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Registro</th>
                    <th>Visibilidad</th>
                    <th>Lugar</th>
                    <th>Dirección</th>
                    <th></th>
                </tr>
                </thead>
<!--                <i class="pe-7s-edit"></i>-->
            </table>
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Evento</h2>
        <center><div id="loaderBar"></div></center>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nombre">Nombre Evento</label>
                    <input type="text" id="nombre" required>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="visibilidad">Visibilidad</label>
                    <select id="visibilidad">
                        <option value="PUBLICO">Público</option>
                        <option value="PRIVADO">Privado</option>
                    </select>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lugar">Lugar</label>
                    <input  type="text" id="lugar" required>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input  type="text" id="direccion" required>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
        </div> <!-- end .row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="fechaInicio">Fecha Inicio</label>
                    <input  type="datetime" id="fechaInicio" required>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="fechaFin">Fecha Fin</label>
                    <input  type="datetime" id="fechaFin" required>
                </div> <!-- end .form-group -->
            </div> <!-- end .col-sm-6 -->
        </div> <!-- end .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea rows="3" id="descripcion" required></textarea>
                </div> <!-- end .form-group -->
            </div> <!-- end .form-group -->
        </div> <!-- end .row -->
        <div class="clearfix text-right">
            <button type="button" class="button" onclick="guardaEvento()">Guardar</button>
        </div> <!-- end .clearfix -->
    </div>
</div>
