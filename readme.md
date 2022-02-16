## ADPIA PUBLISHSER

### INSTALL
Để cài các dependences liên quan chạy lệnh  
 ```bash
composer install
```

Tiếp đó cần chú ý đến các môi trường được cấu hình trong file .env

```bash
APP_NAME="ADPIA PUBLISHSER"
APP_ENV=local
APP_KEY=base64:61zsydGIu3h5Css++**********/ZASW3inE=
APP_DEBUG=true
APP_URL=http://pub.adpia.local
ENCODE_URL=https://pub.adpia.vn/api/encode/
VALIDATE_URL=https://pub.adpia.vn/api/validate
```
Trong đó:
- `APP_ENV` là thiết lập môi trường ứng dụng, có 4 giá trị và chú thích tương ứng như sau:
    - `local` môi trường location dành cho developer.
    - `dev` môi trường dành cho chế độ development (prepare to production).
    - `production` môi trường production
    - `test` môi trường dùng cho chế độ testing.
- `APP_DEBUG` thiết lập xem có bật debug
- `APP_URL` thiết lập base url của app.
### Maintaince
Để chuyển hệ thống về chế độ bảo trì thực hiện lệnh sau:
```bash
php artisan down
```
hoặc kèm với nội dung bảo trì
```bash
php artisan down --message="Upgrading Database" --retry=60
```
hoặc cấm hoặc cho phép ip truy cập
```bash
php artisan down --allow=127.0.0.1 --allow=192.168.0.0/16
```
### Configuration
Để xóa hết cache
```bash
php artisan cache:clear
```
Để xóa hết config cache
```bash
php artisan config:clear
```
