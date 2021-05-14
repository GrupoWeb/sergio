<!-- este seria el sidevar -->
<div class="container-fluid">
     <div class="row">
         <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
             <div class="sidebar-sticky pt-3">
                 <ul class="nav">

                   
                     <li class="nav-item nav-dropdown">
                         <ul class="nav-dropdown-items">

                             <li class="nav">
                             <!-- <Aquí están las rutas"> -->
                                 <!-- <Aquí se envia a SELECT"> -->
                                 <a class="nav-link" href="{{ route('recuperacion') }}">
                                     <i class="nav-icon fas far fa-user"></i> Recuperación de datos</a>
                             </li>
                             <li class="nav">
                                 <!-- <Aquí se envia a DML"> -->
                                 <a class="nav-link" href="{{ route('manipulacion') }}">
                                     <i class="nav-icon fas far fa-user"></i> Manipulación de Datos (DML)</a>
                             </li>
                             <li class="nav">
                                 <!-- <Aquí se envia a DDL"> -->
                                 <a class="nav-link" href="/DDL">
                                     <i class="nav-icon fas far fa-user"></i> Definición de datos (DDL)</a>
                             </li>
                             <li class="nav">
                                 <!-- <Aquí se envia a DCL"> -->
                                 <a class="nav-link" href="/DCL">
                                     <i class="nav-icon fas far fa-user"></i> Control de datos (DCL)</a>
                             </li>
                             <li class="nav">
                                 <!-- <Aquí se envia a TCL"> -->
                                 <a class="nav-link" href="/TCL">
                                     <i class="nav-icon fas far fa-user"></i> Control de Transacciones (TCL)</a>
                             </li>
                             <li class="nav">
                                 <!-- <Aquí se envia a la información del grupo"> -->
                                 <a class="nav-link" href="/grupo">
                                     <i class="nav-icon fas far fa-user"></i> Grupo</a>
                             </li>
                             
                         </ul>
                     </li>
                    
                 </ul>
             </div>
         </nav>
     </div>
 </div>