 @extends('layout.head')
 @section('main_sidebar')
 <!--main sidebar ci--> 
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item">
          <a href="ccliente/create"><i class="icon-user-follow"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Crear Clientes</span>
          </a>
        </li>
        <li class=" nav-item">
          <a href="ccliente/show"><i class="icon-list"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Ver Clientes</span>
          </a>
        </li>
        <li class=" nav-item">
          <a href="cproducto/show"><i class="icon-list"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Ver Productos</span>
          </a>
        </li>
        <li class=" nav-item"><a href="index-2.html"><i class="icon-control-play"></i><span class="menu-title">Menu</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="" data-i18n="nav.dash.ecommerce">Submenu</a>
            </li>
            <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">Submenu</a>
            </li>
            <li class="active"><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Submenu</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="add-on-block-ui.html"><i class="la la-terminal"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Opcion1</span></a>
        </li>
        <li class=" nav-item"><a href="add-on-image-cropper.html"><i class="la la-crop"></i><span class="menu-title" data-i18n="nav.add_on_image_cropper.main">Opcion2</span></a>
        </li> 
        <li class=" navigation-header">
          <span data-i18n="nav.category.support">Soporte</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Support"></i>
        </li>
        <li class=" nav-item">
          <a href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/documentation"><i class="la la-text-height"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Documentación</span>
          </a>
        </li>
         <li class=" nav-item">
          <a href="clogin/cerrarsession"><i class="icon-logout"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Cerrar Session</span>
          </a>
        </li>
       
      </ul>
    </div>
  </div>
  <!--end main sidebar ci-->
  