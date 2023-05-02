<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminPermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(AlgeriaBusinessNetworkTableSeeder::class);
        $this->call(DiscoverAlgeriaTableSeeder::class); 
        $this->call(TestimonialTableSeeder::class);
        $this->call(BannerTableSeeder::class); 
        $this->call(CMSPageTableSeeder::class);
        $this->call(PaymentConfigurationTableSeeder::class);
        $this->call(AssistanceServicesTableSeeder::class);
    }
}
