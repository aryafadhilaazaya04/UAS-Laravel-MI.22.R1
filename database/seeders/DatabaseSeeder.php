<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arya Fadhila Azaya',
            'email' => 'aryafadhila@gmail.com',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Arya Azaya',
            'email' => 'aryaazaya@gmail.com',
            'password' => bcrypt('123')
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'category_id' => 1,
            'user_id' => 1,
            'author' => 'Arya Fadhila Azaya',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet pertama.',
            'body' => '<p>Lorem ipsum dolor sit amet pertama consectetur adipisicing elit. Harum, odit perferendis iure quisquam delectus ipsa autem esse libero suscipit molestiae molestias aut tempore iste qui ducimus laborum quidem itaque fugit reiciendis dicta dolores illo. Saepe sunt error repellat quam iusto ducimus recusandae ex unde! Quisquam quia nesciunt pariatur in iure ad dicta quaerat eligendi sed, aspernatur excepturi, dolor autem cupiditate.</p><p>Placeat dolore laboriosam voluptatum quisquam, minima, veniam odit, maiores blanditiis libero deleniti a amet commodi ipsum ab reprehenderit est impedit. Enim perferendis voluptatibus eum eos omnis dolore sed tenetur placeat illum praesentium distinctio deleniti voluptate dicta explicabo ab corrupti ullam quas magnam, blanditiis atque minima totam. Inventore quae quasi doloribus, sed itaque et veniam, officia ut eius repellat hic doloremque suscipit porro laboriosam odio nisi voluptas odit quam cum dignissimos. Enim, dolore totam? Rem aliquam non deserunt fugit, sapiente ratione iste deleniti quidem modi consequatur. Sit eligendi cupiditate voluptatibus molestias?</p>'
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'category_id' => 1,
            'user_id' => 1,
            'author' => 'Arya Fadhila Azaya',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet kedua.',
            'body' => '<p>Lorem ipsum dolor sit amet kedua consectetur adipisicing elit. Harum, odit perferendis iure quisquam delectus ipsa autem esse libero suscipit molestiae molestias aut tempore iste qui ducimus laborum quidem itaque fugit reiciendis dicta dolores illo. Saepe sunt error repellat quam iusto ducimus recusandae ex unde! Quisquam quia nesciunt pariatur in iure ad dicta quaerat eligendi sed, aspernatur excepturi, dolor autem cupiditate.</p><p>Placeat dolore laboriosam voluptatum quisquam, minima, veniam odit, maiores blanditiis libero deleniti a amet commodi ipsum ab reprehenderit est impedit. Enim perferendis voluptatibus eum eos omnis dolore sed tenetur placeat illum praesentium distinctio deleniti voluptate dicta explicabo ab corrupti ullam quas magnam, blanditiis atque minima totam. Inventore quae quasi doloribus, sed itaque et veniam, officia ut eius repellat hic doloremque suscipit porro laboriosam odio nisi voluptas odit quam cum dignissimos. Enim, dolore totam? Rem aliquam non deserunt fugit, sapiente ratione iste deleniti quidem modi consequatur. Sit eligendi cupiditate voluptatibus molestias?</p>'
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'category_id' => 2,
            'user_id' => 2,
            'author' => 'Arya Fadhila Azaya',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet ketiga.',
            'body' => '<p>Lorem ipsum dolor sit amet ketiga consectetur adipisicing elit. Harum, odit perferendis iure quisquam delectus ipsa autem esse libero suscipit molestiae molestias aut tempore iste qui ducimus laborum quidem itaque fugit reiciendis dicta dolores illo. Saepe sunt error repellat quam iusto ducimus recusandae ex unde! Quisquam quia nesciunt pariatur in iure ad dicta quaerat eligendi sed, aspernatur excepturi, dolor autem cupiditate.</p><p>Placeat dolore laboriosam voluptatum quisquam, minima, veniam odit, maiores blanditiis libero deleniti a amet commodi ipsum ab reprehenderit est impedit. Enim perferendis voluptatibus eum eos omnis dolore sed tenetur placeat illum praesentium distinctio deleniti voluptate dicta explicabo ab corrupti ullam quas magnam, blanditiis atque minima totam. Inventore quae quasi doloribus, sed itaque et veniam, officia ut eius repellat hic doloremque suscipit porro laboriosam odio nisi voluptas odit quam cum dignissimos. Enim, dolore totam? Rem aliquam non deserunt fugit, sapiente ratione iste deleniti quidem modi consequatur. Sit eligendi cupiditate voluptatibus molestias?</p>'
        ]);

        Post::create([
            'title' => 'Judul Keempat',
            'category_id' => 2,
            'user_id' => 2,
            'author' => 'Arya Fadhila Azaya',
            'slug' => 'judul-keempat',
            'excerpt' => 'Lorem ipsum dolor sit amet keempat.',
            'body' => '<p>Lorem ipsum dolor sit amet keempat consectetur adipisicing elit. Harum, odit perferendis iure quisquam delectus ipsa autem esse libero suscipit molestiae molestias aut tempore iste qui ducimus laborum quidem itaque fugit reiciendis dicta dolores illo. Saepe sunt error repellat quam iusto ducimus recusandae ex unde! Quisquam quia nesciunt pariatur in iure ad dicta quaerat eligendi sed, aspernatur excepturi, dolor autem cupiditate.</p><p>Placeat dolore laboriosam voluptatum quisquam, minima, veniam odit, maiores blanditiis libero deleniti a amet commodi ipsum ab reprehenderit est impedit. Enim perferendis voluptatibus eum eos omnis dolore sed tenetur placeat illum praesentium distinctio deleniti voluptate dicta explicabo ab corrupti ullam quas magnam, blanditiis atque minima totam. Inventore quae quasi doloribus, sed itaque et veniam, officia ut eius repellat hic doloremque suscipit porro laboriosam odio nisi voluptas odit quam cum dignissimos. Enim, dolore totam? Rem aliquam non deserunt fugit, sapiente ratione iste deleniti quidem modi consequatur. Sit eligendi cupiditate voluptatibus molestias?</p>'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
    }
}
