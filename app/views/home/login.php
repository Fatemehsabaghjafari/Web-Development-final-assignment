<?php
session_start();

//include __DIR__ . '/../../Models/User.php';
include __DIR__ . '/../../Repositories/UserRepository.php'; // Adjust the path accordingly

// Create an instance of UserRepository
$userRepository = new App\Repositories\UserRepository();

// Assuming $model is an array of user objects fetched from the database
$model = $userRepository->getAllUsers(); // Call the method on the instance


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($model as $user) {
        // Validate the user (replace this with your actual validation logic)
        if ($username === $user->username && $user->verifyPassword($password)) {
            // Authentication successful
            $_SESSION['user'] = $user;
            header('Location: /'); // Redirect to the main page
            exit();
        }
    }

    // Authentication failed
    $error = 'Invalid username or password';
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- ... (head and other HTML tags) ... -->

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ... (remaining code) ... -->
</body>

</html>
