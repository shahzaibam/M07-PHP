<form method="post" action="">

    <h1>Search pet by ID</h1>

    <div class="form-group form-inline"> ID of pet *:
        <input type="text" placeholder="ID" name="id" value="<?php if (isset($content)) echo $content->getId(); ?>">
    </div>

    <p>* Required fields</p>

    <input class="btn-success mr-2" type="submit" name="action" value="search_pet_by_id">
    <input class="btn-danger" type="submit" name="reset" value="reset">

</form>