<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Add Product</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />
            <label>Name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) { echo $content->getName(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset"  />
        </fieldset>
    </form>
</div>