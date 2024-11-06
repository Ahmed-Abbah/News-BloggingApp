<?php

include_once("header.php"); // Include your header
?>
<style>
  .blog_post {
    background: #fff;

    border-radius: 10px;
    box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
    position: relative;
  }


  .container_copy {
    padding: 6rem 4rem 5rem 4rem;
  }

  .img_pod {
    height: 50px;

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

  /* Base button styling */
.btn_primary {
    display: inline-block;
    border: none;
    outline: none;
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    color: #ffffff;
    font-size: 1rem;
    font-weight: 600;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    margin: 0.5rem 0.5rem;
}

/* Primary button - Cool Blue */
.btn_primary.primary {
    background: linear-gradient(90deg, #4a90e2, #357abd);
}

.btn_primary.primary:hover {
    background: linear-gradient(90deg, #357abd, #4a90e2);
    box-shadow: 0px 6px 16px rgba(53, 122, 189, 0.5);
    transform: translateY(-2px);
}

/* Edit button - Soft Green */
.btn_primary.edit {
    background: linear-gradient(90deg, #66bb6a, #43a047);
}

.btn_primary.edit:hover {
    background: linear-gradient(90deg, #43a047, #66bb6a);
    box-shadow: 0px 6px 16px rgba(67, 160, 71, 0.5);
    transform: translateY(-2px);
}

/* Delete button - Soft Red */
.btn_primary.delete {
    background: linear-gradient(90deg, #e57373, #d32f2f);
}

.btn_primary.delete:hover {
    background: linear-gradient(90deg, #d32f2f, #e57373);
    box-shadow: 0px 6px 16px rgba(211, 47, 47, 0.5);
    transform: translateY(-2px);
}

.btn_primary:active {
    transform: translateY(1px);
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
}


  .btn_primary:hover {
    box-shadow: 0px 5px 1rem rgba(255, 94, 98, 0.5);
  }

  @media only screen and (max-width: 650px) {
    body {
      background-color: black;
    }

    .img_pod {}
  }
</style>

<div
  style="max-width: 900px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
  <h1 style="font-size: 24px; font-weight: 600; color: #333; text-align: center; margin-bottom: 20px;">News Posts</h1>

  
        <div>
        <?php

include_once("../scripts/list_posts_script.php"); // Include the script to fetch posts // Include your header
?>
        <?php foreach ($posts as $post): ?>
          <!-- <tr style="height: 200px; max-height: 200px; border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px 15px;"><?php echo htmlspecialchars($post['title']); ?></td>
                        <td style="padding: 12px 15px; max-width: 400px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo htmlspecialchars($post['content']); ?></td>
                        <td style="padding: 12px 15px;"><?php echo htmlspecialchars($post['created_at']); ?></td>
                        <td style="padding: 12px 15px;">
                            <a href="edit_post.php?id=<?php echo $post['id']; ?>" style="padding: 6px 12px; margin-right: 5px; text-decoration: none; color: #fff; font-size: 14px; border-radius: 4px; background-color: #4CAF50;">Edit</a>
                            <a href="delete_post.php?id=<?php echo $post['id']; ?>" style="padding: 6px 12px; text-decoration: none; color: #fff; font-size: 14px; border-radius: 4px; background-color: #f44336;">Delete</a>
                        </td>
                    </tr> -->
          <div class="blog_post" style="width:100%;">
            <div class="img_pod">
              <img src="https://th.bing.com/th/id/OIP.bPakpZ9xYvdOvfcWoc0g-AHaEK?rs=1&pid=ImgDetMain" alt="random image"
                class="card-img">
            </div>
            <div class="container_copy" style="margin-top:50px;">
              <h3><?php echo htmlspecialchars(FormatDate($post['created_at'])); ?></h3>
              <h1><?php echo htmlspecialchars($post['title']); ?></h1>
              <div style="all: initial; color: black; background: white;">
              <p><?php echo trimHtmlParagraph($post['content']); ?></p>
              </div>
              <a class="btn_primary primary" href='#' target="_blank">Voir détails</a>
              <a class="btn_primary edit" href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
              <a class="btn_primary delete" href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>

            </div>

          </div>
        <?php endforeach; ?>
        </div>
</div>

<?php include_once("footer.php"); // Include your footer ?>