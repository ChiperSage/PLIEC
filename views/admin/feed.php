<?php  echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:atom="http://www.w3.org/2005/Atom"
  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
  xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" xmlns:media="http://search.yahoo.com/mrss/"
  >

<channel>
  <title>example.com</title>
  <atom:link href="https://example.com/feed" rel="self" type="application/rss" />
  
  <link>https://example.com</link>
  <description>Just Another Example Site</description>
  <!-- <lastBuildDate>Tue, 21 Jul 2015 19:31:01 +0000</lastBuildDate> -->
  <language>id</language>
<!--   <sy:updatePeriod>hourly</sy:updatePeriod>
  <sy:updateFrequency>1</sy:updateFrequency>
  <generator>http://portalsatu.com/</generator>
 <cloud domain='beta.portalsatu.com' port='80' path='/?rsscloud=notify' registerProcedure='' protocol='http-post' />
<image>
    <url>https://s2.wp.com/i/buttonw-com.png</url>
    <title>Redha Blog</title>
    <link>https://redhablog.wordpress.com</link>
  </image>
 -->
  <!-- <atom:link rel="search" type="application/opensearchdescription+xml" href="https://redhablog.wordpress.com/osd.xml" title="Redha Blog" />
  <atom:link rel='hub' href='https://redhablog.wordpress.com/?pushpress=hub'/>
 -->
<?php foreach ($posts as $value) { ?>

  <item>
    <title><?php echo $value->Article_Name ?></title>
    <link><?php echo base_url('read/'.$value->Article_Slug.'-'.$value->Article_Id) ?></link>
    <pubDate><?php echo $value->Article_DateCreate ?></pubDate>
    
    <description><![CDATA[ <?php echo $value->Article_Summary; ?> ]]></description>

  </item>

<?php } ?>

    </channel>
</rss>
