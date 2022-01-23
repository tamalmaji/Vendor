<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="img">Product Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image[]" multiple>
                <label class="custom-file-label" for="img">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>