<section class="py-5"> 
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Serviços PRIOD</h2>
            <p class="fs-5 text-muted mx-auto" style="max-width: 700px;">
                Oferecemos um conjunto completo de soluções tecnológicas e serviços profissionais para atender às necessidades do seu negócio e indústria.
            </p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="servicesContainer">
            <!-- Services will be dynamically inserted here -->
            
            @forelse ($categorias as $categoria)
<div class="col">
    <div class="card h-100"> 
        <div class="card-body">
            <div class="text-primary-priod mb-3">
                <i class="bi bi-folder fs-1"></i> <!-- Ícone padrão ou personalizado -->
            </div>
            <h5 class="card-title">{{ $categoria->nome ?? 'Sem Nome' }}</h5>
            <p class="card-text">{{ $categoria->descricao ?? 'Sem Descrição' }}</p>
            <ul class="list-unstyled mt-3">
                @if (!empty($categoria->servicos) && collect($categoria->servicos)->isNotEmpty()) 
                    @foreach ($categoria->servicos as $servico)
                        <li class="mb-2">
                            <i class="bi bi-check-circle-fill text-primary-priod me-2"></i>
                            {{ $servico->nome ?? 'Serviço Desconhecido' }}
                        </li>
                    @endforeach
                @else
                    <li class="text-muted">Nenhum serviço disponível</li>
                @endif
            </ul>
        </div>
    </div>
</div>
@empty
<p>Nenhuma categoria encontrada.</p>
@endforelse

            
            
        </div>
    </div> 
</section>
