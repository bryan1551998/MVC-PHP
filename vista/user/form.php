<?php $fechaActual = date('Y-m-d H:i:s'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 mt-5 mb-5">
            <form action="<?php echo urlsite ?>?page=user" method="POST">
                <label for="material">Material</label>
                <select class="form-control" name="material" id="material">
                    <option value="teclado">teclado</option>
                    <option value="raton">ratón</option>
                    <option value="torre">torre</option>
                    <option value="monitor">monitor</option>
                </select>
                <br>
                <label for="aula">Aula</label>
                <select class="form-control" name="aula" id="aula">
                    <option value="201">201</option>
                    <option value="202">202</option>
                    <option value="203">203</option>
                    <option value="204">204</option>
                </select>
                <br>
                <label for="prioridad">Prioridad</label>
                <select class="form-control" name="prioridad" id="prioridad">
                    <option value="baja">baja</option>
                    <option value="media">media</option>
                    <option value="alta">alta</option>
                </select>
                <br>
                <label for="comentario">Comentario</label>
                <br>
                <textarea class="form-control" id="comentario" name="texto" rows="4" cols="20"></textarea>
                <br>
                <label for="envioemail">¿Enviar Mail a tu departamento?</label>
                <select class="form-control" name="envioemail" id="envioemail">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
                <br>
                <input class="btn btn-primary btn-block" type="submit" value="Submit" name="insertar">
            </form>
        </div>
    </div>
</div>

