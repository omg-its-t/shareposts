<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>
    <div class="card card-body bglight mt-5">
        <h2>Add Post</h2>
        <p>What are you're thoughts?</p>
        <form action="<?php echo URLROOT;?>/post/add" method="POST">
            <div class="form-group">
                <label for="name">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title'];?>">
                <span class="invalid-feedback"><?php echo $data['title_error'];?></span>
            </div>
            <div class="form-group">
                <label for="name">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : '';?>" <?php echo $data['body'];?>></textarea>
                <span class="invalid-feedback"><?php echo $data['body_error'];?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>