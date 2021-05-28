<!-- Página del grupo -->
@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-10">
            <h1>Integrantes</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Carné</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>3190-08-21066</td>
                    <td>Juan José Alvarez Monterroso</td>
                    <td>jalvarezm1@miumg.edu.gt</td>
                    </tr>
                    <th scope="row">2</th>
                    <td>3190-14-21493</td>
                    <td>Sergio René Gutiérrez Medina</td>
                    <td>sgutierrezm1@miumg.edu.gt</td>
                    </tr>
                    <th scope="row">3</th>
                    <td>3190-15-8083</td>
                    <td>Ruth Bellanira Hernandez Carpio</td>
                    <td>rhernandezc10@miumg.edu.gt</td>
                    <tr>
                    <th scope="row">4</th>
                    <td>3190-15-21575</td>
                    <td>Cristian Roca Gómez </td>
                    <td>crocag1@miumg.edu.gt</td>
                    </tr>
                    <tr>
                    <th scope="row">5</th>
                    <td>3190-15-2711</td>
                    <td>Francisco Alejandro Barrios Meléndez</td>
                    <td>fbarriosm3@miumg.edu.gt</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    <th scope="row">6</th>
                    <td>3190-17-10255</td>
                    <td>Cristian Iván Cortez Orozco</td>
                    <td>Ccortezo@miumg.edu.gt</td>
                    </tr>
                    <tr>
                    <th scope="row">7</th>
                    <td>3190-17-24431</td>
                    <td>Jorge Luis Alexander Jiatz Gómez</td>
                    <td>jjiatzg@miumg.edu.gt</td>
                    </tr>
                </tbody>
                </table>                
                <div>
    <!-- Aquí empieza el acordeon de información -->
    <h1><br>Información adicional:</h1>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Kubernetes
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para más información sobre la implementación de Dockers y Kubernetes presione el botón. <br>
            Nota: necesitará que se le proporcione el token de ingreso.<br><br>
            <button class="btn btn-primary" onclick="Kubernetes()" type="button"target="_blank">Kubernetes Dashboard</button>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Base de datos
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para más información sobre la base de datos ingrese al portal haciendo click en el siguiente botón. <br><br> 
            <button class="btn btn-warning" onclick="phpmyadmin()" type="button" target="_blank">phpMyAdmin</button>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                ¿Qué es Vue.js?
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Vue (pronunciado /vjuː/, como view) es un framework progresivo para construir interfaces de usuario. A diferencia de otros frameworks monolíticos, Vue está diseñado desde cero para ser utilizado incrementalmente. La librería central está enfocada solo en la capa de visualización, y es fácil de utilizar e integrar con otras librerías o proyectos existentes. Por otro lado, Vue también es perfectamente capaz de impulsar sofisticadas Single-Page Applications cuando se utiliza en combinación con herramientas modernas y librerías de apoyo.
            <br>
            <br>
            <button class="btn btn-success" onclick="Vuejs()" type="button" target="_blank">Vue.js</button>
            </div>
            </div>
        </div>
        </div>
    </div>
            </div>
        </div>
    </div>

    <script>
    function phpmyadmin() {
        window.open('http://168.232.79.90:31699', '_blank');
    }
    function Kubernetes() {
        window.open('https://168.232.79.90:32502', '_blank');
    }
    function Vuejs() {
        window.open('https://es.vuejs.org/v2/guide/', '_blank');
    }
    </script>

    
@endsection
@section('breadcrumb')
    
@endsection