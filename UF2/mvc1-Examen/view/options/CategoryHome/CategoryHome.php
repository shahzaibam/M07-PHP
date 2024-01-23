<div id="content">
        <?php
        echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';


        if (isset($content)) {

           foreach ($content as $category) {

                echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
                echo "<img src='http://localhost/M07-PHP/UF2/mvc1-Examen/view/img/{$category->getId()}.jpg' width='150px' height=''>";
                echo "<div>";
                if($category->getId() == 1) {
                    echo "<a href='http://localhost/M07-PHP/UF2/mvc1-Examen/index.php?menu=book&option=listAll'>{$category->getDesc()}</a> <br>";

                }else {
                    echo "<span>{$category->getDesc()}</span> <br>";
                }
                echo "</div>";
                echo '</div>';
            }
        }

        echo '</div>';
        ?>
</div>
