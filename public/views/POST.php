<?php
if ($row['Type'] == "QUST")
{
    echo '<article>';
    echo '<h3><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
    echo '</article>';
}
else
switch ($row["Level"])
{
    case "view":
        echo '<article>';
        echo '<img src="download.php?id=' . $row["ID"] . '" alt="' . $row["Title"] . '" />';
        echo '<a class="attachment" href="download.php?id=' . $row["ID"] . '">' . $Translate->Label("دانلود پیوست") . '</a>';
        include BASEPATH . 'public/helper/post_edit.php';
        echo '<h1>' . $row['Title'] . '</h1>';
        echo $Parsedown->text($row['Body']);
        echo '</article>';
        $rows=[];
        $rows = $PostDetail->Select(-1, -1, "Submit", "DESC", "WHERE `Type` = 'KWRD' AND `RefrenceId`='" . Functionalities::IfExistsIndexInArray($row, 'Id') . "'");
        echo '<div class="keywords">';
        foreach ($rows as $row) {
            include BASEPATH . 'public/views/render.php';
        }
        echo '</div>';
        include BASEPATH . 'public/helper/post_comment.php';
        $rows=[];
        $rows = $PostDetail->Select(-1, -1, "Submit", "DESC", "WHERE `Type` = 'COMT' AND `RefrenceId`='" . Functionalities::IfExistsIndexInArray($row, 'Id') . "'");
        echo '<div class="comments">';
        foreach ($rows as $row) {
            include ('views/render.php');
        }
        echo '</div>';
        break;
    case "3":
        echo '<li><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">';
        echo '  <h1>' . $row['Title'] . '</h1><br>';
        echo '  <span>' . Text::GenerateAbstractForPost($Parsedown->text($row['Body']), 120) . '</span>';
        echo '</a></li>';
        break;
    case "1":
        echo '<a href="' . $BASEURL . 'view/' . $row['Language'] . '/' . $row['MasterID'] . '">';
        echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" >';
        echo '<h2>' . $row['Title'] . '</h2>';
        echo '<p>' . Text::GenerateAbstractForPost($Parsedown->text($row['Body']), 480)  . '</p>';
        echo '</a>';
        break;
    case "2":
        echo '<article>';
        echo $row['Submit'] . '<br>';
        echo '<div>';
        echo '<h4><b>' . $row['Username'] . '</b></h4>';
        echo '<h2><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
        echo Text::GenerateAbstractForPost($Parsedown->text($row['Body']), 960, "<img>");
        echo '</div>';
        echo '</article>';
        break;
    default:
        break;
}
?>
