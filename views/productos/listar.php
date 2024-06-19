<?php include '../views/header.php'; ?>





<h1>Lista de Productos</h1>

   


 
    <form method="get" action="index.php">
        <input type="hidden" name="controller" value="ProductoController">
        <input type="hidden" name="action" value="buscar">
        <input type="text" name="q" placeholder="Buscar productos">
        <input type="submit" value="Buscar">
    </form>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                <td><?php echo htmlspecialchars($row['precio']); ?></td>
                <td>
                    <a href="index.php?controller=ProductoController&action=editar&id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="index.php?controller=ProductoController&action=eliminar&id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include '../views/footer.php'; ?>
