<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead"><?php echo $data['description']; ?></p>
    </div>
</div>
    
    
<?php require APPROOT . '/views/inc/footer.php'; ?>

<!--
able to go to controller and load model (pages controller)
load the model (database.php) and call model function (getPosts)
set that to a variable and send to view
-->