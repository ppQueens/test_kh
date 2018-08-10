<div class="col-3 mt-3">

        <div class="col  col-md-10">
            <h4><?php echo $data["user_title"]; ?></h4>

            <div class="form-group mt-3 pt-3 card">
                <div class="form-group">
                    <style> img {
                            max-width: 180px;
                        }

                        input[type=file] {
                            padding: 10px;
                        }
                    </style>

                    <img id="blah" src="<?php if($data["user_profile"]["photo"]) {echo 'data:image/jpg;base64,'.base64_encode($data["user_profile"]["photo"]);} else echo 'http://placehold.it/180';  ?>"/>

                </div>
            </div>


        </div>

</div>

<div class="col col-md-4 mt-5">
    <div class="form-group mt-5">
        <label class="col-form-label font-weight-bold" for="user_full_name">Имя: </label>
       <p><?php if(isset($data["user_profile"])){echo  $data["user_profile"]["full_name"];} ?></p>

    </div>

    <div class="form-group ">
        <label class="col-form-label font-weight-bold" for="user_email">Почта:</label>
        <p><?php if(isset($data["user_profile"])){echo  $data["user_profile"]["email"];} ?></p>


    </div>



    <div class="form-group">
        <label class="col-form-label font-weight-bold" for="user_about">О себе:</label>
            <p class="card pb-4 pt-1 pl-2"><?php if(isset($data["user_profile"])){echo $data["user_profile"]["about"];} ?></p>
    </div>



</div>



