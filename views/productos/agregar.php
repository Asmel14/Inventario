<?php include '../views/header.php'; ?>
<h2>Agregar Producto</h2>
<form action="index.php?controller=ProductoController&action=crear" method="post">
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" required>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea>
    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" required>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" id="precio" name="precio" required>
    <button type="submit">Agregar</button>
</form>
<?php include '../views/footer.php'; ?>
