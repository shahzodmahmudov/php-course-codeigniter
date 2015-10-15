Welcome to signin page in view.
<form action="/signin/login" method="post">
    <p>Login: <input type="text" name="username"/>

    <p>Password: <input type="password" name="password"/>

    <p><input type="submit" value="login">
</form>

<?php if (isset($status) && isset($message)): ?>
<p>Status: <?php echo $status; ?>
<p>Message: <?php echo $message; ?>
<?php endif; ?>
