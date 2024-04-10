# 
use Illuminate\Support\Facades\Schema;

public function boot()
{
    // Fix for MySQL < 5.7.7 and MariaDB < 10.2.2
    Schema::defaultStringLength(191); //Update defaultStringLength
}
