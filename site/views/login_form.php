<div class="col-4 mt-5 p-3 pt-4 card mx-auto">
    <form id="log_form"  action="/login" method="post">
        <div class="col col-md-12">
            <input hidden name="post" value="login">


            <?php if (isset($data["errors"]["wrong_e_p"])) {
                echo '<div class="alert alert-danger">
            <strong>' .
                    $data["errors"]["wrong_e_p"] . '</strong>
                 </div>';

            }
            ?>
            <div class="form-group">
                <input required class="form-control" name="email" placeholder="Email" id="user_email" type="text">

            </div>

            <div class="form-group">
                <input required class="form-control" name="password" placeholder="Пароль" id="user_pass"
                       type="password">

            </div>



            <button form="log_form" type="submit" class="btn btn-primary">Войти</button>

        </div>

    </form>
</div>


