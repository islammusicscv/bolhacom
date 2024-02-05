<?php
    include_once 'header.php';
?>

<h1>Pozdravljeni.</h1>

<a class="btn btn-primary" href="item_add.php" role="button">Dodaj oglas</a>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include_once 'db.php';
        $query = "SELECT i.*, c.title as category FROM items i INNER JOIN categories c 
                   ON i.category_id=c.id 
                    WHERE (i.date_end >= CURDATE())
                    ORDER BY i.date_add DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo '<div class="col">';
            echo '<div class="card shadow-sm">';
                echo '<img src="https://placehold.co/600x400/EEE/31343C" alt="Manjkajoča slika"/>';
                echo '<div class="card-body">';
                    echo '<p class="card-text"><strong>'.$row['title'].'</strong><br />'.$row['description'].'</p>';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="btn-group">';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>';
                        echo '</div>';
                        echo '<small class="text-body-secondary">'.$row['category'].'</small>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

<?php
    include_once 'footer.php';
