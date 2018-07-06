<div class="wrapper">
    <section class="category" id="top" >
        <a href="{{ route('productAll', ['catedories' => 'male']) }}">
            <div class="img-category mens-jeans"></div>
            <div class="category-description">
                <h3>Мужская одежда</h3>
                <p>{{$menDesc}} </p>
            </div>
        </a>
    </section>
    <section class="category ">
        <a href="{{ route('productAll', ['catedories' => 'female']) }}">
            <div class="img-category womens-jeans"></div>
            <div class="category-description">
                <h3>Женская одежда</h3>
                <p>{{$woomenDesc}} </p>
            </div>
        </a>
    </section>
    <section class="category ">
        <a href="{{ route('productAll', ['catedories' => 'bestoffer']) }}">
            <div class="img-category sale"></div>
            <div class="category-description">
                <h3>Выгодные предложения</h3>
                <p>{{$newDesc}} </p>
            </div>
        </a>
    </section>
    <section class="category ">
        <a href="{{ route('productAll', ['catedories' => 'new']) }}">
            <div class="img-category new"></div>
            <div class="category-description">
                <h3>Новинки</h3>
                <p>{{$saleDesc}} </p>
            </div>
        </a>
    </section>
    {{--<div class="slider-catalog">
        <div class="multiple-item">
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="new-category-item slider-category">
                    <p>Футболки мужские</p>
                    <img src="img/category-item.jpg" alt="">
                </div>
            </div>
        </div>
    </div>--}}
    <a href="{{ route('productAll', ['catedories' => 'all']) }}" class="all-catalog">
        <h5>Смотреть весь каталог</h5>
    </a>
</div>