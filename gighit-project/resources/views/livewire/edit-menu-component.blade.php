<div>
    <div id="edit" class="kontainer-menu kontainer-side-main">
        {{-- kontainer utama --}}
        <div class="kontainer-main div-main">
            <div class="align-right mar-btm-10">
                <button class="btn-black" onclick="tampilMain('1', '3')">Pizza</button>
                <button class="btn-black" onclick="tampilMain('2', '3')">Drinks</button>
                <button class="btn-black" onclick="tampilMain('3', '3')">Starters</button>
            </div>

            <div id="1" class="tableFixHead height-400">
                <table class="admin-order-table width-100">
                    <thead>
                        <tr>
                            <th style="width: 25%">Name</th>
                            <th style="width: 15%">Image</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 25%">Desc</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pizzas as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->image }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td>{{ $prod->desc }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="showThis({{ $prod }}, 'Pizza')">Edit</button></td>
                            <td><button class="btn-black border-20" onclick="tampil('{{ 'alert'.$prod->id }}')">Del</button></td>
                            <div onclick="tutup('{{ 'alert'.$prod->id }}')" id="{{ 'alert'.$prod->id }}" class="parentDisable hide">
                                <div class="alert border-20 abs-center">
                                    <div class="alert-title font-20">Delete Item</div>
                                    <div class="alert-desc">Are you sure you want to delete this item?</div>
                                    <button class="alert-btnKiri btn-white" onclick="tutup('{{ 'alert'.$prod->id }}')">Cancel</button>
                                    <button class="alert-btnKanan btn-white" wire:click.prevent="deleteThis({{ $prod }}, 'Pizza')">Yes</button>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>

            <div id="2" class="tableFixHead height-400 disNone">
                <table class="admin-order-table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Name</th>
                            <th style="width: 15%">Image</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 25%">Desc</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drinks as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->image }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td>{{ $prod->desc }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="showThis({{ $prod }}, 'Drink')">Edit</button></td>
                            <td><button class="btn-black border-20" onclick="tampil('{{ 'alertd'.$prod->id }}')">Del</button></td>
                            <div onclick="tutup('{{ 'alertd'.$prod->id }}')" id="{{ 'alertd'.$prod->id }}" class="parentDisable hide">
                                <div class="alert border-20 abs-center">
                                    <div class="alert-title font-20">Delete Item</div>
                                    <div class="alert-desc">Are you sure you want to delete this item?</div>
                                    <button class="alert-btnKiri btn-white" onclick="tutup('{{ 'alertd'.$prod->id }}')">Cancel</button>
                                    <button class="alert-btnKanan btn-white" wire:click.prevent="deleteThis({{ $prod }}, 'Drink')">Yes</button>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>

            <div id="3" class="tableFixHead height-400 disNone">
                <table class="admin-order-table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Name</th>
                            <th style="width: 15%">Image</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 25%">Desc</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($starters as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->image }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td>{{ $prod->desc }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="showThis({{ $prod }}, 'Starter')">Edit</button></td>
                            <td><button class="btn-black border-20" onclick="tampil('{{ 'alerts'.$prod->id }}')">Del</button></td>
                            <div onclick="tutup('{{ 'alerts'.$prod->id }}')" id="{{ 'alerts'.$prod->id }}" class="parentDisable hide">
                                <div class="alert border-20 abs-center">
                                    <div class="alert-title font-20">Delete Item</div>
                                    <div class="alert-desc">Are you sure you want to delete this item?</div>
                                    <button class="alert-btnKiri btn-white" onclick="tutup('{{ 'alerts'.$prod->id }}')">Cancel</button>
                                    <button class="alert-btnKanan btn-white" wire:click.prevent="deleteThis({{ $prod }}, 'Starter')">Yes</button>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div>

        {{-- kontainer side --}}
        <div id="edit-menu-side" class="kontainer-side">
            @if ($showOnSide != null)
            <div class="div-side  border-20 pad-20">
                <table class="table-style mar-btm-10">
                    <thead>
                        <td>Edit Menu</td>
                    </thead>
                </table>
                <form wire:submit.prevent="updateThis" enctype="multipart/form-data">
                    <table class="table-side-input">
                        @csrf
                        <tr>
                            <td>Name</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="name"  name="name" id="name">
                                    <span class="error">@error('name') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="{{ ($editImage == "yes") ? '' : 'disNone' }}">
                            <td>Image</td>
                            <td>
                                <div class="container">
                                    <div class="button-wrap">
                                        <label class="button" for="image">Upload</label>
                                        <input type="file" wire:model="image" name="image" id="image">
                                    </div>
                                    <span class="error">@error('image') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="{{ ($editImage == "yes") ? 'disNone' : '' }}">
                            <td>Image</td>
                            <td>
                                <div>
                                    <span class="dis-flex-row"><input type="text" wire:model="image" name="image" id="image" disabled><span style="height: 40px; margin-left: 5px;" class="div-btn btn-black border-20" wire:click.prevent="setEditImage">Edit</span></span>
                                    <span class="error">@error('image') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="price" name="price" id="price">
                                    <span class="error">@error('price') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="desc" name="desc" id="desc">
                                    <span class="error">@error('desc') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                    <button class="btn-black border-20 width-100" type="submit">Save Change</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                    <div style="margin-top: -10px" class="border-20 div-btn" wire:click.prevent="setNull">Cancel</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            @else
            <div class="div-side  border-20 pad-20">
                <div class="align-center pad-20">
                    <span class="div-btn pad-10 {{ ($modelNew === "Pizza") ? 'underline' : '' }}" wire:click.prevent="setModel('Pizza')">Pizza</span>
                    <span class="div-btn pad-10 {{ ($modelNew === "Drink") ? 'underline' : '' }}" wire:click.prevent="setModel('Drink')">Drink</span>
                    <span class="div-btn pad-10 {{ ($modelNew === "Starter") ? 'underline' : '' }}" wire:click.prevent="setModel('Starter')">Starter</span>
                </div>

                <table class="table-style mar-btm-10">
                    <thead>
                        <td>Add New {{ $modelNew }}</td>
                    </thead>
                </table>
                <form wire:submit.prevent="addNew" enctype="multipart/form-data">
                    <table class="table-side-input">
                        @csrf
                        <tr>
                            <td>Name</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="name"  name="name" id="name">
                                    <span class="error">@error('name') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <div class="container">
                                    <div class="button-wrap">
                                        <label class="button" for="image">Upload</label>
                                        <input type="file" wire:model="image" name="image" id="image">
                                    </div>
                                    <span class="error">@error('image') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="price" name="price" id="price">
                                    <span class="error">@error('price') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="desc" name="desc" id="desc">
                                    <span class="error">@error('desc') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                    <button class="btn-black border-20 width-100" type="submit">Save New {{ $modelNew }}</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
