<?php print '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title><?php echo $title; ?></title>
		<description><?php echo $description; ?></description>
		<link><?php bloginfo('url'); ?></link>
		<lastBuildDate><?php print date("D, d M Y H:i:s O"); ?></lastBuildDate>
		<pubDate><?php print date("r"); ?></pubDate>
		<atom:link href="<?php print get_bloginfo('url'); ?>/feed.rss" rel="self" type="application/rss+xml" />
		<ttl>1800</ttl>

		<?php foreach($pageItems as $item): ?>
		<item>
            <title><?php echo get_the_title($item); ?></title>
			<link><?php echo get_the_title($item); ?></link>
			<pubDate><?php print date('r', strtotime($item->publish_date)); ?></pubDate>
			<guid isPermaLink="false"><?php print $item->guid; ?></guid>
			<description><?php print $item->excerpt(400, $item->metadata('job_description')); ?></description>
		</item>
		<?php endforeach; ?>

	</channel>
</rss>