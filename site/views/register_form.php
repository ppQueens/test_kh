<div class="col-4">
    <form id="reg_form" action="/registration" method="post" enctype="multipart/form-data">
        <div class="col col-md-10">
            <input hidden name="post" value="register">
            <div class="form-group">
                <label class="col-form-label" for="user_full_name">Как вас называть?</label>
                <input required class="form-control" name="full_name" placeholder="Фимилия и имя" id="full_name"
                       type="text">

                <?php if (isset($data["errors"]["full_name"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["full_name"] . '</strong>
                 </div>';

                }
                ?>

            </div>

            <div class="form-group">
                <label class="col-form-label" for="user_email">Почта</label>
                <input required class="form-control" name="email" placeholder="Email" id="user_email" type="text">

                <?php if (isset($data["errors"]["email"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["email"] . '</strong>
                 </div>';
                }

                if (isset($data["errors"]["exist"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["exist"] . '</strong>
                 </div>';
                }
                ?>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="user_pass">Пароль</label>
                <input required class="form-control" name="password" placeholder="Пароль" id="user_pass"
                       type="password">

                <?php if (isset($data["errors"]["password"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["password"] . '</strong>
                 </div>';

                }
                ?>
            </div>


            <div class="form-group">
                <label class="col-form-label" for="user_pass2"></label>
                <input required class="form-control" name="password2" placeholder="Повторите пароль" id="user_pass2"
                       type="password">

                <?php if (isset($data["errors"]["password2"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["password2"] . '</strong>
                 </div>';

                }

                if (isset($data["errors"]["different_password"])) {
                    echo '<div class="alert alert-danger">
            <strong>' .
                        $data["errors"]["different_password"] . '</strong>
                 </div>';

                }
                ?>
            </div>

            <button form="reg_form" type="submit" class="btn btn-primary">Загеристрироваться</button>

        </div>

    </form>
</div>

<div class="col col-md-5">
    <div class="form-group">
        <label class="col-form-label" for="user_about">О себе</label>
        <textarea form="reg_form" class="form-control" name="about" placeholder="Немного о себе"
                  id="user_about"></textarea>
    </div>
    <div class="form-group">
        <div class="form-group">
            <style> img {
                    max-width: 180px;
                }

                input[type=file] {
                    padding: 10px;
                }
            </style>


            <label for="exampleFormControlFile1">Ваше фото</label>
            <input form="reg_form" type="file" name="image" class="form-control-file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0]);" id="exampleFormControlFile1">
            <img id="blah" src="http://placehold.it/180"/>

        </div>
    </div>

</div>



