<?php

$option = get_option( 'mobytic_rgpd' );
$link = isset($option['mobytic_rgpd_setting_lien']) ? $option['mobytic_rgpd_setting_lien'] : '';

?>

<div id="mobytic-rgpd-wrapper">

    <input type="checkbox" id="checkbox_rgpd">
    <label for="checkbox_rgpd" class="open">
        RGPD
    </label>

    <div id="mobytic-rgpd">

        <div class="mobytic-rgpd-body">
            <div class="mobytic-rgpd-body-header">
                <div class="title">
                    <h1 id="mobytic_rgpd_title">
                        <small>Salut c'est nous ...</small>
                        <span>Les Cookies !</span>
                    </h1>
                </div>
                <div class="img"></div>
            </div>
            <p id="mobytic_rgpd_p">Nous nous soucions de vos données, et nous aimerions utiliser des cookies pour
                améliorer votre
                expérience.</p>
        </div>
        
        <div class="mobytic-rgpd-footer" 
            <?php
                if ($link) {
                    echo 'style="grid-template-columns: repeat(3, 1fr) !important;"';
                }
            ?>
        >
            <?php
                if ($link) {
                    echo "<a href=\"$link\"><label>Plus d'infos</label></a>";
                }
            ?>

            <a>
                <label for="checkbox_rgpd">
                    Refuser
                </label>
            </a>
            <a>
                <label for="checkbox_rgpd">
                    Accepter
                </label>
            </a>
        </div>

    </div>

</div>