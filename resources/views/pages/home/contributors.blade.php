<?php /** @var $contributors \App\Entity\Contributor[] */ ?>
@foreach($contributors as $contributor)
    <a href="{{ $contributor->getUrl() }}" class="contributor" target="_blank">
        <el-tooltip effect="dark" content="{{ '@' . $contributor->getLogin() }}" placement="top">
            <img src="{{ $contributor->getAvatar() }}" alt="{{ $contributor->getLogin() }}" />
        </el-tooltip>
    </a>
@endforeach

<span class="contributor more">
    {{ $contributorsCount }}+
</span>
