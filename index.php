<? include './components/header.php'; ?>

    
<div class="container">
    <!-- row reverse so userProfile side column goes ontop if grid becomes 1 column -->
    <div class="row flex-row-reverse">

    <? if(isset($_SESSION['logged_in']) && !isset($_GET['user_id'])): ?>

        <!-- right hand column -->
        <div class="col-md-4">
            <? 
            $p_user_id = $_SESSION['user_id']; 
            include './components/userProfile.php'; 
            ?>
        </div>

        <!-- left hand column -->
        <div class="col-md-8">
            <? include './components/createPost.php'; ?>

            <h1>Recent Posts</h1>
            <br>

            <!-- display random recent posts -->
            <? 
            foreach(get_posts() as $p_post) {
                include './components/post.php';
            } 
            ?>
        </div>

    <? elseif (isset($_GET['user_id'])): ?>
        <!-- right hand column -->
        <div class="col-md-4">
            <?  
            $p_user_id = $_GET['user_id']; 
            include './components/userProfile.php';
            ?>
        </div>

        <!-- left hand column -->
        <div class="col-md-8">
            <h1><? echo get_user_by_id($_GET['user_id'])['name'] ?>'s Latest Posts</h1>
            <br>
            <?  
            foreach(get_posts($_GET['user_id']) as $p_post) {
                include './components/post.php';
            } 
            ?>
        </div>


    <? else: ?>
        <!-- display random blog posts/accoutns -->
        <? 
        foreach(get_posts() as $p_post) {
            include './components/post.php';
        } 
        ?>
    <? endif; ?>
    </div>
</div>
    

    <script src="main.js"></script>

    <? include './components/footer.php'; ?>

    

