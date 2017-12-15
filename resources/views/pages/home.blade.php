@extends('layout.master')

@push('title', 'The GraphQL Framework')

@section('content')
    <app-splash>
        <template slot="frontend">
            @include('icons.angular')
            @include('icons.apollo')
            @include('icons.react')
            @include('icons.relay')
            @include('icons.vue')
        </template>

        <template slot="backend">
            @include('icons.php')
            @include('icons.laravel')
            @include('icons.symfony')
        </template>
    </app-splash>


    <app-home>
        <template slot="versions">
            <el-tabs tab-position="top">
                <?php /** @var \App\Entity\Component[] $components */ ?>
                @foreach($components as $component)
                    @php
                        $release = $component->getLatestRelease();
                    @endphp

                    <el-tab-pane>
                        <template slot="label">
                            {{ $component->getTitle() }}
                            @if($release)
                                <el-tag type="success" size="mini">{{ $release->getVersion() }}</el-tag>
                            @else
                                <el-tag type="danger" size="mini">master</el-tag>
                            @endif
                        </template>

                        <section>
                            @if($release)
                                @include('pages.home.release', [
                                    'title' => 'Актуальная версия',
                                    'release' => $release
                                ])
                            @else
                                @include('pages.home.no-release', [
                                    'title' => 'Актуальная версия',
                                ])
                            @endif
                        </section>

                        <section>
                            @if($component->hasPenultimateRelease())
                                @include('pages.home.release', [
                                    'title' => 'Предыдущая версия',
                                    'release' => $component->getPenultimateRelease()
                                ])
                            @else
                                @include('pages.home.no-release', [
                                    'title' => 'Предыдущая версия',
                                ])
                            @endif
                        </section>
                    </el-tab-pane>
                @endforeach
            </el-tabs>
        </template>

        <template slot="activity">
            @include('pages.home.activity', \compact($issues))
        </template>

        <template slot="contributors">
            @include('pages.home.contributors', \compact($contributors))
        </template>

        <template slot="trustedBy">
            @include('pages.home.trusted-by')
        </template>
    </app-home>
@stop
