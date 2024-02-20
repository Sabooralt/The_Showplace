<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rows_table;

class rowsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = new rows_table();
        $rows->row_number = 'A';
        $rows->seats_count = '18';
        $rows->layout = 'A-B-C-D';
        $rows->save();
    
        $rows = new rows_table();
        $rows->row_number = 'B';
        $rows->seats_count = '22';
        $rows->layout = 'A-B-C-D';
        
        $rows->save();

        $rows = new rows_table();
        $rows->row_number = 'C';
        $rows->seats_count = '18';
        $rows->layout = 'A-B-C-D';
        $rows->save();
        
        $rows = new rows_table();
        $rows->row_number = 'D';
        $rows->seats_count = '18';
        $rows->layout = 'A-B-C-D';
        $rows->save();
        
        $rows = new rows_table();
        $rows->row_number = 'E';
        $rows->seats_count = '18';
        
        $rows->layout = 'E-F-G';
        $rows->save();
        
        $rows = new rows_table();
        $rows->row_number = 'F';
        $rows->seats_count = '18';
        $rows->layout = 'E-F-G';
        
        $rows->save();
        
        $rows = new rows_table();
        $rows->row_number = 'G';
        $rows->seats_count = '22';
        $rows->layout = 'E-F-G';
        $rows->save();
    
      
    }
}
