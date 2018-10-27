<nav class="table-of-contents" itemscope itemtype="http://schema.org/SiteNavigationElement">
    @foreach($document->getNavigation() as $nav)
        <a itemprop="url" class="table-of-contents-link level-{{ $nav[\App\Entity\Document\Navigation::INDEX_LEVEL] }}"
           href="#{{ $nav[\App\Entity\Document\Navigation::INDEX_SLUG] }}">
            <span itemprop="name">{{ $nav[\App\Entity\Document\Navigation::INDEX_TITLE] }}</span>
        </a>
    @endforeach
</nav>
