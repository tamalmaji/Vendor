<form action="" method="post">
    <div class="form-group">
        <label for="title">Type Title</label>
        <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid': ''; ?>" name="title" require placeholder="Type Name" value="<?php echo $title ?>">
        <span class="invalid-feedback"><?php echo $title_err; ?></samp>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>