<?php /** @var \App\Entity\Release $release */ ?>

<h3>
    {{ $title or 'Latest Release' }}: {{ $release->getVersion() }}
</h3>

<a class="announcements-link" href="#">
    Read Announcement<i class="el-icon-arrow-right"></i>
</a>

<div class="announcements">
    @if($release->isEmpty())
        <p class="color-gray">There is no description of the release.</p>
    @else
        {!! $release->getBody() !!}
    @endif
</div>
