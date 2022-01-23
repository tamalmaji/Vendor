<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Sider Title</label>
        <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" name="title" require placeholder="Catagory Name" value="<?php echo $title ?>">
        <span class="invalid-feedback"><?php echo $title_err; ?></samp>
    </div>

    <div class="form-group">
        <label for="img">Sider Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="img">Choose file</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>