<app-footer year="{{ \date('Y') }}">
    <el-button type="primary" href="https://github.com/railt/railt" target="_blank">
        @include('icons.github')
        GitHub
    </el-button>

    <el-button type="primary" icon="el-icon-document" href="{{ \route('docs', ['lang' => $lang]) }}">
        Explore Docs
    </el-button>

    <template slot="poweredBy">
        <el-tooltip content="Использует PHP {{ \PHP_VERSION }}" placement="top">
            <a href="https://secure.php.net" target="_blank">
                <span>Использует</span>
                @include('icons.php')
            </a>
        </el-tooltip>
        <el-tooltip content="Построено на Laravel {{ \Illuminate\Foundation\Application::VERSION }}" placement="top">
            <a href="https://laravel.com" target="_blank">
                <span>Построено на</span>
                @include('icons.laravel')
            </a>
        </el-tooltip>
        <el-tooltip content="Отображается с помощью Vue.js 2.5.9" placement="top">
            <a href="https://vuejs.org" target="_blank">
                <span>Визуализируется</span>
                @include('icons.vue')
            </a>
        </el-tooltip>
        <el-tooltip content="Доступно на GitHub" placement="top">
            <a href="https://github.com/railt" target="_blank">
                <span>Доступно на</span>
                @include('icons.github')
            </a>
        </el-tooltip>
        <el-tooltip content="Проверено Travis" placement="top">
            <a href="https://travis-ci.org/railt/railt" target="_blank">
                <span>Проверено</span>
                @include('icons.travis')
            </a>
        </el-tooltip>
    </template>
</app-footer>
