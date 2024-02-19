<style>
    hr.wp-header-end { margin-bottom: 20px; }
    .executed-migrations, .pending-migrations { margin-bottom: 20px; }
    .executed-migrations td, .pending-migrations td { vertical-align: middle; }
</style>

<script>
    function migrateAll() {
        if (confirm("Are you sure you want to run all pending migrations?")) {
            let query = new URLSearchParams(window.location.search);
            query.set("action", "migrate");

            if(query.get("target") !== null)
                query.delete("target");

            window.location.search = query.toString();
        }
    }

    function revertAll() {
        if (confirm("Are you sure you want to revert all executed migrations?")) {
            let query = new URLSearchParams(window.location.search);
            query.set("action", "revert");
            
            if(query.get("target") !== null)
                query.delete("target");

            window.location.search = query.toString();
        }
    }

    function runMigration(version) {
        if (confirm("Are you sure you want to run this migration?")) {
            let query = new URLSearchParams(window.location.search);
            query.set("action", "migrate");
            query.set("target", version);
            window.location.search = query.toString();
        }
    }

    function revertMigration(version) {
        if (confirm("Are you sure you want to revert this migration?")) {
            let query = new URLSearchParams(window.location.search);
            query.set("action", "revert");
            query.set("target", version);
            window.location.search = query.toString();
        }
    }
</script>

<div class="wrap">
    <h1 class="wp-heading-inline">Database Migrations</h1>

    <hr class="wp-header-end">

    <?php do_action("admin_notices"); ?>

    <h2>Executed Migrations</h2>
    <table class="wp-list-table widefat fixed striped table-view-list executed-migrations">
        <thead>
            <tr>
                <th style="width:10%;">ID</th>
                <th>Version</th>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($executed as $i => $migration): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $migration->version; ?></td>
                    <td><?php echo $migration->migration_name; ?></td>
                    <td><?php echo $migration->start_time; ?></td>
                    <td><?php echo $migration->end_time; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="button button-primary" onclick="revertAll();">Revert latest migration</button>

    <div style="margin-bottom:75px;"></div>

    <h2>Pending Migrations</h2>
    <table class="wp-list-table widefat fixed striped table-view-list pending-migrations">
        <thead>
            <tr>
                <th style="width:10%;">ID</th>
                <th>Version</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pending as $i => $migration): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $migration['version']; ?></td>
                    <td><?php echo $migration['migration_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="button button-primary" onclick="migrateAll();">Run all pending migrations</button>

    <div style="margin-bottom:75px;"></div>
    
    <h2>Create a new Migration</h2>
    <form action="" method="get">
        <input type="hidden" name="page" value="database-migrations">
        <input type="hidden" name="action" value="create">
        <div">
            <label for="target">Migration name (in CamelCase)</label>
            <input type="text" name="target" placeholder="ExampleMigration" required style="width:100%;max-width:400px;display:block;margin-bottom:.5rem;">
            <button type="submit" class="button button-primary">Create migration</button>
        </div>
    </form>
</div>