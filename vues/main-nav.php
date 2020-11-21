<div class="col-6">
    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link <?php if($is_index){echo 'active'; } ?>" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link <?php if($is_annonces){echo 'active'; } ?>" href="annonces.php">Annonces</a></li>
            <li class="nav-item"><a class="nav-link <?php if($is_utilisateurs){echo 'active'; } ?>" href="utilisateurs.php">Utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link <?php if($is_voitures){echo 'active'; } ?>" href="voitures.php">Voitures</a></li>
            <li class="nav-item"><a class="nav-link <?php if($is_reservations){echo 'active'; } ?>" href="reservations.php">Réservations</a></li>
        </ul>
    </nav>
</div>