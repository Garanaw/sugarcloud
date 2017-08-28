<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<nav class="navbar navbar-default" role="navigation">

	<div class="navbar-header"> <!-- start nav header -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Cambiar</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>		
		<a class="navbar-brand" href="#">GESTIÓN PERSONAL</a>
	</div> <!-- end of nav header -->

	<div class="collapse navbar-collapse navbar-ex1-collapse"> <!-- start collapsible menu -->
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo base_url(); ?>">Inicio</a></li>

			<li class="dropdown">
				<?php /*a('sugar', 'Sugar');*/ ?>
				<a href="<?php echo base_url(); ?>sugar" class="dropdown-togle" data-toggle="dropdown">Sugar <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><?php echo a('sugar', 'Sugar Overall'); ?></li>
					<li><?php echo a('sugar/charts', 'Sugar Charts'); ?></li>
					<li><?php echo a('sugar/calendar', 'Sugar Calendar'); ?></li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">Money <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url().''; ?>funding">Bote</a></li>
					<li><a href="<?php echo base_url().''; ?>funding/purchases">Compras</a></li>
				</ul>
			</li>

			<li class="dropdown">
			</li>

			<li class="dropdown">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">Gastos <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>egresos/insertar">Pagos efectuados</a></li>
				<li><a href="<?php echo base_url(); ?>gasto_tarjeta/insertar">Gastos con Tarjeta</a>
				<li><a href="<?php echo base_url(); ?>liquida_tarjeta/add_nueva">Resumen de Tarjeta</a>
				<li><a href="<?php echo base_url(); ?>liquida_tarjeta/pagar">Pago Resumen de Tarjeta</a>
				</ul>
			</li>

			<li class="dropdown">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">Otras operaciones <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>tarjetas">Tarjetas</a></li>
				<li><a href="<?php echo base_url(); ?>admin/abm_bancos">Cuentas bancarias</a></li>
				<li><a href="<?php echo base_url(); ?>credito">Creditos a cobrar</a></li>
				<li><a href="<?php echo base_url(); ?>deuda">Deudas a pagar</a></li>
				<li><a href="<?php echo base_url(); ?>admin/plazo_fijo">Constituir Plazo fijo </a></li>
				<li><a href="<?php echo base_url(); ?>admin/renovar_pfijo">Cancelar/Renovar Plazo fijo </a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">Consultas <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>consulta/ficha_gastos">Fichas de gastos</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/ficha_ingresos">Fichas de ingresos</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/ficha_cuenta">Fichas de cuentas</a></li>

				<li><a href="<?php echo base_url(); ?>consulta/gastos">Detalle de Gastos</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/ingresos">Detalle de Ingresos</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/asientos">Detalle de Movimientos</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/gastos_ingresos">Detalle de Gastos e ingresos</a></li>
				<li><a href="<?php echo base_url(); ?>gasto_tarjeta/informe">Gastos efectuados con tarjetas</a></li>
				<li><a href="<?php echo base_url(); ?>tar_cuotas">Cupones de tarjetas</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">Informes <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>consulta/balance">Balance</a></li>
				<li><a href="<?php echo base_url(); ?>consulta/info_balance">Balance (informe)</a></li>
				<li><a href="<?php echo base_url(); ?>grafico">Graficos</a></li>
				<li><a href="<?php echo base_url(); ?>grafico/gastos">Grafico de Gastos</a></li>
				<li><a href="<?php echo base_url(); ?>grafico/ingresos">Grafico Ingresos </a></li>
				</ul>
			</li>
			<?php if (method_exists(get_instance(), 'ion_auth') AND $this->ion_auth->logged_in()) : ?> 
				<li><a href="<?php echo base_url() ?>auth/logout" class="pull-right">logout</a></li>
				<?php if ( $this->ion_auth->is_admin() ) : ?>
				<li class="dropdown"><a href="<?php echo base_url() ?>admin"  class="dropdown-toggle" data-toggle="dropdown">Administracion <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url()?>auth/create_user">crear usuario</a></li>
					<li><a href="<?php echo base_url()?>auth/index">listar usuarios</a></li>
					<li><a href="<?php echo base_url()?>auth/change_password">Cambiar clave</a></li>
					<li><a href="<?php echo base_url()?>admin">Administracion</a></li>
				</ul>				
				</li>
				<?php endif; ?>
			<?php else : ?>
				<li><a href="<?php echo base_url() ?>auth/login" class="pull-right">Login</a>
			<?php endif; ?>	
		</ul>
	</div><!-- end collapsible menu -->

</nav>