<div>
    @include('partials.header')
    <div class="judul font-20 dis-flex-row"><span></span> D R I N K S <span></span></div>
    <div id="drink" class="kontainer-menu">        
        @foreach ($drinks as $drink)
            <?php 
            $price = str_split($drink->price);
            $priceStart = join("",array_slice($price,0,(count($price)-3)));
            $priceEnd = join("",array_slice($price,(count($price)-3),(count($price))));
            ?>
            <div class="menu dis-flex-col">
                <img class="img-style" src="{{ asset('storage//images//'.$drink->image) }}" alt="{{ $drink->image }}">
                <div class="blHover"><p class="desc-style">{{ $drink->desc }}</p></div>
                <div class="name-style font-20">{{ $drink->name }}</div>
                <div class="divPrice font-20">Rp. {{ $priceStart }}<span class="spanNol">.{{ $priceEnd }}</span></div>
                <button class="btnAdd btn-black border-20" @auth wire:click.prevent="addToCart('{{ $drink->name }}',{{ $drink->price }},'{{ $drink->image }}')" @else onclick="tampil('alertAddError')" @endauth >Add</button>
            </div>
        @endforeach
    @include('partials.alertAddError')
    </div>    
</div>
