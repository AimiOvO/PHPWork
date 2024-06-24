<div id="rightcol" class="rightcol">
    <div class='userpanle'>
        <div class="writer">
            <div class="w-info">
                <ul>
                    <li class="w-headimg"><img src="<?= $logininfo['uimg']; ?>" /></li>
                    <li class="name"><?= $logininfo['name']; ?></li>
                    <li class="utype"><?= $logininfo['utype'] == 'admin' ? '管理' : ($logininfo['utype'] == 'guest' ? '游客' : '用户') ?></li>
                </ul>
            </div>
        </div>
        <?php
        if ($logininfo['islogin']) {
        ?>
            <div class="control">
                <a class="buttonlink" href="userindex.php">
                    <p>我的首页</p>
                </a>
            </div>
            <div class="control">
                <a class="buttonlink" href="web/web.php?info=publish">
                    <p>新闻投稿</p>
                </a>
            </div>
            <?php
            if ($logininfo['isAdmin']) {
            ?>
                <div class="control">
                    <a class="buttonlink" href="adminindex.php">
                        <p>投稿管理</p>
                    </a>
                </div>
            <?php
            }
            ?>
            <div class="control">
                <a class="buttonlink" href="web/web.php?info=exit">
                    <p>退出登录</p>
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="control">
                <a class="buttonlink" href="web/web.php?info=login">
                    <p>登录</p>
                </a>
            </div>

            <div class="control">
                <a class="buttonlink" href="web/web.php?info=register">
                    <p>注册</p>
                </a>
            </div>

        <?php
        }
        ?>
    </div>
    <div class="toTop">
        <div class="control">
            <a class="buttonlink" href="#header">
                <p>返回顶部</p>
            </a>
        </div>
    </div>
</div>