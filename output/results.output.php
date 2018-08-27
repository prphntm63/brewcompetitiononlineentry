<?php
require(DB.'winners.db.php');
require(DB.'output_results.db.php');
require(DB.'score_count.db.php');

if ((isset($_SESSION['loginUsername'])) && ($_SESSION['userLevel'] <= 1)) {

    if (NHC) $base_url = "../";

	if (($go == "judging_scores") && ($action == "print"))  {
		if ($row_prefs['prefsWinnerMethod'] == "1") include (SECTIONS.'winners_category.sec.php');
		elseif ($row_prefs['prefsWinnerMethod'] == "2") include (SECTIONS.'winners_subcategory.sec.php');
		else include (SECTIONS.'winners.sec.php');
	}

	elseif (($go == "judging_scores_bos") && ($action == "print")) {
        include (SECTIONS.'bos.sec.php');
    }

    elseif (($go == "best") && ($action == "print") && (($_SESSION['prefsShowBestBrewer'] != 0) || ($_SESSION['prefsShowBestClub'] != 0)))  {
        include (SECTIONS.'bestbrewer.sec.php');
    }

    elseif (($go == "all") && ($action == "print")) {

        echo "<h1>".$label_bos."</h1>";
        include (SECTIONS.'bos.sec.php');

        if (($_SESSION['prefsShowBestBrewer'] != 0) || ($_SESSION['prefsShowBestClub'] != 0)) include (SECTIONS.'bestbrewer.sec.php');

        echo "<h1>".$label_winners."</h1>";
        if ($row_prefs['prefsWinnerMethod'] == "1") include (SECTIONS.'winners_category.sec.php');
        elseif ($row_prefs['prefsWinnerMethod'] == "2") include (SECTIONS.'winners_subcategory.sec.php');
        else include (SECTIONS.'winners.sec.php');

    }

}

?>
