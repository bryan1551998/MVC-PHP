<div class=" container p-3">
    <h4 class="p-2 rounded bg-secondary text-white">Historial</h4>
    <table class="table-responsive table-hover " id="tabla2">
        <thead>
            <tr>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Comentario admin</th>
                <th>Aula</th>
                <th>Material</th>
                <th>Prioridad</th>


            </tr>
        </thead>
        <tbody>




            <?php
            foreach ($_result2    as $data) {
                echo "<tr>";
                echo "<td>" . $data->fecha_inicio . "</td>";
                echo "<td>" . $data->fecha_final . "</td>";
                echo "<td>" . $data->nombre . "</td>";
                echo "<td>" . $data->comentario . "</td>";
                echo "<td>" . $data->comentario_admin . "</td>";
                echo "<td>" . $data->aula . "</td>";
                echo "<td>" . $data->material . "</td>";
                echo "<td class=" . "prioridad2" . ">" . $data->prioridad . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            ?>
            <script>
                var tabla = document.querySelector("#tabla2");
                var datatable = new DataTable(tabla);

                var elements = document.getElementsByClassName("prioridad2");
                for (var i = 0; i < elements.length; i++) {
                   
                    

                    if( elements[i].textContent=="baja"){
                        elements[i].style.backgroundColor = "#71D99E";
                        elements[i].style.color = "white";
                    }else if(elements[i].textContent=="media"){
                        elements[i].style.backgroundColor =  "#fac72f";
                        elements[i].style.color = "white";
                    }else{
                        elements[i].style.backgroundColor =  "#dc3545";
                        elements[i].style.color = "white";
                    }
                }
            </script>





            <?php
            require("vista/layout/footer.php");
            ?>