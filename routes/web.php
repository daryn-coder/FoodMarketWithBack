<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[FoodController::class,'food'] )->name('food');

Route::get('/message',function(){
    return view('message');
})->name('message');

Route::post('/',[OrderController::class,'store'])->name('add-post');
Route::post('/send',[EmailController::class,'send']);
Route::get('/send',[EmailController::class,'view']);


Route::get('/{lang}', function($lang) {
    App::setlocale($lang);
    return FoodController::food();
});

Route::get('message/{lang}', function($lang) {
    App::setlocale($lang);
    return view('message');
})->name('message/{lang}');


Route::get('/create', function () {
    DB::table("menu")->insert([
        'name'=>"Meat",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"Fast-Food",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"FishAndSeafood",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"DairyFoods",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"Fruits",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"Salad",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"Drinks",
        
    ]);
    DB::table("menu")->insert([
        'name'=>"Pizza",
        
    ]);
});

Route::get('/food/create', function () {
    DB::table("foods")->insert([
        'name'=>"BigBurger",
        'price'=>"1000 tg",
        'nameId'=>"o1",
        'priceId'=>"w1",
        'menuId'=> 2 ,
        'url'=>"https://s3.eu-west-3.amazonaws.com/budapestfotoawards/uploads/97472/93-15809-19/medium/b4f391e9a6cd9014b2545002ff3e635c.jpg"
    ]);
    DB::table("foods")->insert([
        'name'=>"CheeseBurger",
        'price'=>"600tg",
        'url'=>"data:image/jpeg;base64,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",
        'menuId'=>2,
        'nameId'=>"o2",
        'priceId'=>"w2"
    ]);
    DB::table("foods")->insert([
        'name'=>"Beef Burgers",
        'price'=>"500tg",
        'url'=>"https://i.pinimg.com/736x/83/b4/cd/83b4cdf74cb98c50473b02e32b6277d5.jpg",
        'menuId'=>2,
        'nameId'=>"o3",
        'priceId'=>"w4"
    ]);
    DB::table("foods")->insert([
        'name'=>"Doner",
        'price'=>"700 tg",
        'url'=>"https://image.freepik.com/free-photo/doner-kebab-or-shawarma-sandwich-on-black-slate-surface-copy-space_123827-5026.jpg",
        'menuId'=>2,
        'nameId'=>"o4",
        'priceId'=>"w4"
    ]);
    DB::table("foods")->insert([
        'name'=>"Apples",
        'price'=>"150tg",
        'url'=>"https://jslim.ru/wp-content/uploads/2015/09/apples_1.jpg",
        'menuId'=>5,
        'nameId'=>"o5",
        'priceId'=>"w5"
    ]);
    DB::table("foods")->insert([
        'name'=>"Oranges",
        'price'=>"180tg",
        'url'=>"https://i.ndtvimg.com/i/2016-08/orange_625x350_51471855916.jpg",
        'menuId'=>5,
        'nameId'=>"o6",
        'priceId'=>"w6"
    ]);
    DB::table("foods")->insert([
        'name'=>"Bananas",
        'price'=>"700tg",
        'url'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRoj1R45b9cm3LDSFXoI2OJY1Ekb_eRTrk81w&usqp=CAU",
        'menuId'=>5,
        'nameId'=>"o7",
        'priceId'=>"w7"
    ]);
    DB::table("foods")->insert([
        'name'=>"Cherries",
        'price'=>"500tg",
        'url'=>"https://www.gardenoflife.com/content/wp-content/uploads/2016/08/bowl-of-cherries_-copy.jpg",
        'menuId'=>5,
        'nameId'=>"o8",
        'priceId'=>"w8"
    ]);
    DB::table("foods")->insert([
        'name'=>"Ananas",
        'price'=>"180tg",
        'url'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWaarqJ-IJYEJpQse3TOm8q6dvdSCnOmQ1BA&usqp=CAU",
        'menuId'=>5,
        'nameId'=>"o9",
        'priceId'=>"w9"
    ]);
    DB::table("foods")->insert([
        'name'=>"Apricots",
        'price'=>"200tg",
        'url'=>"https://i0.wp.com/post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/03/GettyImages-155145025_hero-1024x575.jpg?w=1155&h=1528",
        'menuId'=>5,
        'nameId'=>"o10",
        'priceId'=>"w10"
    ]);
    
    DB::table("foods")->insert([
        'name'=>"Coca-Cola 1 l",
        'price'=>"350tg",
        'url'=>"https://d2j6dbq0eux0bg.cloudfront.net/images/7841010/476630258.jpg",
        'menuId'=>7,
        'nameId'=>"o11",
        'priceId'=>"w11"
    ]);
    DB::table("foods")->insert([
        'name'=>"Coca-Cola 1,5 l",
        'price'=>"500tg",
        'url'=>"https://s.alicdn.com/@sc01/kf/U50d2ab1e86884e4f946d0b5565177bf0S.jpg_300x300.jpg",
        'menuId'=>7,
        'nameId'=>"o12",
        'priceId'=>"w12"
    ]);
    DB::table("foods")->insert([
        'name'=>"Piko 1 l",
        'price'=>"700tg",
        'url'=>"https://7eda.kz/wp-content/uploads/2019/12/1ce67f61eb5611e98d6038baf8f30fd8_6d47b9edfe7711e999ef38baf8f30fd8-1.png",
        'menuId'=>7,
        'nameId'=>"o13",
        'priceId'=>"w13"
    ]);
    DB::table("foods")->insert([
        'name'=>"Sprite 1 l",
        'price'=>"350tg",
        'url'=>"https://am-am.od.ua/12-large_default/napitok-gazirovannyj-sprite-1-l.jpg",
        'menuId'=>7,
        'nameId'=>"o14",
        'priceId'=>"w14"
    ]);
    DB::table("foods")->insert([
        'name'=>"Sprite 1.5 l",
        'price'=>"500tg",
        'url'=>"https://images.kz.prom.st/131487452_w440_h440_sprite-15l.jpg",
        'menuId'=>7,
        'nameId'=>"o15",
        'priceId'=>"w15"
    ]);
    DB::table("foods")->insert([
        'name'=>"Gorilla",
        'price'=>"350tg",
        'url'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTfxWgMAkhRhp5Bt4mtKc1Ih9VFEcLmr3aCxg&usqp=CAU",
        'menuId'=>7,
        'nameId'=>"o16",
        'priceId'=>"w16"
    ]);
    DB::table("foods")->insert([
        'name'=>"Filet Mignon",
        'price'=>"1000tg",
        'url'=>"data:image/jpeg;base64,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",
        'menuId'=>1,
        'nameId'=>"o17",
        'priceId'=>"w17"
    ]);
    DB::table("foods")->insert([
        'name'=>"Rib Eye",
        'price'=>"600tg",
        'url'=>"https://previews.123rf.com/images/andreyst/andreyst1811/andreyst181100563/112007672-grilled-rib-eye-steak-with-sauce.jpg",
        'menuId'=>1,
        'nameId'=>"o18",
        'priceId'=>"w18"
    ]);
    DB::table("foods")->insert([
        'name'=>"New York Strip",
        'price'=>"500tg",
        'url'=>"https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.cookinglight.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_-_1200x900%2Fpublic%2Fimage%2F2017%2F09%2Fmain%2Fgarlicky-new-york-strip-steak-1711p116.jpg%3Fitok%3Dbru5uIDh",
        'menuId'=>1,
        'nameId'=>"o19",
        'priceId'=>"w19"
    ]);
    DB::table("foods")->insert([
        'name'=>"Flank",
        'price'=>"700tg",
        'url'=>"https://grandkulinar.ru/uploads/posts/2019-04/1554277516_prostoj-flank-stejk-v-duhovke-s-maslom-s-zelenyu.jpg",
        'menuId'=>1,
        'nameId'=>"o20",
        'priceId'=>"w20"
    ]);
    DB::table("foods")->insert([
        'name'=>"Snails",
        'price'=>"350tg",
        'url'=>"https://img.freepik.com/free-photo/escargot-snails-cooked-with-garlic-butter-plate_164235-19.jpg?size=626&ext=jpg",
        'menuId'=>3,
        'nameId'=>"o21",
        'priceId'=>"w21"
    ]);
    DB::table("foods")->insert([
        'name'=>"Cuttlefish",
        'price'=>"500tg",
        'url'=>"https://sifu.unileversolutions.com/image/en-LK/recipe-topvisual/2/1260-709/salt-n-pepper-cuttlefish-50420360.jpg",
        'menuId'=>3,
        'nameId'=>"o22",
        'priceId'=>"w22"
    ]);
    DB::table("foods")->insert([
        'name'=>"Mussels",
        'price'=>"700tg",
        'url'=>"https://food.fnr.sndimg.com/content/dam/images/food/fullset/2011/5/4/2/FNM_060111-WN-Dinners-023_s4x3.jpg.rend.hgtvcom.826.620.suffix/1371597603967.jpeg",
        'menuId'=>3,
        'nameId'=>"o23",
        'priceId'=>"w23"
    ]);
    DB::table("foods")->insert([
        'name'=>"Clams",
        'price'=>"350tg",
        'url'=>"https://rasamalaysia.com/wp-content/uploads/2009/10/curry-clams-thumb.jpg",
        'menuId'=>3,
        'nameId'=>"o24",
        'priceId'=>"w24"
    ]);
    DB::table("foods")->insert([
        'name'=>"Oysters",
        'price'=>"500tg",
        'url'=>"https://www.thespruceeats.com/thmb/RwQxlm51YbhDDNc2205MZi2PBSo=/2000x1332/filters:fill(auto,1)/easy-butter-and-herb-baked-oysters-4049551-hero-01-11bfc0f1661f4045a19d7749aa6b34f2.jpg",
        'menuId'=>3,
        'nameId'=>"o25",
        'priceId'=>"w25"
    ]);
    DB::table("foods")->insert([
        'name'=>"Scallops",
        'price'=>"350tg",
        'url'=>"https://gbc-cdn-public-media.azureedge.net/img73219.768x512.jpg",
        'menuId'=>3,
        'nameId'=>"o26",
        'priceId'=>"w26"
    ]);
    DB::table("foods")->insert([
        'name'=>"Frozen Yogrut",
        'price'=>"1000tg",
        'url'=>"https://sweetsimplevegan.com/wp-content/uploads/2019/08/5-Minute-Strawberry-Frozen-Yogurt-Vegan-No-Machine-Sweet-Simple-Vegan-Featured-Image.jpg",
        'menuId'=>4,
        'nameId'=>"o27",
        'priceId'=>"w27"
    ]);
    DB::table("foods")->insert([
        'name'=>"Ice-milk",
        'price'=>"600tg",
        'url'=>"https://www.seriouseats.com/2018/08/20180807-ice-milk-vicky-wasik-13.jpg",
        'menuId'=>4,
        'nameId'=>"o28",
        'priceId'=>"w28"
    ]);
    DB::table("foods")->insert([
        'name'=>"Lassi",
        'price'=>"500tg",
        'url'=>"https://veenaazmanov.com/wp-content/uploads/2012/08/Mango-Lassi-Recipe.jpg",
        'menuId'=>4,
        'nameId'=>"o29",
        'priceId'=>"w29"
    ]);
    DB::table("foods")->insert([
        'name'=>"Puddings",
        'price'=>"700tg",
        'url'=>"https://smartafro.com/images/category/pudding.jpg",
        'menuId'=>4,
        'nameId'=>"o30",
        'priceId'=>"w30"
    ]);
    DB::table("foods")->insert([
        'name'=>"Sherbet",
        'price'=>"700tg",
        'url'=>"https://images.food52.com/UjV5hNOs8IY0tNoLvTgSLdzn99o=/2016x1344/dccf1f67-742e-4311-baaf-b831b05a7f85--2019-0531_orange-sherbet-recipe_3x2_rocky-luten_018.jpg",
        'menuId'=>4,
        'nameId'=>"o31",
        'priceId'=>"w31"
    ]);
    DB::table("foods")->insert([
        'name'=>"Green Salad",
        'price'=>"1000tg",
        'url'=>"https://tandoori.md/wp-content/uploads/2018/07/IndianGreen.jpg",
        'menuId'=>6,
        'nameId'=>"o32",
        'priceId'=>"w32"
    ]);
    DB::table("foods")->insert([
        'name'=>"Fruit Salad",
        'price'=>"600tg",
        'url'=>"https://i2.wp.com/carolinescooking.com/wp-content/uploads/2020/05/tropical-fruit-salad-photo-1024x768.jpg",
        'menuId'=>6,
        'nameId'=>"o33",
        'priceId'=>"w33"
    ]);
    DB::table("foods")->insert([
        'name'=>"Rice and Pasta Salad",
        'price'=>"500tg",
        'url'=>"https://kfoods.com/images1/newrecipeicon/rice-and-pasta-salad_14746.jpg",
        'menuId'=>6,
        'nameId'=>"o34",
        'priceId'=>"w34"
    ]);
    DB::table("foods")->insert([
        'name'=>"Bound Salad",
        'price'=>"700tg",
        'url'=>"https://i.pinimg.com/originals/24/93/a7/2493a7b6c807d4f8d9838d94fd31f39f.jpg",
        'menuId'=>6,
        'nameId'=>"o35",
        'priceId'=>"w35"
    ]);
    DB::table("foods")->insert([
        'name'=>"Dessert",
        'price'=>"700tg",
        'url'=>"https://irepo.primecp.com/1007/58/189805/5-Minute-Watergate-Salad_Medium_ID-703478.jpg?v=703478",
        'menuId'=>6,
        'nameId'=>"o36",
        'priceId'=>"w36"
    ]);
    DB::table("foods")->insert([
        'name'=>"Pepperoni",
        'price'=>"1000tg",
        'url'=>"https://eda.ru/img/eda/c620x415i/s2.eda.ru/StaticContent/Photos/120131085053/171027192707/p_O.jpg",
        'menuId'=>8,
        'nameId'=>"o37",
        'priceId'=>"w37"
    ]);
    DB::table("foods")->insert([
        'name'=>"Margherita",
        'price'=>"600tg",
        'url'=>"https://image.freepik.com/free-photo/large-margherita-pizza-on-wooden-chopping-board_23-2147926084.jpg",
        'menuId'=>8,
        'nameId'=>"o38",
        'priceId'=>"w38"
    ]);
    DB::table("foods")->insert([
        'name'=>"BBQ Chicken",
        'price'=>"500tg",
        'url'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRkHT9noAmoiJFLcxuueMOUsrmC18q_Y0WIDg&usqp=CAU",
        'menuId'=>8,
        'nameId'=>"o39",
        'priceId'=>"w39"
    ]);
    DB::table("foods")->insert([
        'name'=>"Meat",
        'price'=>"700tg",
        'url'=>"https://www.thespruceeats.com/thmb/qsBF9PplmRf_yARX4w6A2HdhCDw=/2665x1999/smart/filters:no_upscale()/aqIMG_4568fhor-0b89dc5c8c494ee9828ed29805791c5a.jpg",
        'menuId'=>8,
        'nameId'=>"o40",
        'priceId'=>"w40"
    ]);
});
