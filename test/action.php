<?php



if (isset($_POST['nom_user'])) {
    echo 'Je m\'appel ' .$_POST['nom_user']. ' et je m\'identifie comme ' .$_POST['sexe'];
} else {
    echo ' pas de nom';
}