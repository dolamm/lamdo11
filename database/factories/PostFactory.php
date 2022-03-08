/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Post;
use Faker\Generator as Faker;
$factory->define(Post::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence,
       'body' => \Str::slug($faker->sentence),
       'user_id' => 1
    ];
});