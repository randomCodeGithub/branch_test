<div class="wrap">
    <h1>Import</h1>
    <h2>Import</h2>
    <p>Import xlsx from which country rates will be displayed.</p>

    <form method="post" enctype="multipart/form-data" style="margin-bottom: 60px;">

        <fieldset style="margin-bottom: 30px;">
            <legend>Import type</legend>
            <label>
                <input type="radio" value="calls_sms" name="import_type" checked> Calls / SMS
            </label>
            <br>
            <label>
                <input type="radio" value="network" name="import_type"> Network
            </label>
        </fieldset>

        <div style="margin-bottom: 30px;">
            <input type="file" name="upload">
        </div>

        <input class="button-primary" type="submit" value="Upload File">
    </form>

    <h2>Rebuild</h2>
    <p>After importing file(s), rebuild the database.</p>
    <form method="post">
        <input type="hidden" name="rebuild" value="1">
        <input class="button-primary" type="submit" value="Rebuild">
    </form>
</div>