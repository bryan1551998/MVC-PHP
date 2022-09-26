<div class=" container p-3">
    <h4 class="p-2 bg-danger rounded text-white">Incidencias</h4>
    <table class="table-responsive table-hover " id="tabla">
        <thead>
            <tr>
                <th>Fecha inicio</th>
                <th>Comentario</th>
                <th>Usuario</th>
                <th>Aula</th>
                <th>Material</th>
                <th>Prioridad</th>
                <th>Grupo</th>

            </tr>
        </thead>
        <tbody>


            <tr>
                <?php
                foreach ($_result    as $data) {

                    $id = $data->id;
                ?>
                    <td> <?php echo $data->fecha_inicio ?> </td>
                    <td> <?php echo $data->comentario ?> </td>
                    <td> <?php echo $data->nombre ?> </td>
                    <td> <?php echo $data->aula ?> </td>
                    <td> <?php echo $data->material;
                            echo "</td>";
                            echo "<td class=" . "prioridad2" . ">" . $data->prioridad . "</td>";
                            ?>
                    <td>
                        <form action="<?php echo urlsite ?>?page=admin" method="POST" class="form-inline">



                            <select class="form-control " name="envioemail">
                                <option value="no">No</option>
                                <option value="si">Si</option>
                            </select>

                            <select class="form-control m-1" name="realizado">
                                <option value="Ya funciona correctamente">Ya funciona correctamente</option>
                                <option value="Oido Chef">Oido Chef</option>
                                <option value="Faltancomprobarlo">Falta comprobarlo</option>
                                <option value="Otros">Otros</option>
                            </select>

                            <input style="display:none" name="user" type="text" value="<?php echo  $id ?>" />



                            <input value="Finalizar" class="btn btn-primary " type="submit" name="enviar">
                        </form>
                    </td>
            </tr>


        <?php
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
        ?>
        <script>
            var tabla = document.querySelector("#tabla");
            var datatable = new DataTable(tabla);
        </script>