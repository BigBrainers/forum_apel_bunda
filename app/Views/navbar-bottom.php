<?php

use App\Controllers\Home;
?>
<!-- Bottom Navbar -->
<nav class="navbar navbar-dark navbar-bottom navbar-expand fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="<?= base_url('/user') ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <a type="button" class="nav-link btn-modal">Add</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/user/profile') ?>" class="nav-link">Profile</a>
        </li>
    </ul>
</nav>