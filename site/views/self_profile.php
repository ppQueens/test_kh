<style>

    #upload{
        display:none
    }
</style>

<div class="col-3 mt-3">

    <form id="update_form" action="profile/update" method="post" enctype="multipart/form-data">
        <div class="col col-md-10">
            <h4><?php echo $data["title"]; ?></h4>
            <input form="update_form" hidden name="post" value="update">


            <div class="form-group mt-3 pt-3 card">
                <div class="form-group">
                    <style> img {
                            max-width: 180px;
                        }

                        input[type=file] {
                            padding: 10px;
                        }


                    </style>


                    <img id="blah" src="<?php if($data["user"]["photo"]) {

                        echo 'data:image/jpg;base64,'.base64_encode($data["user"]["photo"]);} else echo 'http://placehold.it/180';  ?>"/>

                </div>

            </div>
            <input form="update_form" id="upload" name="image" type="file"/>
            <a href="" id="upload_link">Обновить фото</a>
        </div>
    </form>
</div>

<div class="col col-md-4 ">
    <div class="form-group mt-5">
        <label class="col-form-label" for="user_full_name">Мое имя</label>
        <input form="update_form" required class="form-control" name="full_name" placeholder="Фимилия и имя" id="full_name"
               type="text"  value="<?php if(isset($data["user"])){echo  $data["user"]["full_name"];} ?>">

    </div>

    <div class="form-group">
        <label class="col-form-label" for="user_email">Почта</label>
        <input form="update_form" required class="form-control" name="email" placeholder="Email" id="user_email" type="text"
               value="<?php if(isset($data["user"])){echo  $data["user"]["email"];} ?>">


    </div>



    <div class="form-group">
        <label class="col-form-label" for="user_about">О себе</label>
        <textarea form="update_form" class="form-control" name="about" placeholder="Немного о себе"
                  id="user_about"><?php if(isset($data["user"])){echo $data["user"]["about"];} ?></textarea>
    </div>


    <button form="update_form" type="submit" class="btn btn-primary">Сохранить изменения</button>

</div>



