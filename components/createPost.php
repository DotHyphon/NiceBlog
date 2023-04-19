<h1 class="display-4">Create a post</h1>
<form class="mb-5" action="/blog/api.php" method="POST">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required>
    </div>
    <div class="form-group mb-2">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
</form>