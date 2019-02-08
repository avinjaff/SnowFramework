</div>
<footer>
	<div>
		<h3><?php $Translate->Label("همراهان ما"); ?></h3>
		<p><?php echo config::SPONSOR ?></p>
	</div>
	<div>
		<h3><?= $Translate->Label("یادداشت ها"); ?></h3>
		<ul>
        <?php
        $rows = $PostDetail->Select(0, 2, "Submit", "DESC", "WHERE Level = 3");
        foreach ($rows as $row) {
            if ($row['Level'] != '3')
                continue;
            $_GET['masterid'] = $row['MasterID'];
            $_GET["level"] = '3';
            $_GET["type"] = 'POST';
            include ('views/render.php');
        }
        ?>
        </ul>
	</div>
	<div>
		<h3><?= $Translate->Label("واژگان کلیدی"); ?></h3>
        <?php
        $keywords = config::META_KEYWORDS;
        $keywords_arr = explode(',', $keywords);
        foreach ($keywords_arr as $keywordsArr) {
            echo '<a rel="search" href="search.php?Q=' . $keywordsArr . '"> ' . $keywordsArr . ' </a>' . ' ';
        }
        ?>
	</div>
</footer>
<?php $JSLINKS ?>
</body>
</html>