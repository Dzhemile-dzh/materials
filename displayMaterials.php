<?php 
    include './db/connection.php';
    include './model/Material.php';
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Grouped Materials</h2>
    <button class="btn btn-warning" onclick="javascript:history.go(-1)">Back</a></button>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Total Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $groupedMaterials = Material::groupMaterialsByName($conn);
        foreach ($groupedMaterials as $material) {
        ?>
        <tr>
          <td><?= $material['name'] ?></td>
          <td><?= $material['total_quantity'] ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
