<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?= base_url('home/login'); ?>" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" placeholder="Username..." required><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="Password..." required><br><br>
        <input type="submit" name="submit" value="Login" style="background-color: green; padding: 10px; cursor: pointer; color: white; border-radius: 10px; outline: none;">
    </form>
    <hr>
    <?php if($failed = $this->session->flashdata('failed')): ?>
        <div style="background-color: red; color: white; padding-top: 15px; padding-left: 10px; width: 50%; height: 30px;">
            <?php echo $failed; ?>
        </div>
    <?php endif; ?>

    <h2>Sign Up Here</h2>
    <hr>
    <form action="<?= base_url('admin/signup'); ?>" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Name here..."><br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email here..."><br><br>
        <label for="location">Location: </label>
        <textarea name="location" id="location" cols="30" rows="3" placeholder="Address"></textarea><br><br>
        <label for="cnic">CNIC: </label>
        <input type="text" name="cnic" id="cnic" placeholder="CNIC..."><br><br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" placeholder="Username..." required><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="Password..." required><br><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
    <br>
    <?php if($success = $this->session->flashdata('success')): ?>
        <div style="background-color: red; color: white; padding-top: 15px; padding-left: 10px; width: 50%; height: 30px;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
</body>
</html>