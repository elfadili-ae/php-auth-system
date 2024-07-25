<?php require "includes/header.php"; ?>

<div>
    <?php if (isset($_SESSION['username'])): ?>
        <?php echo "Welcome back <b>" . $_SESSION['username'] . "</b>"; ?>
    <?php else: ?>
        <p>You are not logged in!</p>
    <?php endif; ?>
</div>

<?php require "includes/footer.php"; ?>