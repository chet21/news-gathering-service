<?php

use \System\DB;

class Migration extends BaseMigration
{
    private $files_phart = '/var/sql/migrate';
    private $pattern = '/.sql/';

    public function run()
    {
//        $tr = DB::connection()->beginTransaction();
        foreach ($this->get_sql() as $item){
            DB::connection()->query(include_once $this->files_phart.$item)->fetchAll();

        }
//        $tr->exec();
    }

    private function get_sql()
    {
        $files = scandir($this->files_phart);

        foreach ($files as $k => $item){
            if(!preg_match($this->pattern, $item)){
                unset($files[$k]);
            }
        }
        return $files;
    }

    public function full()
    {
        $sql = include_once __DIR__.'/../../var/sql/full.sql';
        DB::connection()->query($sql)->fetchAll();
    }
}