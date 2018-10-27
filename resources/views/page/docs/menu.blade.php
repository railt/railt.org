@php($depth = $depth ?? 0)

<?php
/**
 * @var \App\Entity\Menu $item
 * @var \App\Entity\Document $current
 */
?>
@foreach($items as $item)
    @if($item->hasDocument())
        <a itemprop="url" class="menu-item {{ $current->getUrn() === $item->getUrn() ? 'active' : '' }}"
           href="{{ \route('docs.page', ['page' => $item->getUrn()]) }}">
            <span itemprop="name">{{ $item->getTitle() }}</span>
        </a>
    @else
        <span itemprop="name" class="menu-item menu-title">{{ $item->getTitle() }}</span>
    @endif

    @if($item->hasChildren())
        <nav class="menu menu-depth-{{ $depth }}">
            @include('page.docs.menu', [
                'current' => $current,
                'items'   => $item->getChildren(),
                'depth'   => $depth + 1
            ])
        </nav>
    @endif
@endforeach
