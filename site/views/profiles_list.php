<?php

foreach ($data["all"] as $indx => $value) {


    echo '<div class="col  col-md-3">

    <div class="form-group mt-3 pt-3 pl-2 card">
        <div class="form-group">
            <style> img {
                    max-width: 70px;
                }

                input[type=file] {
                    padding: 10px;
                                            
                }
            </style>';
    $src = "";
    if ($value["photo"]) {
        $src = 'data:image/jpg;base64,' . base64_encode($value["photo"]);
        echo '<style>.user_pic'.$indx.':hover {
                            transform: scale(2.5); 
                        }
            </style>';
    } else $src = 'http://placehold.it/180';

    echo '<img class="user_pic' . $indx .  '" src="' . $src . '"/>';

    echo '<div><a href="/profile?user=' . $value["email"] . '" >' . $value["email"] . ' </a></div>';

    echo '</div></div></div>';
//            <a href="/profile?user='. $value["email"] .'" > </a>


}

