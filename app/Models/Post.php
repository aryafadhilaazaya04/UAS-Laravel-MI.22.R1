<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'author',
    //     'excerpt',
    //     'body'
    // ];

    protected $guarded = [
        'id',
        'updated_at'
    ];

    protected $with = ['category', 'user'];

    // App\Models\Post::create([
    //     'title' => 'Judul Pertama',
    //     'category_id' => 1,
    //     'author' => 'Arya Fadhila Azaya',
    //     'slug' => 'judul-pertama',
    //     'excerpt' => 'Lorem ipsum dolor sit amet pertama.',
    //     'body' => '<p>Lorem ipsum dolor sit amet pertama consectetur adipisicing elit. Harum, odit perferendis iure quisquam delectus ipsa autem esse libero suscipit molestiae molestias aut tempore iste qui ducimus laborum quidem itaque fugit reiciendis dicta dolores illo. Saepe sunt error repellat quam iusto ducimus recusandae ex unde! Quisquam quia nesciunt pariatur in iure ad dicta quaerat eligendi sed, aspernatur excepturi, dolor autem cupiditate.</p><p>Placeat dolore laboriosam voluptatum quisquam, minima, veniam odit, maiores blanditiis libero deleniti a amet commodi ipsum ab reprehenderit est impedit. Enim perferendis voluptatibus eum eos omnis dolore sed tenetur placeat illum praesentium distinctio deleniti voluptate dicta explicabo ab corrupti ullam quas magnam, blanditiis atque minima totam. Inventore quae quasi doloribus, sed itaque et veniam, officia ut eius repellat hic doloremque suscipit porro laboriosam odio nisi voluptas odit quam cum dignissimos. Enim, dolore totam? Rem aliquam non deserunt fugit, sapiente ratione iste deleniti quidem modi consequatur. Sit eligendi cupiditate voluptatibus molestias?</p>'
    // ]);

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //           ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) use ($filters) {
            // Jika filter category atau user juga aktif, pencarian tetap dalam scope filter tersebut
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['user'] ?? false, fn($query, $user) => 
            $query->whereHas('user', fn($query) => 
                $query->where('username', $user)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
