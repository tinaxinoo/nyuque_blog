<?php include "set.php"; ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title>yuque_blog</title>
    <link rel="shortcut icon" href="/icons/Kk.png">
    <link rel="stylesheet" href="css/mdui.min.css">
    <style>
        ::-webkit-scrollbar {
            display: none
        }

        a {
            color: black;
        }
    </style>
</head>

<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-auto mdui-loaded" id="p-d" style="overflow-y: scroll;">
    <header class="appbar mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">

            <a href="" class="mdui-typo-title">yuque</a>
            <div class="mdui-toolbar-spacer"></div>


        </div>
    </header>

    <div class="container p-card mdui-container">


        <div class="chapter">
            <div class="mdui-typo">

                <br>

            </div>
            <div class="mdui-typo-display-1">文章分类</div><br>

            <?php foreach ($repos_dic as $k => $v) {; ?>
                <a href="classify_list.php?namespace=<?php echo $k; ?>" class="mdui-typo-title" style="text-decoration: none;">
                    <li class="mdui-list-item">
                        <i class="mdui-list-item-avatar mdui-icon material-icons">folder</i>
                        <div class="mdui-list-item-content"><?php echo $v; ?></div>
                    </li>
                </a>
            <?php }; ?>

        </div>
    </div>

    <br>


</body>

</html>