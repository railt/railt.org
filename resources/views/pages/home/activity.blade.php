<?php /** @var \App\Entity\Issue[] $issues */ ?>

<el-card class="recent-activity">
    <div slot="header" class="clearfix">
        <h3>Recent Activity</h3>
    </div>

    @foreach($issues as $issue)
    <a class="issue" href="{{ $issue->getUrl() }}" target="_blank">
        <header>
            <span class="title">
                <span class="number">#{{ $issue->getNumber() }}</span>
                {{ $issue->getTitle() }}
            </span>
        </header>

        <div class="body">
            <el-tooltip effect="dark" content="{{ '@' . $issue->getAuthor()->getLogin() }}" placement="bottom">
                <img src="{{ $issue->getAuthor()->getAvatar() }}" alt="{{ $issue->getAuthor()->getLogin() }}" />
            </el-tooltip>

            <span class="el-icon el-icon-arrow-right"></span>

            @foreach($issue->getLabels() as $label)
                <el-tag size="medium" type="info">{{ $label }}</el-tag>
            @endforeach
        </div>
    </a>
    @endforeach

    <footer class="activity-footer">
        <a class="el-button el-button--primary is-plain"
           href="https://github.com/railt/railt/issues"
           target="_blank">К списку</a>
    </footer>
</el-card>
