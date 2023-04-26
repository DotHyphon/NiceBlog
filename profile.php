<? include './components/header.php'; ?>


<div class="container-sm" style="max-width: 500px;">
<? 
$p_user_id = $_SESSION['user_id']; ?>

    <a href="./profile.php?edit=pfp"><img id="preview" src="./images/pfp/<? echo $p_user_id ?>" onerror="this.src='./images/pfp/default'" alt="" class="card-img-top p-1 mx-auto"></a>

    <? if (isset($_GET['edit'])): ?>
        <? if ($_GET['edit'] == 'pfp'): ?>
        <form class="form-group" action="api.php" method="post" enctype="multipart/form-data">
            <button id="submit" class="btn btn-primary mb-3" type="submit" name="upload_pfp" style="display: none;">Update Profile Picture</button>
            <!-- <img id="preview" class="img-fluid mb-3" src="" alt="Preview" style="display: none;"> -->
            <input class="form-control-file mb-3" type="file" name="image" accept="image/*">
            <input type="hidden" name="resized_image">
        </form>
        <? endif; ?>
    <? endif; ?>

    <div>
        <? echo get_user_by_id($p_user_id)['name']; ?> 
        <a class="link-dark" href="./profile.php?edit=name">edit</a>
    </div> 
    <? if (isset($_GET['edit'])): ?>
        <? if ($_GET['edit'] == 'name'): ?>
        <form class="form-group" action="api.php" method="post">
            <input class="form-control mb-3" type="text" name="name" value="<? echo get_user_by_id($p_user_id)['name']; ?>">
            <button class="btn btn-primary mb-3" type="submit" name="update_name">Update Name</button>
        <? endif; ?>
    <? endif; ?>

    <div>
        <? echo get_user_by_id($p_user_id)['email']; ?>
    </div>
    <br>
    
    <div class="card-footer d-inline"></div>
    <!-- need this blank link or the grid order goes whack -->
    <a class="card-link" href="#"></a>

    
    
    
</div>


<script> <?php require_once("./js/resizeImage.js") ?> </script>

<? include './components/footer.php'; ?>