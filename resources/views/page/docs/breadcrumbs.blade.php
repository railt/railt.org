
<nav class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a class="breadcrumbs-link" itemprop="item" href="{{ \route('docs') }}">
            <span itemprop="name">Home</span>
        </a>
        <meta itemprop="position" content="1" />
    </span>

    @foreach($document->getBreadcrumbs() as $title => $link)
        @if(! $link || $loop->first) @continue @endif

        <span class="breadcrumbs-delimiter">&nbsp;</span>

        @if($loop->last)
            <span class="breadcrumbs-link breadcrumbs-last">
                <span>{{ $title }}</span>
            </span>
        @else
            <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a class="breadcrumbs-link" itemprop="item" href="{{ \route('docs.page', ['page' => $link]) }}">
                    <span itemprop="name">{{ $title }}</span>
                </a>
                <meta itemprop="position" content="{{ $loop->index + 1 }}" />
            </span>
        @endif
    @endforeach
</nav>
