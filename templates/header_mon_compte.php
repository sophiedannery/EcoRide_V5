<?php

require_once 'lib/config.php';

$currentPage = basename($_SERVER['SCRIPT_NAME']);

?>

<div class="container">
    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between">
            <?php foreach ($profilMenu as $key => $value) { ?>

                <li class="nav-item">
                    <a href="<?= $key; ?>" class="nav-item nav-link link-body-emphasis <?php if ($currentPage === $key) {
                                                                                            echo 'active';
                                                                                        } ?>"> <?= $value; ?></a>
                </li>
            <?php } ?>
        </nav>
    </div>
</div>