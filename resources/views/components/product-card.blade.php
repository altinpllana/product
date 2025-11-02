@props(['product'])

<article class="card" x-data="{ open:false }">
  <button class="thumb" @click="open=true" aria-haspopup="dialog" :aria-expanded="open.toString()" aria-label="Open {{ $product['title'] }} details">
    <img loading="lazy" src="{{ $product['image'] }}" alt="{{ $product['title'] }}">
  </button>
  <div class="body">
    <header class="meta">
      <h3>{{ $product['title'] }}</h3>
      <span class="price">${{ number_format($product['price'],2) }}</span>
    </header>
    <p class="desc">{{ $product['description'] }}</p>
    <div class="actions">
      <div class="like-button-root"
        data-id="{{ $product['id'] ?? $loop->index }}"
        data-initial="{{ $product['likes'] ?? 0 }}">
      </div>
      <button class="btn" @click.stop>Add to Cart</button> {{-- stop bubbling --}}
    </div>

  </div>

  <template x-teleport="body">
    <div class="modal" x-cloak x-show="open" x-transition.opacity
      @keydown.escape.window="open=false"
      @click.self="open=false" role="dialog" aria-modal="true"
      aria-label="{{ $product['title'] }}">
      <div class="modal-dialog" x-trap.noscroll="open">
        <button class="close" @click="open=false" aria-label="Close">&times;</button>
        <div class="modal-media">
          <img src="{{ $product['image'] }}" alt="{{ $product['title'] }} large">
        </div>
        <div class="modal-body">
          <h3>{{ $product['title'] }}</h3>
          <p class="modal-price">${{ number_format($product['price'],2) }}</p>
          <p>{{ $product['details'] }}</p>
          <div class="modal-actions">
            <div class="like-button-root"
              data-id="{{ $product['id'] ?? $loop->index }}"
              data-initial="{{ $product['likes'] ?? 0 }}">
            </div>
            <button class="btn btn-primary" @click.stop>Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </template>
</article>