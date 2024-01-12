<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Delete Product</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) {
                echo $content->getId();
            } ?>"/>

            <label>* Required fields</label>
            <input type="submit" name="actionDelete" value="delete"/>
            <input type="submit" name="reset" value="reset"/>
        </fieldset>
    </form>

</div>