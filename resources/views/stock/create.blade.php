<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="form-group d-flex">
                        <div class="form-floating flex-grow-1 mx-1">
                            <input name="nome" type="text" class="form-control" id="tag1">
                            <label for="tag1">Nome</label>
                        </div>
                        <div class="form-floating flex-grow-1">
                            <input name="unidade" type="number" class="form-control" id="tag2">
                            <label for="tag2">Unidade</label>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                            <input name="val_referencia" type="number" step="0.01" class="form-control" id="tag1">
                            <label for="tag1">Valor refêrencia</label>
                        </div>
                        <div class="form-floating flex-grow-1 mt-3">
                            <input name="fornecedor" type="text" class="form-control" id="tag2">
                            <label for="tag2">Fornecedor</label>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                            <input name="est_max" type="number" class="form-control" id="tag1">
                            <label for="tag1">Estoque Máximo</label>
                        </div>
                        <div class="form-floating flex-grow-1 mt-3">
                            <input name="est_min" type="number" class="form-control" id="tag2">
                            <label for="tag2">Estoque Mínimo</label>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="form-floating flex-grow-1 mt-3">
                            <input name="categoria" type="text" class="form-control" id="tag1">
                            <label for="tag1">Categoria</label>
                        </div>
                    </div>

                    <div class="form-floating flex-grow-1 mt-3">
                        <form method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
