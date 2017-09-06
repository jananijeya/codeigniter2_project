<h2>Create a News Item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?> <!-- form_open() renders form element and adds hidden CSFR field -->
  <label for="title">Title</label>
  <input type="input" name="title" /><br/>

  <label for="text">Text</label>
  <textarea name="text"></textarea><br/>

  <input type="submit" name="submit" value="Create news item" />
</form>
