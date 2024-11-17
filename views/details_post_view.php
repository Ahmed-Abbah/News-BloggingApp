<?php

include_once("header.php");

include("../scripts/details_post_script.php");

?>
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                <?php
// Assuming you already retrieved the post in the $post variable from the database
// Example: $post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($post) {
    // Retrieve data from the $post array
    $title = $post['title'];
    $slug = $post['slug'];
    $excerpt = $post['excerpt'];
    $content = $post['content'];
    $imagePath = $post['image_path'];
    $createdAt = $post['created_at'];
    $updatedAt = $post['updated_at'];
    // Add other fields you want to display
    ?>

    <div class="col-lg-8">
        <div class="sn-container">
            <div class="sn-img">
                <!-- Display the image if available -->
                <img src="../scripts/<?php echo $imagePath; ?>" alt="<?php echo $imagePath; ?>" />
            </div>
            <div class="sn-content">
                <h1 class="sn-title"><?php echo $title; ?></h1>
                <p>
                    <?php echo $excerpt; ?>
                </p>
                <div style="color: black; background: white;">
                
                    <?php echo nl2br($content); ?> <    !-- Display the full content, use nl2br to preserve line breaks -->
                
                </div>
                

                <!-- You can add more content or other fields if necessary -->
            </div>
        </div>

        <div class="sn-related">
            <h2>Related News</h2>
            <div class="row sn-slider">
                <!-- Example related posts section, replace with actual data if available -->
                <div class="col-md-4">
                    <div class="sn-img">
                        <img src="img/news-350x223-1.jpg" alt="Related News 1" />
                        <div class="sn-title">
                            <a href="#">Interdum et fames ac ante</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sn-img">
                        <img src="img/news-350x223-2.jpg" alt="Related News 2" />
                        <div class="sn-title">
                            <a href="#">Interdum et fames ac ante</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sn-img">
                        <img src="img/news-350x223-3.jpg" alt="Related News 3" />
                        <div class="sn-title">
                            <a href="#">Interdum et fames ac ante</a>
                        </div>
                    </div>
                </div>
                <!-- Add more related news items if needed -->
            </div>
        </div>
    </div>

    <?php
} else {
    echo "Post not found.";
}
?>


                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">In This Category</h2>
                                <div class="news-list">
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-1.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-2.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-3.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-4.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-5.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="tab-news">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-1.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-2.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-5.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popular" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-2.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-1.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-2.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="latest" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-5.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="sw-title">News Category</h2>
                                <div class="category">
                                    <ul>
                                        <li><a href="">National</a><span>(98)</span></li>
                                        <li><a href="">International</a><span>(87)</span></li>
                                        <li><a href="">Economics</a><span>(76)</span></li>
                                        <li><a href="">Politics</a><span>(65)</span></li>
                                        <li><a href="">Lifestyle</a><span>(54)</span></li>
                                        <li><a href="">Technology</a><span>(43)</span></li>
                                        <li><a href="">Trades</a><span>(32)</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <h2 class="sw-title">Tags Cloud</h2>
                                <div class="tags">
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->        
        <?php include_once("footer.php");?>