<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ElderSeeder::class,
            SupporterSeeder::class,
            ElderSupporterMatchSeeder::class,
            DonationSeeder::class,
            VisitLogSeeder::class,
            ReportSeeder::class,
            SettingSeeder::class,
            DonationAgreementSeeder::class,
            EventSeeder::class,
            FacilitySeeder::class,
            CateringSeeder::class,
            StaffSeeder::class,
            InvoiceSeeder::class,
            PhotoGallerySeeder::class,
        ]);
    }
}
