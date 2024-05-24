<?php
function sidebar() {
    echo '
    <nav id="sidebar" class="bg-ketchup text-white p-4">
        <h4>Au Menu</h4>
        <ul class="list-unstyled">
            <br>
            <li><a href="index.php" class="text-white">Accueil</a></li>
            <br>
            <li><a href="partenaires.php" class="text-white">Partenaires</a></li>
            <br>
            <li><a href="about.php" class="text-white">Qui sommes-nous</a></li>
            <br>
            <li><a href="history.php" class="text-white">Histoire</a></li>
            <br>
            <li><a href="activity.php" class="text-white">Activité</a></li>
            <br>
            <li><a href="contacts.php" class="text-white">Contacts</a></li>
        </ul>
    </nav>
    ';
}

?> 
    <script>
      function action(){
        document.getElementById('toggleButton').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';
        });

      }
      action();
    </script>