<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'الاقسام',
            'تعديل قسم',
            'حذف قسم',
            'اضافة قسم',

            'العملاء',
            'تعديل العميل',
            'حذف العميل',
//            'تقرير العملاء',

            'قائمة الرسائل',
            'اضافة رسالة',
            'تعديل رسالة',
            'حذف رسالة',

            'قائمة التبرع',
            'اضافة تبرع',
            'تعديل تبرع',
            'حذف تبرع',

            'المحافظات',
            'اضافة محافظة',
            'تعديل محافظة',
            'حذف محافظة',

            'المدن',
            'اضافة مدينة',
            'تعديل مدينة',
            'حذف مدينة',


            'المنشورات',
            'اضافة منشور',
            'تعديل منشور',
            'حذف منشور',


            'الاعدادات',
            'اضافة اعدادات',
            'تعديل اعدادات',
            'حذف اعدادات',




            'المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',




        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
