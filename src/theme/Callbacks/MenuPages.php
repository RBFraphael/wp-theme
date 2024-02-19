<?php
namespace WpTheme\Callbacks;

use WpTheme\Core\PhinxWrapper;
use WpTheme\Core\Render;
use WpTheme\Database\Models\Migration;

class MenuPages
{
    static function DatabaseMigrations()
    {
        $actions = ["migrate", "revert", "create"];
        $action = $_GET["action"] ?? null;

        if(in_array($action, $actions)){
            $target = $_GET["target"] ?? null;

            if($action == "create"){
                $template = file_get_contents(WPTHEME_PATH."/src/theme/Database/Migrations/Migration.template");
                $content = str_replace("{{migration_name}}", $target, $template);

                $filename = preg_replace('/\B([A-Z])/', '_$1', $target);
                $filename = date("YmdHis")."_".str_replace(" ", "_", strtolower($filename)).".php";

                file_put_contents(WPTHEME_PATH."/src/theme/Database/Migrations/".$filename, $content);

                wp_admin_notice("Migration was created.", [
                    'type' => "success",
                ]);
            } else {
                $wrapper = new PhinxWrapper();
                $output = "";
                
                if($action == "migrate"){
                    $output = $wrapper->migrate(target: $target);
                } else if($action == "revert"){
                    $output = $wrapper->rollback(target: $target);
                }

                $error = $wrapper->getExitCode() > 0;

                if($error){
                    wp_admin_notice("An error was occurred during the execution of migration(s).", [
                        'type' => "error",
                    ]);
                } else {
                    wp_admin_notice("Migration process has completed successfully.", [
                        'type' => "success",
                    ]);
                }
            }
        }

        $executedMigrations = Migration::all();
        $pendingMigrations = scandir(WPTHEME_PATH."/src/theme/Database/Migrations");

        $pendingMigrations = array_filter( $pendingMigrations, function($file){
            return $file !== "." && $file !== ".." && $file !== "Migration.template";
        });
        $pendingMigrations = array_map(function($file){
            $file = str_replace(".php", "", $file);
            $fileData = explode("_", $file);

            $fileData = array_map(function($part){
                return ucwords($part);
            }, $fileData);
            $version = array_shift($fileData);
            $name = join("", $fileData);

            return [
                'version' => $version,
                'migration_name' => $name
            ];
        }, $pendingMigrations);

        $pendingMigrations = array_filter($pendingMigrations, function($migration) use($executedMigrations){
            $executed = $executedMigrations->contains(function($item) use($migration){
                return $item->migration_name == $migration['migration_name'];
            });
            return !$executed;
        });

        Render::AdminPage("database-migrations", [
            'executed' => $executedMigrations,
            'pending' => $pendingMigrations
        ]);
    }
}
