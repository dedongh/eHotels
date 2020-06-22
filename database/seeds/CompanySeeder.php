<?php

use App\Model\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    protected $company = [
        [
            'key' => 'site_name',
            'value' => 'E-Hotels',
        ],
        [
            'key' => 'site_title',
            'value' => 'Affordable 5 star rooms designed for you',
        ],
        [
            'key' => 'default_email_address',
            'value' => 'admin@ehotels.com',
        ],
        [
            'key' => 'currency_code',
            'value' => 'GHS',
        ],
        [
            'key' => 'currency_symbol',
            'value' => '₵',
        ],
        [
            'key' => 'site_logo',
            'value' => '',
        ],
        [
            'key' => 'social_facebook',
            'value' => '',
        ],
        [
            'key' => 'social_twitter',
            'value' => '',
        ],
        [
            'key' => 'social_instagram',
            'value' => '',
        ],
        [
            'key' => 'social_linkedin',
            'value' => '',
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach ($this->company as $index => $info) {
            $result = Company::create($info);
            if (!$result) {
                $this->command->info("Insert failed at record $index");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->company). ' records');
    }
}
