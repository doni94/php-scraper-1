<table style="width:70%">
	<thead bgcolor="#eeeeee" align="center">
		<tr>
			<th>NO</th>
			<th>SOURCE</th>
			<th>TITLE</th>
			<th>DATE</th>

		</tr>
	</thead>
	<tbody>

	<?php

				//include "proxy.php";

		$dom = new DOMDocument();
		$source_array = array('Detik.com','Viva.co.id','Kompas.com', 'Merdeka.com');
		$link_sitemap    = array('https://finance.detik.com/energi/sitemap_news.xml','https://www.viva.co.id/sitemap/news/news-sitemap.xml','https://news.kompas.com/news/sitemap.xml','https://www.merdeka.com/sitemap.xml');


		$no = 0;
		foreach ($link_sitemap as $index => $link_value) {

			$source = $source_array[$index];

					//include "proxy.php";

			$dom->load($link_value);

			$url = $dom->getElementsByTagName('url');
			$news = $dom->getElementsByTagName('news');

			$i = 1;
			foreach ($url as $key => $u) {
				$no++;

				$urlnya =  $u->childNodes->item(1)->nodeValue;

				$n = $news[$key];

				$date =  $n->childNodes->item(3)->nodeValue;
				$title =  $n->childNodes->item(5)->nodeValue;

				echo '
				<tr>

				<td>' . $no . '</td> 
				<td>' . $source . '</td>           
				<td>
				<a target="_blank" href="' . $urlnya . '">' . $title . '</a>
				</td>
				<td>' . $date . '</td>

				';

				echo '
				</td>

				</tr>
				';

				if ($i++ == 10) break;
			}
		}

	?>

	</tbody>

</table>