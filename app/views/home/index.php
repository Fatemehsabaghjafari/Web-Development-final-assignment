
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FS FLOWER SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your custom styles here */
        .social-icon {
            margin: 0 10px;
            font-size: 24px;
            transition: color 0.3s ease-in-out;
        }

        .social-icon:hover {
            color: #ffc107; /* Highlight color on mouseover */
        }
    </style>
</head>

<body>
    
    <?php
include __DIR__ . '/../header.php';
?>
 <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Welcome to the FS flower shop!</h1>
            <p class="lead">Discover a wide range of flowers.</p>
        </div>
  </div>

  <section class="container mb-4">
        
        <form action="/app/views/home/index.php" method="GET" class="mb-4">

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for flowers..." name="query">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <h2> Flowers </h2>
        
        <div class="row">
            <?php
            // Include the FlowerRepository and fetch filtered flowers
           // require_once __DIR__ . '/../../repositories/FlowerRepository.php';
            $flowerRepository = new \App\Repositories\FlowerRepository();
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
            $filteredFlowers = $flowerRepository->searchByName($searchQuery);

            // Render the filtered flowers
            include 'render-flowers.php';
            ?>
        </div>
    </section>

 <!-- Product Section -->


 <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                <!-- Add more social icons as needed -->
            </div>
        </div>
    </footer>

    <!-- ... (remaining code) ... -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

