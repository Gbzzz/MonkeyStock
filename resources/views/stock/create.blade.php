<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de produto') }}
        </h2>
    </x-slot>

    {{-- <form action="/stock/store" method="POST"> --}}

        @csrf

        {{-- INFORMAÇÕES --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Informações do produto') }}
                        </h2>
    
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
                                <input name="maximum_stock_level" type="number" class="form-control" id="tag1">
                                <label for="tag1">Estoque Máximo</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="minimum_stock_level" type="number" class="form-control" id="tag2">
                                <label for="tag2">Estoque Mínimo</label>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="refference_value" type="number" step="0.01" class="form-control" id="tag1">
                                <label for="tag1">Valor refêrencia</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="supplier" type="text" class="form-control" id="tag2" hidden>
                            </div>
                        </div>
    
                        <div class="form-floating flex-grow-1 mt-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

        {{-- CATEGORIA --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Categoria') }}
                        </h2>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mt-3">

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

                                <div class="form-floating flex-grow-1 mt-3" id="new_category">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                        Cadastrar nova categoria
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="categoryModalLabel">Nova categoria</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('category.store') }}" method="POST">
                                                    @csrf

                                                    <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                        <input name="new_category" type="text" step="0.01" class="form-control" id="tag1">
                                                        <label for="tag1">Nome</label>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                
                                                </form>
                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- FORNECEDORES --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Fornecedores') }}
                        </h2>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="supplier" type="text" class="form-control" id="tag2">
                                <label for="tag2">Fornecedor</label>
                            </div>
                        </div>

                        <div class="form-floating flex-grow-1 mt-3" id="new_category">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplierModal">
                                Cadastrar novo fornecedor
                            </button>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="supplierModalLabel">Novo fornecedor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    ...
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    {{-- </form> --}}

<script src="{{ asset('/js/script.js') }}"></script>

</x-app-layout>
