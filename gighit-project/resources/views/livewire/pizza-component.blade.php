<div>
    @include('partials.header')
    <div class="judul font-20 dis-flex-row"><span></span> P I Z Z A <span></span></div>
    <div id="pizza" class="kontainer-menu">
        @foreach ($pizzas as $pizza)
            <?php 
            $price = str_split($pizza->price);
            $priceStart = join("",array_slice($price,0,(count($price)-3)));
            $priceEnd = join("",array_slice($price,(count($price)-3),(count($price))));
            ?>
            <div class="menu dis-flex-col">
                <img class="img-style img-pizza" src="{{ asset('storage//images//'.$pizza->image) }}" alt="{{ $pizza->image }}">
                <div class="blHover"><p class="desc-style">{{ $pizza->desc }}</p></div>
                <div class="name-style font-20">{{ $pizza->name }}</div>
                <div class="divPrice font-20">Rp. {{ $priceStart }}<span class="spanNol">.{{ $priceEnd }}</span></div>
                <button class="btnAdd btn-black border-20" @auth wire:click.prevent="addToCart('{{ $pizza->name }}',{{ $pizza->price }},'{{ $pizza->image }}')" @else onclick="tampil('alertAddError')" @endauth >Add</button>
            </div>
        @endforeach
    @include('partials.alertAddError')
    </div>
</div>
