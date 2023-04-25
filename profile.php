<? include './components/header.php'; ?>

<div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Uplaod profile picture</h2>
                <form class="form-group" action="api.php" method="post" enctype="multipart/form-data">
                    <input id="submit" class="btn btn-primary mb-3" type="submit" name="upload_pfp" style="display: none;">
                    <img id="preview" class="img-fluid mb-3" src="" alt="Preview" style="display: none;">
                    <input class="form-control-file mb-3" type="file" name="image" accept="image/*">
                    <input type="hidden" name="resized_image">
                    
                </form>
                
                <!-- img that is centered   -->
                
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


<script> <?php require_once("./js/resizeImage.js") ?> </script>

<? include './components/footer.php'; ?>