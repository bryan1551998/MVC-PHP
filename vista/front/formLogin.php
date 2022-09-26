<?php

require("vista/layout/header.php");


?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 mt-5 mb-5">
            <form action="<?php echo urlsite ?>?page=loginauth" method="POST">
                <label for="user">Username:</label>
                <input class="form-control" name="user" id="user" type="text" placeholder="Username" /><br>
                <label for="psswd">Password:</label>
                <input class="form-control"  name="psswd" id="psswd" type="password" placeholder="Password" />
                <br>
                <input  class="btn btn-primary btn-block" type="submit" value="Login" class="login-button" />
            </form>
            <!-- Si esxiste la variable msg la imprime si no existe imprme ""
             -->
            <p class="text-danger"><?php echo (isset($_GET['msg'])) ? $_GET['msg'] : "" ?></p>
        </div>
    </div>
</div>

<?php


require("vista/layout/footer.php");


?>