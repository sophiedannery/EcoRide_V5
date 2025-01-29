<?php
require_once 'templates/header.php'
?>

<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Contactez-nous</h1>
</div>


<div class="container">
    <div class="text-center">
        <form class="p-4 p-md-4 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="contact_nom" placeholder="">
                <label for="contact_nom">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="mail" class="form-control" id="contact_email" placeholder="">
                <label for="contact_email">Email</label>
            </div>



            <button class="w-100 btn btn-lg btn-primary" type="submit">Envoyer</button>
            <hr class="my-4">
        </form>
    </div>




</div>

<?php
require_once 'templates/footer.php'
?>