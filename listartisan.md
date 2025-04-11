php artisan storage:link --hiển thị ảnh
composer create-project laravel/laravel ten_du_an --tạo project
php artisan ser : Chạy dự án
php artisan migrate
php artisan make:migration ten_file_migration

php artisan migrate:rollback <=> Rollback lại thao tác cuối cùng của migration
php artisan migrate:rollback --step=5 <=> Rollback lại 5 lần trước đó
php artisan migrate:rollback --batch=5 <=> Rollback lại bước số 5
php artisan migrate:reset <=> Rollback lại tất cả thao tác của migration
php artisan migrate:refresh <=> Rollback lại tất cả thao tác của migration sau đó tự động chạy migrate
php artisan make:migration add_hinh_anh_to_products_table: --thêm trường vào bảng

php artisan make:seeder ten_file_seeder --tạo file seeder
php artisan db:seed <=> Chạy toàn bộ seeder
php artisan db:seed --class=UserSeeder <=> Chạy một class seeder
php artisan migrate:fresh --seed <=> Vừa reset, migrate và seeder

php artisan make:model TênModel --tạo model
php artisan make:factory PostFactory


php artisan make:controller TenController

php artisan make:controller Api/ProductController --api(vietapi)
php artisan route:list//câu lệnh kt xem cso bao nh route