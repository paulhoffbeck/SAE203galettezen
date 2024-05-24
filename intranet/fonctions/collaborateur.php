<?php

function collaborateur(){
    ?>
    <script>
    function bigImg(x) {
        x.style.height = "100px";
        x.style.width = "100px";
        }
    function normalImg(x) {
        x.style.height = "28px";
        x.style.width = "28px";
        }
    </script>
    <?php
    echo '<div class="container mb-5">
    <h1 class="my-4">Liste de nos collaborateurs</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>Téléphone</th>
                <th>Poste</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>';

            $json = file_get_contents('./database/user.json');
            $donnee = json_decode($json, true);

            foreach ($donnee as $key => $employee) {
                echo '<tr>';
                echo '<td> <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="./img/collaborateur/'.$key.'.png" width="28px"> </td>';
                echo '<td>' . $employee['nom'] . '</td>';
                echo '<td>' . $employee['prenom'] . '</td>';
                echo '<td>' . $employee['poste'] . '</td>';
                echo '<td>' . $employee['email'] . '</td>';
                echo '<td>' . $employee['telephone'] . '</td>';
                echo '<td>'. $employee['email'] . '</a></td>';
                echo '</tr>';
            }
    echo ' </tbody>
    </table></div>';
}

?>