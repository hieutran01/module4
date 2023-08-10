<form method="POST" action="/hi">
<div>
    <input type="text" name="username" placeholder="nhập username..."/>
    <input type="hidden" name="_method" value="delete" />
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</div>
<button type="submit">Submit</button>
</form>