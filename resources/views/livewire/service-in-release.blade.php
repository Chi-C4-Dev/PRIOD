<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="servicesContainer">
                <!-- Services will be dynamically inserted here -->
                
                    @foreach ($categorias as $categoria)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="text-primary-priod mb-3">
                                        <i class="bi bi-folder fs-1"></i> <!-- Ícone padrão ou personalizado -->
                                    </div>
                                    <h5 class="card-title">{{ $categoria->nome }}</h5>
                                        <p class="card-text">{{ $categoria->descricao }}</p>
                                    <ul class="list-unstyled mt-3">
                                        @foreach ($categoria->servicos as $servico)
                                            <li class="mb-2">
                                                <i class="bi bi-check-circle-fill text-primary-priod me-2"></i>
                                                {{ $servico->nome }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
                
            </div>