<?php
include("inc/config.php");
include("inc/header.php");
?>

<div class="container">
    <div class="searchZone hide">
        <ul>
            
        </ul>
        <a href="#">Clear</a>
    </div>
</div>

<section id="jobListing">
<div class="container">
    <div class="jobList">
    <?php
        foreach ($jobArray as $Array) {
            echo '<div class="jobItem" data-tags="';
            foreach ($Array->languages as $lang) {
                echo $lang;
                echo ',';
            }
            foreach ($Array->tools as $tool) {
                echo $tool;
                echo ',';
            }
                echo $Array->role;
                echo ',';
                echo $Array->location;
            echo'">';
                echo '<div class="jobHeader">';
                    echo '<div class="companyLogo">';
                        echo '<img src="' . $Array->logo . '" alt="' . $Array->company . '">';
                    echo '</div>';
                echo '<div class="jobInfo">';
                    echo '<div class="companyName">';
                        echo '<h4>' . $Array->company . '</h4>';
                        if ($Array->new === true) {
                            echo '<span class="newTags">NEW!</span>';
                        } else {
                            echo '';
                        }
                        if ($Array->featured === true) {
                            echo '<span class="featuredTags">FEATURED</span>';
                        } else {
                            echo '';
                        }
                    echo '</div>';
                    echo '<div class="jobName">';
                        echo '<p>' . $Array->position . '</p>';
                    echo '</div>';
                    echo '<div class="jobContract">';
                        echo '<ul>';
                            echo '<li class="light-txt">' . $Array->postedAt . '</li>';
                            echo '<li class="light-txt">' . $Array->contract . '</li>';
                            echo '<li class="light-txt">' . $Array->location . '</li>';
                        echo '</ul>';
                    echo '</div>';
            echo '</div>';
            echo '</div>';
                echo '<div class="languages">';
                    echo '<ul>';
                        foreach ($Array->languages as $lang) {
                            echo '<li><span data-tags="' . $lang . '" class="tags">' . $lang . '</span>';
                        }
                        foreach ($Array->tools as $tool) {
                            echo '<li><span data-tags="' . $tool . '" class="tags">' . $tool . '</span>';
                        }
                        echo '<li><span data-tags="' . $Array->role . '" class="tags">' . $Array->role . '</span>';
                        echo '<li><span data-tags="' . $Array->location . '" class="tags">' . $Array->location . '</span>';
                    echo '</ul>';
                echo '</div>';
            echo '</div>';
        }
    ?>
    </div>
</div>
</section>

<script src="js/app.js" defer></script>
</body>
</html>