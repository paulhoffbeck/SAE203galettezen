<?php

function collaborateur(){
    echo '<div class="container mb-5">
    <h1 class="my-4">Liste des collaborateurs</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
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

        foreach ($donnee as $employee) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($employee['nom']) . '</td>';
            echo '<td>' . htmlspecialchars($employee['prenom']) . '</td>';
            echo '<td>' . htmlspecialchars($employee['poste']) . '</td>';
            echo '<td>' . htmlspecialchars($employee['email']) . '</td>';
            echo '<td>' . htmlspecialchars($employee['telephone']) . '</td>';
            echo '<td><a href="mailto:' . htmlspecialchars($employee['email']) . '">' . htmlspecialchars($employee['email']) . '</a></td>';
            echo '</tr>';
        }
    echo ' </tbody>
    </table></div>';
}

?>