<?php

class Material {
    public static function addMaterial($conn, $name, $description, $quantity, $unit, $price, $document) {
            $stmt = $conn->prepare('INSERT INTO materials (name,description, quantity, unit, price, document)
                                    VALUES (:name,:description, :quantity, :unit, :price, :document)');
            $stmt->execute([
                            'name' => $name,
                            'description' => $description, 
                            'quantity' => $quantity,
                            'unit' => $unit, 
                            'price' => $price, 
                            'document' => $document
                        ]);
            return [
                'success' => true,
                'message' => "Material added successfully!"
            ];

    }

    public static function groupMaterialsByName($conn) {
        $stmt = $conn->prepare('SELECT name, SUM(quantity) as total_quantity 
                                FROM materials 
                                GROUP BY name
                                ORDER BY total_quantity');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>