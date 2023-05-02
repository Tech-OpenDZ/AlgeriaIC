<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentConfiguration;

class PaymentConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configurations = [
            [
                'key' => 'press_review_key',
                'module_type' => 'press-review',
                'value_USD' => 500,
                'value_DZD' => 5000,
                'value_Euro' => 500,
            ],
            [
                'key' => 'VAT_value',
                'module_type' => 'common',
                'value_USD' => 0,
                'value_DZD' => 0,
                'value_Euro' => 0,
            ],
            [
                'key' => 'contact_file_start_price',
                'module_type' => 'contact-file',
                'value_USD' => 5000,
                'value_DZD' => 5000,
                'value_Euro' => 5000,
            ],
            [
                'key' => 'contact_file_emails',
                'module_type' => 'contact-file',
                'value_USD' => 30,
                'value_DZD' => 30,
                'value_Euro' => 30,
            ],
            [
                'key' => 'contact_file_phone_numbers',
                'module_type' => 'contact-file',
                'value_USD' => 30,
                'value_DZD' => 30,
                'value_Euro' => 30,
            ],
            [
                'key' => 'contact_file_job_titles',
                'module_type' => 'contact-file',
                'value_USD' => 30,
                'value_DZD' => 30,
                'value_Euro' => 30,
            ],
            [
                'key' => 'contact_file_employees',
                'module_type' => 'contact-file',
                'value_USD' => 20,
                'value_DZD' => 20,
                'value_Euro' => 20,
            ],
            [
                'key' => 'contact_file_capital',
                'module_type' => 'contact-file',
                'value_USD' => 20,
                'value_DZD' => 20,
                'value_Euro' => 20,
            ],
            [
                'key' => 'contact_file_turnover',
                'module_type' => 'contact-file',
                'value_USD' => 20,
                'value_DZD' => 20,
                'value_Euro' => 20,
            ]
        ];
        foreach ($configurations as $configuration) {
            PaymentConfiguration::create($configuration);
        }

    }
}
