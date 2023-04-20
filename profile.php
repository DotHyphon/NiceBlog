<? include './components/header.php'; ?>

<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>uplaod profile picture</h2>
                <form action="api.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="resized_image">
                    <input type="submit" name="upload_pfp">
                </form>
                <img id="preview" src="" alt="Preview">
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


<script src="./js/resizeImage.js"></script>

<? include './components/footer.php'; ?>