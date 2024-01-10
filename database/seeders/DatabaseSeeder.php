<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Role;
use App\Models\User;
use App\Models\Setting;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Traits\AdminHelperTrait;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    use AdminHelperTrait;
    public function run()
    {
        $currencies = [
            [
                'name' => ["ar" => "ريال", "en" => "SAR"],
                'code' => 'SAR',
                'order_id' => 1,
                'active' => 1,
            ],
        ];

        foreach ($currencies as $key => $value) {
            Currency::create($value);
        }
        $countries = [
            [
                'name' => ["ar" => "السعودية", "en" => "Saudi"],
                'code' => 'SA',
                'image' => '/uploads/flags/sa.png',
                'phone_code' => '966',
                'currency_id' => 1,
                'currency_type' => 2,
                'order_id' => 1,
                'active' => 1,
            ],
        ];

        foreach ($countries as $key => $value) {
            Country::create($value);
        }

        $cities = [
            [
                'name' => ["ar" => "الرياض", "en" => "Riyadh"],
                'country_id' => 1,
                'order_id' => 1,
                'active' => 1,
            ],
        ];

        foreach ($cities as $key => $value) {
            City::create($value);
        }


        $this->addModelsCrud($this->admin_models);
        $this->addModelsNotCrud();

        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Admin',
            ],
            [
                'name' => 'manger',
                'display_name' => 'Manger',
                'description' => 'Manger',
            ],
            [
                'name' => 'account_admin',
                'display_name' => 'Account Admin',
                'description' => 'Account Admin',
            ],
            [
                'name' => 'office_admin',
                'display_name' => 'Office Admin',
                'description' => 'Office Admin',
            ],
            [
                'name' => 'account_manger',
                'display_name' => 'Account Manger',
                'description' => 'Account Manger',
            ],
            [
                'name' => 'office_manger',
                'display_name' => 'Office Manger',
                'description' => 'Office Manger',
            ],
            [
                'name' => 'account',
                'display_name' => 'Account',
                'description' => 'Account',
            ],
            [
                'name' => 'office',
                'display_name' => 'Office',
                'description' => 'Office',
            ],
        ];


        foreach ($roles as $key => $value) {

            $role = Role::create($value);
            if ($role['id'] == 1) {
                $permissions = Permission::pluck('id', 'id')->toArray();
                $role->permissions()->sync($permissions);
            }
        }

        $users = [
            [
                'name_first' => 'mohamed',
                'name_last' => 'elsherbiny',
                'name' => 'mohamedelsherbiny',
                'username' => 'mohamedelsherbiny',
                'phone' => '01029936932',
                'email' => 'mohamed.elsherbiny@systemira.com',
                'password' => Hash::make('moh13689'),
                'sms_code' => '130689',
                'sms_code_expire' => '2030-01-01 00:00:00',
                'type' => 'super_admin',
                'locale' => 'en',
                'country_id' => 1,
                'vip' => 1,
                'active' => 1,
                'is_admin' => 1,
                'is_client' => 1,
            ],
        ];

        foreach ($users as $key => $value) {

            $user = User::create($value);
            $user->attachRole($user['id']);
        }

        $settings = [
            [
                'type' => 'site_open',
                'key' => 'site_open',
                'value' => 'yes',
                'group' => 'setting',
            ],
            [
                'type' => 'site_title',
                'key' => 'site_title',
                'value' => 'Systemira',
                'group' => 'setting',
            ],
            [
                'type' => 'site_url',
                'key' => 'site_url',
                'value' => 'http://127.0.0.1:8000',
                'group' => 'setting',
            ],
            [
                'type' => 'website_url',
                'key' => 'website_url',
                'value' => 'http://127.0.0.1:8000',
                'group' => 'setting',
            ],
            [
                'type' => 'admin_url',
                'key' => 'admin_url',
                'value' => 'admin',
                'group' => 'setting',
            ],
            [
                'type' => 'admin_language',
                'key' => 'admin_language',
                'value' => 'ar',
                'group' => 'setting',
            ],
            [
                'type' => 'site_email',
                'key' => 'site_email',
                'value' => 'info@systemira.com',
                'group' => 'setting',
            ],
            [
                'type' => 'site_phone',
                'key' => 'site_phone',
                'value' => '01029936932',
                'group' => 'setting',
            ],
            [
                'type' => 'table_limit',
                'key' => 'table_limit',
                'value' => '100',
                'group' => 'setting',
            ],
            [
                'type' => 'ssl_certificate',
                'key' => 'ssl_certificate',
                'value' => 'no',
                'group' => 'setting',
            ],
            [
                'type' => 'logo_image',
                'key' => 'logo_image',
                'value' => '',
                'group' => 'setting',
            ],
            [
                'type' => 'facebook',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com',
                'group' => 'social',
                'autoload' => 1,
            ],
            [
                'type' => 'twitter',
                'key' => 'twitter',
                'value' => 'https://www.twitter.com',
                'group' => 'social',
                'autoload' => 1,
            ],
            [
                'type' => 'youtube',
                'key' => 'youtube',
                'value' => 'https://youtube.com',
                'group' => 'social',
                'autoload' => 1,
            ],
            [
                'type' => 'instagram',
                'key' => 'instagram',
                'value' => 'https://instagram.com',
                'group' => 'social',
                'autoload' => 1,
            ],
            [
                'type' => 'whatsapp',
                'key' => 'whatsapp',
                'value' => '01029936932',
                'group' => 'social',
                'autoload' => 1,
            ],
            [
                'type' => 'user_type_debug',
                'key' => 'user_type_debug',
                'value' => 'super_admin,admin',
                'group' => 'setting',
            ],
            [
                'type' => 'user_id_debug',
                'key' => 'user_id_debug',
                'value' => '1',
                'group' => 'setting',
            ],
            [
                'type' => 'app_debug',
                'key' => 'app_debug',
                'value' => 'yes',
                'group' => 'setting',
            ],
        ];

        foreach ($settings as $key => $value) {
            Setting::create($value);
        }
    }

    public function addModelsCrud($models)
    {
        foreach ($models as $model) {
            $permission_methods = [
                "{$model}.index" => "view",
                "{$model}.create,{$model}.store" => "create",
                "{$model}.edit,{$model}.update" => "edit",
                "{$model}.show" => "show",
                "{$model}.status" => "status",
                "{$model}.delete" => "delete",
            ];
            foreach ($permission_methods as  $name => $method) {
                Permission::Create([
                    'description' => $model,
                    'name' => $name,
                    'display_name' => $method,
                ]);
            }
        }
    }

    public function addModelsNotCrud()
    {
        $models = ["translations", "tables", "images", "settings"];
        foreach ($models as $model) {
            $permission_methods = ["{$model}.index" => "view"];
            foreach ($permission_methods as  $name => $method) {
                Permission::Create([
                    'description' => $model,
                    'name' => $name,
                    'display_name' => $method,
                ]);
            }
        }
        $models2 = ["dashboard", "statistics"];
        foreach ($models2 as $model2) {
            $permission_methods2 = [$model2 => "view"];
            foreach ($permission_methods2 as  $name => $method) {
                Permission::Create([
                    'description' => $model2,
                    'name' => $name,
                    'display_name' => $method,
                ]);
            }
        }
    }
}
