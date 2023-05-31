<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estoque') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="/stock/create" class="btn btn-primary">Cadastrar produto</a>

                    {{-- MODAL CATEGORIA --}}

                    <div class="form-floating flex-grow-1 mt-3" id="new_category" style="display: inline-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                            Cadastrar categoria
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

                    {{-- MODAL FORNECEDORES --}}

                    <div class="form-floating flex-grow-1 mt-3" id="new_category" style="display: inline-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplierModal">
                            Cadastrar fornecedor
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

                                    <form action="{{ route('supplier.store') }}" method="POST">
                                        @csrf

                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                            <input name="new_supplier" type="text" step="0.01" class="form-control" id="tag1">
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @foreach ($categories as $category)
                        <a href="#" class="btn btn-primary" onclick="showStock({{ $category->id }})">{{ $category->name }}</a>
                    @endforeach

                    <p></p>

                    @for ($i =0; $i < count($categories); $i++)
                        <div id="{{ $categories[$i]->id }}" style="display:none;">

                            @if (count($categories[$i]->products) == 0)
                                <p>Nenhum produto na categoria {{ $categories[$i]->name }}.</p>
                                
                            @else
                                

                                <table class="table-fixed" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Fornecedor(es)</th>
                                        <th>Saldo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($categories[$i]->products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    @foreach ($suppliers_list[$i] as $supplier)
                                                        {{ $supplier }} <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $product->balance }}
                                                </td>
                                            </tr>                                      
                                        @endforeach

                                        
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>

<script>

function showStock(categoria) {

    const size = {{ $size }};
    for (var i = 1; i <= size; i++ ) {
    
        var tabela = document.getElementById(i);
        if (i == categoria) {
            tabela.style.display = 'block';
        } else {
            tabela.style.display = 'none';
        }

    }

}
</script>

</x-app-layout>