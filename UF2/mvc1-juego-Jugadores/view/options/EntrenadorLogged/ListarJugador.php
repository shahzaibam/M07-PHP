<div id="content" style="text-align: center;">
<?php
echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

if (isset($content) && is_array($content)) {
    foreach ($content as $item) {
        echo '<div style="width: 30%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
        echo '<div style="overflow: hidden; word-wrap: break-word; max-height: 200px;">';

        foreach ($item as $key => $value) {
            echo "<p style='margin: 0;'>{$value}</p>";

        }

        echo '</div>';
        echo '</div>';
    }
}

echo '</div>';

