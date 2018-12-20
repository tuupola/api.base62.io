<?php

namespace Deployer;

date_default_timezone_set("UTC");

require "recipe/common.php";

set("application", "api-base62-io");
set("repository", "git@github.com:tuupola/api.base62.io.git");
set("git_tty", true);
set("shared_files", [".env"]);
set("shared_dirs", ["logs"]);
set("writable_dirs", []);
set("default_stage", "production");
set("ssh_type", "native");
set("ssh_multiplexing", true);
set("allow_anonymous_stats", false);

$user_data = posix_getpwuid(posix_geteuid());

host("api")
    ->hostname("api.base62.io")
    ->stage("production")
    //->user("deployer")
    ->set("branch", "master")
    ->set("deploy_path", "/srv/www/api.base62.io");

desc("Run tests");
task("test", function () {
    runLocally("composer test");
});

desc("Deploy your project");
task("deploy", [
    "deploy:info",
    "deploy:prepare",
    "deploy:lock",
    "deploy:release",
    "deploy:update_code",
    "deploy:shared",
    "deploy:vendors",
    "deploy:writable",
    "deploy:clear_paths",
    "deploy:symlink",
    "deploy:unlock",
    "cleanup",
    "success",
]);

before("deploy", "test");
after("deploy:failed", "deploy:unlock");
