<?php

use Illuminate\Database\Seeder;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            $product =  new \App\Product([
                'img'=>'https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg',
                'title'=>'Hurry',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, possimus, dolorem? Atque esse iure debitis. Nobis ipsa vero quia omnis, possimus fugiat totam consequuntur consequatur illo at autem ipsam, ad.',
                'price'=>12
            ]);
            $product->save();
        }        
    }
}
