<div id="content" style="text-align: center;">
    <?php
    echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

    if (isset($content) && is_array($content)) {
        foreach ($content as $item) {
            echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
            echo '<div style="overflow: hidden;">';
            // Use htmlspecialchars to escape HTML entities in each array element
            echo "<pre>" . htmlspecialchars($item) . "</pre>";
            echo '</div>';
            echo '</div>';
        }
    }

    echo '</div>';
    ?>
</div>
