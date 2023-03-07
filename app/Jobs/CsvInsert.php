<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\insight_tables;

class CsvInsert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $importData_arr;
    protected $importColumns_arr;
    protected $fileNameForTable;
    protected $key;
    
    public function __construct($importData_arr, $importColumns_arr, $fileNameForTable, $key)
    {
    
        $this->importData_arr = $importData_arr;
        $this->importColumns_arr = $importColumns_arr;
        $this->fileNameForTable = $fileNameForTable;
        $this->key = $key;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // create Table of to MySQL database
        // if(DB::table($this->fileNameForTable)->get() == null) {
        if(!Schema::hasTable($this->fileNameForTable)){
            Schema::connection('web')->create($this->fileNameForTable, function($table)
            {
                $table->increments('id');
                $table->timestamps();
                foreach($this->importColumns_arr as $importColumns){
                    foreach($importColumns as $column){
                        $table->text(strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '_', $column))))->nullable();
                    }
                }
            });
            }
            
        $insight_tables = new insight_tables;
        $insight_tables->table_name = $this->fileNameForTable;
        $insight_tables->table_key = $this->key;
        $insight_tables->save();

            
            // Insert to MySQL database
            // if(empty(DB::table($this->fileNameForTable)->count())){
                foreach($this->importData_arr as $importData){
                    foreach ($this->importColumns_arr as  $columns) {
                        $result = [];
                        foreach ($importData as $x=> $value){
                            foreach ($columns as $y=>$column){
                                if($x == $y){
                                    $result+=[$column => $value];
                                } 
                            }
                        }
                        DB::connection('web')->table($this->fileNameForTable)->insert([
                            $result
                        ]);
                    }
                }
            // }
        
    }
}
