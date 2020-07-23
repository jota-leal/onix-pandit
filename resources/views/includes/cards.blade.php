<div class="ui cards">
    <div class="ui two column grid">
        @forelse ($searchResults as $i => $pokemon)
        <div class="column">
            <div class="ui fluid horizontal teal card">
                @if ($pokemon->getBackImage())
                <div class="ui slide masked reveal image">
                    <img src="{{ $pokemon->getFrontImage() }}" class="front visible content">
                    <img src="{{ $pokemon->getBackImage() }}" class="back hidden content">
                </div>
                @elseif ($pokemon->getFrontImage())
                <div class="ui image">
                    <img src="{{ $pokemon->getFrontImage() }}" class="front content">
                </div>
                @else
                <div class="ui image">
                    <img src="https://placehold.co/150x150/f2f2f2/999999?text=?&font=raleway')" class="front content">
                </div>
                @endif

                <div class="content">
                    <div class="header">{{ $pokemon->getName() }}</div>
                    <div class="meta">
                        <span class="type">{{ implode(' – ', $pokemon->getTypes()) }}</span>
                    </div>
                    <div class="description">
                        <p>Habilidades de <strong>{{ $pokemon->getName() }}</strong>:</p>
                        <p><strong>{!! ucwords(str_replace('-', ' ', implode('</strong>, <strong> ', $pokemon->getAbilities()))) !!}</strong>.</p>
                    </div>
                </div>

                <div class="extra content">
                    <span class="ui small teal label height">
                        <i class="ruler icon"></i><span class="value">{{ $pokemon->getHeight() }} m</span>
                    </span>

                    <span class="ui small teal label weight">
                        <i class="balance scale icon"></i><span class="value">{{ $pokemon->getWeight() }} kg</span>
                    </span>
                </div>
            </div>
        </div>
        @empty
            @if (!empty($search))
                <div class="no-results">
                    <h1>No hay pokémones para la búsqueda <span>{{ $search }}</span>.</h1>
                </div>
            @endif
        @endforelse
    </div>
</div>