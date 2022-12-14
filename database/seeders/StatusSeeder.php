<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'pending', 'label' => 'قيد التنفيذ']);
        Status::create(['name' => 'paid', 'label' => 'مدفوع']);
        Status::create(['name' => 'processing', 'label' => 'قيد المعالجة']);
        Status::create(['name' => 'completed', 'label' => 'اكتمل']);
        Status::create(['name' => 'recived', 'label' => 'سلم']);
        Status::create(['name' => 'faild', 'label' => 'فشل']);
    }
}
