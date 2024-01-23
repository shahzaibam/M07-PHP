<div id="content">
    <fieldset>
        <legend>Category list</legend>
        <?php

        if(isset($_SESSION["rol"])) {
           if($_SESSION["rol"] == "admin") {
                if (isset($content)) {
                    echo <<<EOT
                                        <table>
                                            <tr>
                                                <th>Isbn</th>
                                                <th>Title</th>
                                                <th>DEsc</th>
                                                <th>Author</th>
                                                <th>PubData</th>
                                                <th colspan="2"><button>Add</button></th>
                                            </tr>
                    EOT;
                    foreach ($content as $category) {
                        echo <<<EOT
                                            <tr>
                                                <td>{$category->getIsbn()}</td>
                                                <td>{$category->getTitle()}</td>
                                                <td>{$category->getDescription()}</td>
                                                <td>{$category->getAuthor()}</td>
                                                <td>{$category->getPubData()}</td>
                                                <td><button><a href="http://localhost/M07-PHP/UF2/mvc1-Examen/index.php?menu=book&option=add">Update</a></button></td>
                                                <td><button><a>Delete</a></button></td>
                                            </tr>

                    EOT;
                    }

                    echo <<<EOT
                                                
                                        </table>
                    EOT;
                }

           }else {
                    if (isset($content)) {
                        echo <<<EOT
                                <table>
                                    <tr>
                                        <th>Isbn</th>
                                        <th>Title</th>
                                        <th>DEsc</th>
                                        <th>Author</th>
                                        <th>PubData</th>
                                    </tr>
            EOT;
                        foreach ($content as $category) {
                            echo <<<EOT
                                    <tr>
                                        <td>{$category->getIsbn()}</td>
                                        <td>{$category->getTitle()}</td>
                                        <td>{$category->getDescription()}</td>
                                        <td>{$category->getAuthor()}</td>
                                        <td>{$category->getPubData()}</td>
                                    </tr>
            EOT;
                        }
                        echo <<<EOT
                                </table>
            EOT;
                    }

           }
        }
        ?>


    </fieldset>
</div>
