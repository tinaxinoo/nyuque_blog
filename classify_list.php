<?php include "repos.php"; ?>
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
    </style>
</head>

<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-auto mdui-loaded" id="p-d" style="overflow-y: scroll;">
    <header class="appbar mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">

            <a href="" class="mdui-typo-title">yuque-<?php echo $repos_dic[$_GET["namespace"]]; ?></a>
            <div class="mdui-toolbar-spacer"></div>


        </div>
    </header>

    <div class="container p-card mdui-container">


        <div class="chapter">
            <div class="mdui-typo">

                <br>

            </div>
            <div class="example">


                <div class="example-demo">
                    <div class="mdui-row">

                        <?php foreach ($doc_list_data as $k => $v) {
                            if ($v["title"][0] == "*") {
                                continue;
                            };
                        ?>
                            <div class="mdui-col-sm-6 mdui-col-md-4">

                                <a href="doc_view.php?namespace=<?php echo $v["namespace"]; ?>&id=<?php echo $v["slug"]; ?>" class="mdui-typo-title" style="text-decoration: none;">
                                    <div class="mdui-card">

                                        <div class="mdui-card-media">

                                            <div class="mdui-card-menu">

                                            </div>
                                        </div>
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title"><?php echo $v["title"]; ?></div>
                                            <div class="mdui-card-primary-subtitle"><?php echo date("Y-m-d H:i", strtotime($v["content_updated_at"])); ?></div>
                                        </div>


                                    </div>

                                </a>
                            </div>
                        <?php }; ?>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <br>


</body>

</html>