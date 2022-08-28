<div class="wrap">
    <h1>Import</h1>
    <p>Import phone numbers from xlsx file and append to already existing collection of number.</p>

    <form method="post" enctype="multipart/form-data">

        <fieldset style="margin-bottom: 30px;">
            <legend class="screen-reader-text">
                <span>Pick import method:</span>
            </legend>

            <div>
                <label>
                    <input type="radio" checked="checked" value="append" name="import_method"> Append - Appends new numbers to existing ones
                </label>
            </div>

            <div>
                <label>
                    <input type="radio" value="rewrite" name="import_method"> Rewrite - Removes existing numbers and replaces with new ones
                </label>
            </div>
        </fieldset>

        <div style="margin-bottom: 30px;">
            <input type="file" name="upload">
        </div>

        <input class="button-primary" type="submit" value="Upload File">
    </form>
</div>