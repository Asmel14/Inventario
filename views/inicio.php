<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
</head>
<body>
<h1>Resumen del Inventario</h1>
    <p>Cantidad de ítems: <?php echo $resumen['total_items']; ?></p>
    <p>Cantidad de ítems en stock: <?php echo $resumen['total_en_stock']; ?></p>
    <a href="index.php?controller=ProductoController&action=index">Gestionar Productos</a>
    <br><br>
    <a href="index.php?controller=ProductoController&action=generarInformePDF">Generar Informe PDF</a>
    <br>
    <a href="index.php?controller=ProductoController&action=generarInformeExcel">Generar Informe Excel</a>

</body>
</html>
