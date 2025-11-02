@extends('layouts.app')

@section('content')
<section class="hero">
  <h1>Product Showcase</h1>
  <p>Gear curated for adventurous, story-first wedding shoots.</p>
</section>

<section class="grid" aria-label="Products">
  @foreach ($products as $product)
  <x-product-card :product="$product" />
  @endforeach
</section>
@endsection