use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->timestamp('borrowed_at')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();

            $table->primary(['user_id', 'book_id']); // composite primary key
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};
