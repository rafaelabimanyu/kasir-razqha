public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('password');
        $table->enum('role', ['admin', 'kasir']);
        $table->timestamps();
    });
}