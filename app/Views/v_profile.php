<?php
    echo 'Profile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/styles.css"/>
	<script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
    <main class="container">
        <section id="startChange" class="section-cust">
            <h1>Profile</h1><br>
            <p><?= session()->get('bio') ?></p>
            <div>
                <tr>
                    <td>Username: <?= session()->get('username') ?></td>
                    <td>Email: <?= session()->get('email') ?></td>
                </tr>
            </div>
        </section>
    </main>
</body>
</html>
