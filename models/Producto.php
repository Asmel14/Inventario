<?php
class Producto {
    private $conn;
    private $table_name = "productos";

    public $id;
    public $codigo;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $precio;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function leer() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion, cantidad=:cantidad, precio=:precio";
        $stmt = $this->conn->prepare($query);

        $this->codigo=htmlspecialchars(strip_tags($this->codigo));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->cantidad=htmlspecialchars(strip_tags($this->cantidad));
        $this->precio=htmlspecialchars(strip_tags($this->precio));

        $stmt->bindParam(":codigo", $this->codigo);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":cantidad", $this->cantidad);
        $stmt->bindParam(":precio", $this->precio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion, cantidad=:cantidad, precio=:precio WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->codigo=htmlspecialchars(strip_tags($this->codigo));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->cantidad=htmlspecialchars(strip_tags($this->cantidad));
        $this->precio=htmlspecialchars(strip_tags($this->precio));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":codigo", $this->codigo);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":cantidad", $this->cantidad);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function buscar($keywords) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre LIKE ? OR descripcion LIKE ?";
        $stmt = $this->conn->prepare($query);

        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);

        $stmt->execute();
        return $stmt;
    }

    // Método para obtener la cantidad de ítems y la cantidad de ítems en stock
    public function obtenerResumen() {
        $query = "SELECT COUNT(*) as total_items, SUM(cantidad) as total_en_stock FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
