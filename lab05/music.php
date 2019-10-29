<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
        <?php
            $song_count = 10;
            $play_hours = 1;
        ?>
        <p>
            I love music.
            I have <?= $song_count ?> total songs,
            which is over <?= $play_hours ?> hours of music!
        </p>


		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

            <ol>
                <?php
                if(isset($_GET["newspage"])) {
                    $news_pages = $_GET["newspage"];
                } else {
                    $news_pages = 5;
                }
                for($i = 0; $i < $news_pages; $i++) { ?>
                    <li><a href="https://www.billboard.com/archive/article/<?= 201911 - $i?>">2019-<?= 11 - $i > 9 ? 11 - $i : "0" . (11 - $i)?></a></li>
                <?php } ?>
            </ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
                <ol>
                    <?php
                        $favorite_artists = file("./favorite.txt");
                        foreach($favorite_artists as $favorite_artist) { ?>
                            <li><a href = "http://en.wikipedia.org/wiki/<?= $favorite_artist?>"><?= $favorite_artist?></a></li>
                        <?php } ?>
                </ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
<!--        <div class = "section">-->
<!--            <h2>My Music and Playlists</h2>-->
<!--            <ul id = "musiclist">-->
<!--                --><?php
//                    $songs = glob("lab5/musicPHP/songs/*.mp3");
//                    foreach($songs as $song) { ?>
<!--                        <li class = "mp3item">--><?//= $song ?><!--</li>-->
<!--                   --><?php //}
//                ?>
<!--            </ul>-->
<!--        </div>-->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
                <?php
                    $songs = glob("lab5/musicPHP/songs/*.mp3");
                    $song_array = array();
                    foreach($songs as $song) {
                        $file_size = (int) (filesize($song) / 1024);
                        $song_array[$song] = $file_size;
                    }
                    arsort($song_array);
                    foreach($song_array as $key => $value) {
                        $song_name = explode("/", $key)[3];
                        ?>
                        <li class = "mp3item"><a href = "<?= $key ?>"><?= $song_name?></a> (<?= $value ?> KB)</li>
                    <?php } ?>

<!--				 Exercise 8: Playlists (Files)-->
                <?php
                    $song_lists = glob("lab5/musicPHP/songs/*.m3u");
                    $song_lists = array_reverse($song_lists);
                    foreach($song_lists as $song_list) {
                        ?>
                        <li class = "playlistitem"><?= explode("/", $song_list)[3] ?></li>
                        <ul>
                            <?php
                            $song_list_lists = file($song_list);
                            shuffle($song_list_lists);
                            foreach($song_list_lists as $song_list_list) {
                                if(strpos($song_list_list, "#") !== false) {
                                    continue;
                                } ?>
                                <li><?= $song_list_list ?></li>
                            <?php } ?>
                        </ul>
                   <?php }
                ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
