<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/project.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnMj8Xc5_jA0tqVHCoFHCk-2sHt4imItA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <title>Delishes</title>
</head>
<body class="body" onload="load()">
    <div class="main">
        <div class="intro">
            <p id="top">{{__('lang.eat')}}</p>        
        </div>
        <div class="nav">
            <label for="toggle">&#9776;</label>
        </div>
        <input type="checkbox" name="toggle" id="toggle">
        <div class="lang">
            <a href="{{ url('/en')}}">ENG</a> /
            <a href="{{ url('/kz') }}">KZ</a>
        </div>
        <!-- Header -->
        <div class="header">
            <div class="div"><img id="logo" onclick="onClick()" src="https://seeklogo.com/images/W/whole-food-logo-5DB846762B-seeklogo.com.png" alt="logo"></div>
            <div class="div" onclick="logIn()">{{__('lang.payment')}}</div> 
            <div class="dropdown">
            {{__('lang.men')}}
                <div class="dropdown-content">

                    @foreach ($menu as $index) 
                        <a onclick="Menu(this)" href="#">{{$index->name}}</a>
                    @endforeach
                    
                </div>
            </div>
            
        </div>
        <!-- Main -->
        <div class="main">

            @foreach ($menu as $index) 
                <div id="{{$index->name}}" class="menubar">
                    <div class="menu-content">
                        @foreach($foods as $food)
                            @if($food->menuId==$index->id)
                                <div class="border">
                                    <img src="{{$food->url}}" alt="food">
                                    <div>
                                        <h5 id="{{$food->nameId}}">{{$food->name}}</h5>
                                        <p id="{{$food->priceId}}" class="price"><ins>{{$food->price}}</ins></p>
                                        <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#'+'{{$food->nameId}}').textContent,document.querySelector('#'+'{{$food->priceId}}').textContent)">{{__('lang.add')}}</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- <div id="fastfood" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://s3.eu-west-3.amazonaws.com/budapestfotoawards/uploads/97472/93-15809-19/medium/b4f391e9a6cd9014b2545002ff3e635c.jpg" alt="plant">
                        <div>
                            <h5 id="o1">BigBurger</h5>
                            <p id="w1" class="price"><ins>1000 tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o1').textContent,document.querySelector('#w1').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i8.amplience.net/i/traeger/20180811_Grilled-Triple-Cheeseburger_RE_HE?w=1200&sm=aspect&aspect=2:1&scaleFit=poi&$poi2$" alt="fruits">
                        <div>
                            <h5 id="o2">CheeseBurger</h5>
                            <p class="price"><ins id="w2">600tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o2').textContent,document.querySelector('#w2').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i.pinimg.com/736x/83/b4/cd/83b4cdf74cb98c50473b02e32b6277d5.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o3">Beef Burgers</h5>
                            <p class="price"><ins id="w3">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o3').textContent,document.querySelector('#w3').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://image.freepik.com/free-photo/doner-kebab-or-shawarma-sandwich-on-black-slate-surface-copy-space_123827-5026.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o4">Doner</h5>
                            <p class="price"><ins id="w4">700 tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o4').textContent,document.querySelector('#w4').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div id="fruit" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://jslim.ru/wp-content/uploads/2015/09/apples_1.jpg" alt="plant">
                        <div>
                            <h5 id="o5">Apples</h5>
                            <p class="price">1kg costs <ins id="w5">150tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o5').textContent,document.querySelector('#w5').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i.ndtvimg.com/i/2016-08/orange_625x350_51471855916.jpg" alt="fruits">
                        <div>
                            <h5 id="o6">Oranges</h5>
                            <p class="price">1kg costs <ins id="w6">180tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o6').textContent,document.querySelector('#w6').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRoj1R45b9cm3LDSFXoI2OJY1Ekb_eRTrk81w&usqp=CAU" alt="spoort ;)">
                        <div>
                            <h5 id="o7">Bananas</h5>
                            <p class="price">1kg costs <ins id="w7">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o7').textContent,document.querySelector('#w7').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://www.gardenoflife.com/content/wp-content/uploads/2016/08/bowl-of-cherries_-copy.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o8">Cherries</h5>
                            <p class="price">1kg costs <ins id="w8">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o8').textContent,document.querySelector('#w8').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWaarqJ-IJYEJpQse3TOm8q6dvdSCnOmQ1BA&usqp=CAU" alt="spoort ;)">
                        <div>
                            <h5 id="o9">Ananas</h5>
                            <p class="price">1kg costs <ins id="w9">180tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o9').textContent,document.querySelector('#w9').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i0.wp.com/post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/03/GettyImages-155145025_hero-1024x575.jpg?w=1155&h=1528" alt="spoort ;)">
                        <div>
                            <h5 id="o10">Apricots</h5>
                            <p class="price">1kg costs <ins id="w10">200tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o10').textContent,document.querySelector('#w10').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="drinks" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://d2j6dbq0eux0bg.cloudfront.net/images/7841010/476630258.jpg" alt="plant">
                        <div>
                            <h5 id="o11">Coca-Cola 1 l</h5>
                            <p class="price"><ins id="w11">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o11').textContent,document.querySelector('#w11').textContent)">Add to Basket</button>
                        </div>
                    </div >
                    <div class="border">
                        <img src="https://s.alicdn.com/@sc01/kf/U50d2ab1e86884e4f946d0b5565177bf0S.jpg_300x300.jpg" alt="fruits">
                        <div>
                            <h5 id="o12">Coca-Cola 1,5 l</h5>
                            <p class="price"><ins id="w12">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o12').textContent,document.querySelector('#w12').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://7eda.kz/wp-content/uploads/2019/12/1ce67f61eb5611e98d6038baf8f30fd8_6d47b9edfe7711e999ef38baf8f30fd8-1.png" alt="spoort ;)">
                        <div>
                            <h5 id="o13">Piko 1 l</h5>
                            <p class="price"><ins id="w13">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o13').textContent,document.querySelector('#w13').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://am-am.od.ua/12-large_default/napitok-gazirovannyj-sprite-1-l.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o14">Sprite 1 l</h5>
                            <p class="price"><ins id="w14">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o14').textContent,document.querySelector('#w14').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://images.kz.prom.st/131487452_w440_h440_sprite-15l.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o15">Sprite 1.5 l</h5>
                            <p class="price"><ins id="w15">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o15').textContent,document.querySelector('#w15').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTfxWgMAkhRhp5Bt4mtKc1Ih9VFEcLmr3aCxg&usqp=CAU" alt="spoort ;)">
                        <div>
                            <h5 id="o16">Gorilla</h5>
                            <p class="price"><ins id="w16">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o16').textContent,document.querySelector('#w16').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="meat" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://i8.amplience.net/i/traeger/20190723_Traeger-Filet-Mignon_RE_HE_M?w=1200&sm=aspect&aspect=2:1&scaleFit=poi&$poi2$" alt="plant">
                        <div>
                            <h5 id="o17">Filet Mignon</h5>
                            <p class="price"><ins id="w17">1000tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o17').textContent,document.querySelector('#w17').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://previews.123rf.com/images/andreyst/andreyst1811/andreyst181100563/112007672-grilled-rib-eye-steak-with-sauce.jpg" alt="fruits">
                        <div>
                            <h5 id="o18">Rib Eye</h5>
                            <p class="price"><ins id="w18">600tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o18').textContent,document.querySelector('#w18').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.cookinglight.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_-_1200x900%2Fpublic%2Fimage%2F2017%2F09%2Fmain%2Fgarlicky-new-york-strip-steak-1711p116.jpg%3Fitok%3Dbru5uIDh" alt="spoort ;)">
                        <div>
                            <h5 id="o19">New York Strip</h5>
                            <p class="price"><ins id="w19">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o19').textContent,document.querySelector('#w19').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://grandkulinar.ru/uploads/posts/2019-04/1554277516_prostoj-flank-stejk-v-duhovke-s-maslom-s-zelenyu.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o20">Flank</h5>
                            <p class="price"><ins id="w20">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o20').textContent,document.querySelector('#w20').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="FishSeafood" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://img.freepik.com/free-photo/escargot-snails-cooked-with-garlic-butter-plate_164235-19.jpg?size=626&ext=jpg" alt="plant">
                        <div>
                            <h5 id="o21">Snails</h5>
                            <p class="price"><ins id="w21">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o21').textContent,document.querySelector('#w21').textContent)">Add to Basket</button>
                        </div>
                    </div >
                    <div class="border">
                        <img src="https://sifu.unileversolutions.com/image/en-LK/recipe-topvisual/2/1260-709/salt-n-pepper-cuttlefish-50420360.jpg" alt="fruits">
                        <div>
                            <h5 id="o22">Cuttlefish</h5>
                            <p class="price"><ins id="w22">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o22').textContent,document.querySelector('#w22').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://food.fnr.sndimg.com/content/dam/images/food/fullset/2011/5/4/2/FNM_060111-WN-Dinners-023_s4x3.jpg.rend.hgtvcom.826.620.suffix/1371597603967.jpeg" alt="spoort ;)">
                        <div>
                            <h5 id="o23">Mussels</h5>
                            <p class="price"><ins id="w23">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o23').textContent,document.querySelector('#w23').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://rasamalaysia.com/wp-content/uploads/2009/10/curry-clams-thumb.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o24">Clams</h5>
                            <p class="price"><ins id="w24">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o24').textContent,document.querySelector('#w24').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://www.thespruceeats.com/thmb/RwQxlm51YbhDDNc2205MZi2PBSo=/2000x1332/filters:fill(auto,1)/easy-butter-and-herb-baked-oysters-4049551-hero-01-11bfc0f1661f4045a19d7749aa6b34f2.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o25">Oysters</h5>
                            <p class="price"><ins id="25">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o25').textContent,document.querySelector('#w25').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://gbc-cdn-public-media.azureedge.net/img73219.768x512.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o26">Scallops</h5>
                            <p class="price"><ins id="w26">350tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o26').textContent,document.querySelector('#w26').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="dairyfood" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://sweetsimplevegan.com/wp-content/uploads/2019/08/5-Minute-Strawberry-Frozen-Yogurt-Vegan-No-Machine-Sweet-Simple-Vegan-Featured-Image.jpg" alt="plant">
                        <div>
                            <h5 id="o27">Frozen Yogrut</h5>
                            <p class="price"><ins id="w27">1000tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o27').textContent,document.querySelector('#w27').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://www.seriouseats.com/2018/08/20180807-ice-milk-vicky-wasik-13.jpg" alt="fruits">
                        <div>
                            <h5 id="o28">Ice-milk</h5>
                            <p class="price"><ins id="w28">600tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o28').textContent,document.querySelector('#w28').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://veenaazmanov.com/wp-content/uploads/2012/08/Mango-Lassi-Recipe.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o29">Lassi</h5>
                            <p class="price"><ins id="w29">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o29').textContent,document.querySelector('#w29').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://smartafro.com/images/category/pudding.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o30">Puddings</h5>
                            <p class="price"><ins id="w30">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o30').textContent,document.querySelector('#w30').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://images.food52.com/UjV5hNOs8IY0tNoLvTgSLdzn99o=/2016x1344/dccf1f67-742e-4311-baaf-b831b05a7f85--2019-0531_orange-sherbet-recipe_3x2_rocky-luten_018.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o31">Sherbet</h5>
                            <p class="price"><ins id="w31">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o31').textContent,document.querySelector('#w31').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="salad" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://tandoori.md/wp-content/uploads/2018/07/IndianGreen.jpg" alt="plant">
                        <div>
                            <h5 id="o32">Green Salad</h5>
                            <p class="price"><ins id="w32">1000tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o32').textContent,document.querySelector('#w32').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i2.wp.com/carolinescooking.com/wp-content/uploads/2020/05/tropical-fruit-salad-photo-1024x768.jpg" alt="fruits">
                        <div>
                            <h5 id="o33">Fruit Salad</h5>
                            <p class="price"><ins id="w33">600tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o33').textContent,document.querySelector('#w33').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://kfoods.com/images1/newrecipeicon/rice-and-pasta-salad_14746.jpg" alt="spoort ;)">
                        <div>
                            <h5 id="o34">Rice and Pasta Salad</h5>
                            <p class="price"><ins id="w34">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o34').textContent,document.querySelector('#w34').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://i.pinimg.com/originals/24/93/a7/2493a7b6c807d4f8d9838d94fd31f39f.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o35">Bound Salad</h5>
                            <p class="price"><ins id="w35">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o35').textContent,document.querySelector('#w35').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://irepo.primecp.com/1007/58/189805/5-Minute-Watergate-Salad_Medium_ID-703478.jpg?v=703478" alt="eco-friendly good">
                        <div>
                            <h5 id="o36">Dessert</h5>
                            <p class="price"><ins id="w36">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o36').textContent,document.querySelector('#w36').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="pizza" class="menubar">
                <div class="menu-content">
                    <div class="border">
                        <img src="https://eda.ru/img/eda/c620x415i/s2.eda.ru/StaticContent/Photos/120131085053/171027192707/p_O.jpg" alt="plant">
                        <div>
                            <h5 id="o37">Pepperoni</h5>
                            <p class="price"><ins id="w37">1000tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o37').textContent,document.querySelector('#w37').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://image.freepik.com/free-photo/large-margherita-pizza-on-wooden-chopping-board_23-2147926084.jpg" alt="fruits">
                        <div>
                            <h5 id="o38">Margherita</h5>
                            <p class="price"><ins id="w38">600tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o38').textContent,document.querySelector('#w38').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRkHT9noAmoiJFLcxuueMOUsrmC18q_Y0WIDg&usqp=CAU" alt="spoort ;)">
                        <div>
                            <h5 id="o39">BBQ Chicken</h5>
                            <p class="price"><ins id="w39">500tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o39').textContent,document.querySelector('#w39').textContent)">Add to Basket</button>
                        </div>
                    </div>
                    <div class="border">
                        <img src="https://www.thespruceeats.com/thmb/qsBF9PplmRf_yARX4w6A2HdhCDw=/2665x1999/smart/filters:no_upscale()/aqIMG_4568fhor-0b89dc5c8c494ee9828ed29805791c5a.jpg" alt="eco-friendly good">
                        <div>
                            <h5 id="o40">Meat</h5>
                            <p class="price"><ins id="w40">700tg</ins></p>
                            <button class="btn btn-light" onmouseout="mouseover(this)" onclick=" Added(this); AddToBasket(document.querySelector('#o40').textContent,document.querySelector('#w40').textContent)">Add to Basket</button>
                        </div>
                    </div>
                </div>
            </div>  -->
    
            <div class="top"></div> 
            <div class="ffff">
                <div class="left"></div>
                <p id="text">{{__('lang.deals')}}</p>
                <div class="left"></div>
            </div>
            <div class="deals">
                <div class="discount">
                    <p class="discount-content">{{__('lang.cashback')}}</p>
                    <p class="procent">10%</p>
                </div>
                <div class="discount">
                    <p class="discount-content">{{__('lang.cashback')}}</p>
                    <p class="procent">5%</p>
                </div>
                <div class="discount">
                    <p class="discount-content">{{__('lang.cashback')}}</p>
                    <p class="procent">3%</p>
                </div>
            </div> 
        </div>
            
        <!-- footer -->
        <div class="footer">
            <h1 id="contact">{{__('lang.contact')}}</h1>
            <div>
                <div id="address">
                    <div>
                        <img id="location" src="https://e7.pngegg.com/pngimages/602/145/png-clipart-park-merlo-weston-location-citizens-telephone-corporation-computer-icons-local-miscellaneous-text-thumbnail.png" alt="">
                        <p id="city">Qaskelen</p>
                    </div>
                    <div>
                        <img id="instagram" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/768px-Instagram_icon.png" alt="">
                        <p id="page">whole_food_market</p>
                    </div>
                    <div>
                        <img id="gmail" src="https://www.google.com/gmail/about/static/images/logo-gmail.png?cache=1adba63" alt="">
                        <a href="190103315@stu.sdu.edu.kz">190103315@stu.sdu.edu.kz</a>
                    </div>
                    <div>
                        <img id="telephone" src="https://www.clipartmax.com/png/middle/2-23363_icon-telephone-png.png" alt="">
                        <a href="#"> 8-747-711-8433</a>
                    </div>
                </div>
                <div id="map">
                    <h4>{{__('lang.feedback')}}</h4>
                    <div class="form2">
                        <form action="{{ url('/send') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="inputs">
                                <input name="name" class="gmail" type="text" placeholder="{{__('lang.name')}}">
                                <input name="email" class="gmail" type="email" placeholder="example@gmail.com">
                                <input name="file" type="file" class="choose">
                                <button type="submit" class="btn btn-secondary">{{__('lang.send')}}</button>
                            </div>
                            <textarea name="message" id="txtarea" placeholder="{{__('lang.mess')}}" cols="35" rows="2"></textarea>
                        </form>
                    </div>
                    
                </div>
            </div> 
        </div>
    </div>
    
    <!-- Order form form -->
    <div class="form">
        <div class="form-content">
            <h1 id="basket">{{__('lang.empty')}}</h1>
            <div id="payment-content"></div>
            <h4 id="adhome">{{__('lang.total')}}<span id="totalMark"></span></h4>
            <div class="inputt">
                <form action="{{ route('add-post') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="mobile_number" placeholder="Mobile Number" required>
                    <input type="text" name="address" placeholder="Address" required>
                    <select name="payment">
                        <option value="by Kaspi Gold">{{__('lang.kaspi')}}</option>
                        <option value="Cash upon receipt" selected>{{__('lang.pay')}}</option>
                    </select>
                    <div class="buttons">
                        <button class="btn btn-outline-light order"  disabled>{{__('lang.order')}}</button>
                        <input type="hidden" name="lang" value="{{ app()->getlocale() }}">
                        <a href="{{ url('/' . app()->getlocale()) }}" class="btn btn-outline-light">{{__('lang.cont')}}</a>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
    
    
    <script>
        var url="{{ URL::asset('img/close.png') }}";
        var add="{{__('lang.add')}}";
        var added="{{__('lang.added')}}";
        var basket="{{__('lang.basket')}}";
        var empty="{{__('lang.empty')}}";
        var fastfood="{{__('lang.fastfood')}}";
        var meat="{{__('lang.meat')}}";
        var fruit="{{__('lang.fruit')}}";
        var drink="{{__('lang.drink')}}";
        var salad="{{__('lang.salad')}}";
        var dayrifood="{{__('lang.darifood')}}";
        var txt="{{__('lang.txt')}}";
        var fish="{{__('lang.fish')}}";
        var pizza="{{__('lang.pizza')}}";
    </script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
</script>
    
</body>
</html>