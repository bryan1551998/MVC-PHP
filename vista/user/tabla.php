<div class=" container p-3">
<h4 class="p-2 bg-danger rounded text-white">Incidencias</h4>
<table class="table-responsive table-hover " id="tabla">
    <thead>
        <tr>
            <th>fecha_inicio</th>
            <th>comentario</th>
            <th>material</th>
            <th>aula</th>
            <th>grupo</th>
            <th>prioridad</th>
        </tr>
    </thead>
    <tbody>


    
    <?php
    foreach ($_result    as $data) {
        echo "<tr>";
        echo "<td>" . $data->fecha_inicio . "</td>";
        echo "<td>" . $data->comentario . "</td>";
        echo "<td>" . $data->material . "</td>";
        echo "<td>" . $data->aula . "</td>";
        echo "<td>" . $data->grupo . "</td>";
        echo "<td class=" . "prioridad2" . ">". $data->prioridad . "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo"</div>";
    ?>
    <script>
        var tabla = document.querySelector("#tabla");
        var datatable = new DataTable(tabla);


    
    </script>
   