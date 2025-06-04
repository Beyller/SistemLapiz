<?php
/**
 * Página de inicio personalizada para SistemLapiz
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Inicio - SistemLapiz');
$rol = $this->request->getAttribute('identity')->get('role');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($this->fetch('title')) ?></title>

    <!-- Bootstrap 5 desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <?= $this->Html->css('cake') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark top-nav full-width-nav"> 
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand big-brand" href="#">SistemLapiz <br> 
            <p class="user-name text-light ps-2">
                Bienvenido: <?= $this->request->getAttribute('identity')->get('name'); ?></p>
            </a>
           

                <?= $this->Form->postLink(
            'Cerrar sesión',
            ['controller' => 'Users', 'action' => 'logout'],
            ['confirm' => '¿Estás seguro que deseas cerrar sesión?', 'class' => 'btn btn-danger logout-btn']
        ) ?>
    </div>
</nav>


<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="display-4 text-center">SistemLapiz</h1>
                <div class="row mt-4 cards-container">
                    <br>
                    <!-- Tarjetas visibles para todos (empleado y admin) -->
                    <div class="col-md-4 mb-4">
                        <a href="<?= $this->Url->build(['controller' => 'SpareParts', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                            <div class="card-body">
                                <i class="bi-box-seam display-4 " style="color: red;"></i>
                                <h5 class="card-title">Registrar Producto</h5>
                                <p class="card-text">Añade nuevos productos al inventario.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="<?= $this->Url->build(['controller' => 'Suppliers', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                            <div class="card-body">
                                <i class="bi-building display-4 " style="color: red;"></i>
                                <h5 class="card-title">Registrar Proveedor</h5>
                                <p class="card-text">Agrega proveedores para gestionar productos.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="<?= $this->Url->build(['controller' => 'Clients', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                            <div class="card-body">
                                <i class="bi-person-plus display-4 " style="color: red;"></i>
                                <h5 class="card-title">Nuevo cliente</h5>
                                <p class="card-text">Registrar nuevo cliente.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                            <div class="card-body">
                                <i class="bi-receipt display-4 " style="color: red;"></i>
                                <h5 class="card-title">Crear Factura</h5>
                                <p class="card-text">Crea nuevas facturas para los clientes.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="<?= $this->Url->build(['controller' => 'SpareParts', 'action' => 'search_price']); ?>" class="card text-center shadow text-decoration-none">
                            <div class="card-body">
                                <i class="bi-search display-4 mb-3" style="color: red;"></i>
                                <h5 class="card-title">Consultar Precio</h5>
                                <p class="card-text">Consulta el precio de productos y repuestos.</p>
                            </div>
                        </a>
                    </div>

                    <!-- Tarjetas solo para administradores -->
                    <?php if ($rol === 'admin'): ?>
                        <div class="col-md-4 mb-4">
                            <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'ventasDia']); ?>" class="card text-center shadow text-decoration-none">
                                <div class="card-body">
                                    <i class="bi-cash-stack display-4"style="color: red;"></i>
                                    <h5 class="card-title">Ventas del Día</h5>
                                    <p class="card-text">Consulta el total de facturas generadas hoy y su monto total.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="<?= $this->Url->build(['controller' => 'Finances', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                                <div class="card-body">
                                    <i class="bi-bar-chart-line display-4 " style="color: red;"></i>
                                    <h5 class="card-title">Ver Finanzas</h5>
                                    <p class="card-text">Consulta y gestiona los reportes financieros.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>" class="card text-center shadow text-decoration-none">
                                <div class="card-body">
                                    <i class="bi-person-lines-fill display-4 " style="color: red;"></i>
                                    <h5 class="card-title">Registrar Usuario</h5>
                                    <p class="card-text">Registra a tus Empleados.</p>
                                </div>
                            </a>
                        </div>
                   <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
