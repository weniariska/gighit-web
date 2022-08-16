<div>
    @include('partials.header')
    <div class="judul font-20 dis-flex-row"><span></span> S T A R T E R S <span></span></div>
    <div id="starters" class="kontainer-menu">
        {{-- <h1>{{ $count }}</h1>
        <button wire:click="increment">+++</button> --}}

        @foreach ($starters as $starter)
            <?php 
            $price = str_split($starter->price);
            $priceStart = join("",array_slice($price,0,(count($price)-3)));
            $priceEnd = join("",array_slice($price,(count($price)-3),(count($price))));
            ?>
            <div class="menu dis-flex-col">
                <img class="img-style" src="{{ asset('storage//images//'.$starter->image) }}" alt="{{ $starter->image }}"">
                <div class="blHover"><p class="desc-style">{{ $starter->desc }}</p></div>
                <div class="name-style font-20">{{ $starter->name }}</div>
                <div class="divPrice font-20">Rp. {{ $priceStart }}<span class="spanNol">.{{ $priceEnd }}</span></div>
                <button class="btnAdd btn-black border-20" @auth wire:click.prevent="addToCart('{{ $starter->name }}',{{ $starter->price }},'{{ $starter->image }}')" @else onclick="tampil('alertAddError')" @endauth >Add</button>
            </div>
        @endforeach
    @include('partials.alertAddError')
    </div>
</div>
