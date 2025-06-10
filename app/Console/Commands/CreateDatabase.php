<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';
    protected $description = 'Create a new database';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Đổi database name tạm thời về null để tránh lỗi khi kết nối
        Config::set('database.connections.mysql.database', null);

        // Gửi câu lệnh tạo database
        DB::statement("CREATE DATABASE IF NOT EXISTS `$name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        $this->info("Đã tạo database: `$name`");
    }
}
