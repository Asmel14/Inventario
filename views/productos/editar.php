<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="index.php?controller=ProductoController&action=editar&id=<?php echo $producto['id']; ?>" method="post">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" value="<?php echo $producto['codigo']; ?>" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        <br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <br>
        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
