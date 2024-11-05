<?php
include_once("../scripts/list_posts_script.php"); // Include the script to fetch posts
include_once("header.php"); // Include your header
?>
<style>
    .blog_post {
  background: #fff;
  max-width: 500px;
  border-radius: 10px;
  box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
  position: relative;
}


.container_copy {
  padding: 6rem 4rem 5rem 4rem;
}

.img_pod {
  height: 110px;
  width: 110px;
  background: linear-gradient(90deg, #ff9966, #ff5e62);
  z-index: 10;
  box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
  border-radius: 100%;
  position: absolute;
  left: -10%;
  top: -13%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-img {
  height: 8.3rem;
  width: 8.3rem;
  position: relative;
  border-radius: 100%;
  box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
  z-index: 1;
}

h3 {
  margin: 0 0 0.5rem 0;
  color: #999;
  font-size: 1.25rem;
}

h1 {
  margin: 0 0 1rem 0;
  font-size: 2.5rem;
  letter-spacing: 0.5px;
  color: #333;
}

p {
  margin: 0 0 4.5rem 0;
  font-size: 1.5rem;
  line-height: 1.45;
  color: #333;
}

.btn_primary {
  border: none;
  outline: none;
  background: linear-gradient(90deg, #ff9966, #ff5e62);
  padding: 1.5rem 2rem;
  border-radius: 50px;
  color: white;
  font-size: 1.2rem;
  box-shadow: 1px 10px 2rem rgba(255, 94, 98, 0.5);
  transition: all 0.2s ease-in;
  text-decoration: none;
}

.btn_primary:hover {
  box-shadow: 0px 5px 1rem rgba(255, 94, 98, 0.5);
}

@media only screen and (max-width: 650px) {
  body {
    background-color: black;
  }

  .img_pod {

  }
}

</style>

<div style="max-width: 900px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 24px; font-weight: 600; color: #333; text-align: center; margin-bottom: 20px;">News Posts</h1>

    <?php if (count($posts) > 0): ?>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead style="background-color: #0073e6; color: #fff;">
                <tr>
                    <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-weight: 600;">Title</th>
                    <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-weight: 600;">Content</th>
                    <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-weight: 600;">Created At</th>
                    <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr style="height: 200px; max-height: 200px; border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px 15px;"><?php echo htmlspecialchars($post['title']); ?></td>
                        <td style="padding: 12px 15px; max-width: 400px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo htmlspecialchars($post['content']); ?></td>
                        <td style="padding: 12px 15px;"><?php echo htmlspecialchars($post['created_at']); ?></td>
                        <td style="padding: 12px 15px;">
                            <a href="edit_post.php?id=<?php echo $post['id']; ?>" style="padding: 6px 12px; margin-right: 5px; text-decoration: none; color: #fff; font-size: 14px; border-radius: 4px; background-color: #4CAF50;">Edit</a>
                            <a href="delete_post.php?id=<?php echo $post['id']; ?>" style="padding: 6px 12px; text-decoration: none; color: #fff; font-size: 14px; border-radius: 4px; background-color: #f44336;">Delete</a>
                        </td>
                    </tr>
                    <div class="blog_post">
  <div class="img_pod">
    <img src="https://th.bing.com/th/id/OIP.bPakpZ9xYvdOvfcWoc0g-AHaEK?rs=1&pid=ImgDetMain" alt="random image" class="card-img">
  </div>
  <div class="container_copy">
    <h3>12 January 2019</h3>
    <h1>CSS Positioning</h1>
    <p>The position property specifies the type of positioning method used for an element (static, relative, absolute, fixed, or sticky).</p>
    <a class="btn_primary" href='#' target="_blank">Read More</a>
  </div>
  
</div>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #666; font-size: 16px; text-align: center;">No active posts found.</p>
    <?php endif; ?>
</div>

<?php include_once("footer.php"); // Include your footer ?>
