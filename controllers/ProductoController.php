<?php
require_once '../config/database.php';
require_once '../models/Producto.php';



class ProductoController {
    private $db;
    private $producto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->producto = new Producto($this->db);
    }

    public function index() {
        $stmt = $this->producto->leer();
        include '../views/productos/listar.php';
    }

    public function crear() {
        if ($_POST) {
            $this->producto->codigo = $_POST['codigo'];
            $this->producto->nombre = $_POST['nombre'];
            $this->producto->descripcion = $_POST['descripcion'];
            $this->producto->cantidad = $_POST['cantidad'];
            $this->producto->precio = $_POST['precio'];

            if ($this->producto->crear()) {
                header("Location: index.php");
            } else {
                echo "Error al crear el producto.";
            }
        }
        include '../views/productos/agregar.php';
    }

    public function editar($id) {
        $this->producto->id = $id;

        if ($_POST) {
            $this->producto->codigo = $_POST['codigo'];
            $this->producto->nombre = $_POST['nombre'];
            $this->producto->descripcion = $_POST['descripcion'];
            $this->producto->cantidad = $_POST['cantidad'];
            $this->producto->precio = $_POST['precio'];

            if ($this->producto->actualizar()) {
                header("Location: index.php");
            } else {
                echo "Error al actualizar el producto.";
            }
        }

        $stmt = $this->producto->leer();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        include '../views/productos/editar.php';
    }

    public function eliminar($id) {
        $this->producto->id = $id;
        if ($this->producto->eliminar()) {
            header("Location: index.php");
        } else {
            echo "Error al eliminar el producto.";
        }
    }

    public function buscar() {
        $keywords = isset($_GET['q']) ? $_GET['q'] : '';
        $stmt = $this->producto->buscar($keywords);
        include '../views/productos/listar.php';
    }

     public function inicio() {
        $resumen = $this->producto->obtenerResumen();
        include '../views/inicio.php';
    }
     

}
?>
