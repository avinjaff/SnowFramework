</div>
<footer>
	<div>
		<h3><?= $Translate->Label("همراهان ما"); ?></h3>
		<p><?php echo config::SPONSOR ?></p>
	</div>
	<div>
		<h3><?= $Translate->Label("یادداشت ها"); ?></h3>
		<ul>
        <?php
        $rows = (new Posts($conn))->ToList(0, 2, "Submit", "DESC", "WHERE Level = 3");
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
        $keywords = //file_get_contents('./keywords.txt', FILE_USE_INCLUDE_PATH);
        config::META_KEYWORDS;
        $keywords_arr = explode(',', $keywords);
        foreach ($keywords_arr as $keywordsArr) {
            echo '<a rel="search" href="search.php?Q=' . $keywordsArr . '"> ' . $keywordsArr . ' </a>' . ' ';
        }
        ?>
	</div>
</footer>
</div>
<?php $JSLINKS ?>
</body>
</html>