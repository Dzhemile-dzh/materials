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
        $stmt = $conn->prepare('SELECT name, ROUND(SUM(quantity),1) as total_quantity, unit 
                                FROM materials 
                                GROUP BY name
                                ORDER BY total_quantity DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>