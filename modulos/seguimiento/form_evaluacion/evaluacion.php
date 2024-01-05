<?php include("../../../config/db.php");
include("../../../vistas/header.php");
?>


<head>
    <link rel="stylesheet" href="../../../css/citas/evaluacion.css">
</head>




<body>
  <form action="" method="POST">  

    <label for="">Fecha de Evaluacion</label>
    <input type="datetime-local" id="fecha_Evaluacion" name="fecha_Evaluacion" required><br>

    <label for="">Responsable de la evaluacion </label>
    <input type="text" id="nombreResponsable" name="nombreResponsable" required><br>


    <label for="">Nota</label>
    <input type="number" id="nota" name="nota">

    <label for="">Quien realizo</label>
    <input type="text" id="quien_Realizo" name="quien_Realizo" required>

    <label for="">Estado de practicas</label>
    <select name="estado_p" id="estado_p" required>
      <option value="Aprobado">Aprobado</option>
      <option value="Reporbado">Reprobado</option>
    </select><br><br>

    <label for="">Estado de documentos</label>
    <select name="estado_d" id="estado_d" required>
      <option value="Fisico">Fisico</option>
      <option value="Digital">Digital</option>
    </select><br><br>

    <label for="">Observaciones:</label>
  <textarea id="observaciones" name="s" rows="5" cols="40" maxlength="900"></textarea>
  
  <input type="submit" value="Enviar">

   
  </form>
</body>





<?php

if ($_POST) {
    try {
       
        $fechaEvaluacion = $_POST['fecha_Evaluacion'];
        $nombreResponsable = $_POST['nombreResponsable'];
        $quienRealizo = $_POST['quien_Realizo'];
        $nota = floatval($_POST['nota']);
        $estadoP = $_POST['estado_p'];
        $estadoD = $_POST['estado_d'];
        $observaciones = $_POST['observaciones'];

        
        

       
        $stm = $pdo->prepare('evaluacionPasantia (?,?,?,?,?,?,?,?)');

        
        $stm->bindParam(1, $fechaEvaluacion, PDO::PARAM_STR);
        $stm->bindParam(2, $nombreResponsable, PDO::PARAM_STR);
        $stm->bindParam(3, $quienRealizo, PDO::PARAM_STR);
        $stm->bindParam(4, $quienRealizo, PDO::PARAM_STR);
        $stm->bindParam(5, $nota, PDO::PARAM_STR);
        $stm->bindParam(6, $estadoP, PDO::PARAM_STR);
        $stm->bindParam(7, $estadoD, PDO::PARAM_STR);
        $stm->bindParam(8, $observaciones, PDO::PARAM_STR);
        $stm->execute();
        header("Location: ../../estudiante/vestudiante.php?id=$cod_Est");

       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
