<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de produto') }}
        </h2>
    </x-slot>

    <form action="/stock/store" method="POST">

        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
    
                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1">
                                <input name="name" type="text" class="form-control" id="tag1">
                                <label for="tag1">Nome</label>
                            </div>
                            <div class="form-floating flex-grow-1">
                                <input name="unit" type="text" class="form-control" id="tag2">
                                <label for="tag2">Unidade</label>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="refference_value" type="number" step="0.01" class="form-control" id="tag1">
                                <label for="tag1">Valor refêrencia</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="supplier" type="text" class="form-control" id="tag2">
                                <label for="tag2">Fornecedor</label>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="maximum_stock_level" type="number" class="form-control" id="tag1">
                                <label for="tag1">Estoque Máximo</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="minimum_stock_level" type="number" class="form-control" id="tag2">
                                <label for="tag2">Estoque Mínimo</label>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mt-3">

                                <p style="color:grey;font-size:15px;margin-left:10px;margin-bottom:0px">Categoria</p>

                                <div class="form-floating flex-grow-1 mt-3" id="new_category" style="display:none;">
                                    <input name="categories" type="text" class="form-control" id="tag2">
                                    <label for="tag2">Nova categoria</label>
                                </div>

                                <select name="categories" id="categories" class="form-control" style="display:block">
                                    <option class="form-control" disabled selected value>Selecione uma categoria</option>
                                    @foreach ($categories as $category)
                                    <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                
                                <a href="#" id="bt_new_category" onclick="trocarInput()">+ Nova categoria</a>
                                <a href="#" id="bt_cancel" style="display:none;" onclick="cancelarCategoria()">Cancel</a>

                            </div>
                        </div>
    
                        <div class="form-floating flex-grow-1 mt-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    
    </form>

<script src="{{ asset('/js/script.js') }}"></script>

</x-app-layout>
