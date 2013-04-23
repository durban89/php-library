<?php
class Rss extends CController{
   	//public
   	var $rss_ver = "2.0";
   	var $channel_title = '';
   	var $channel_link = '';
   	var $channel_description = '';
   	var $language = 'zh_CN';
   	var $copyright = '';
   	var $webMaster = '';
   	var $pubDate = '';
   	var $lastBuildDate = '';
   	var $generator = 'GoWhich RSS Generator';
   	var $content = '';
   	var $items = array();

   	/**
     	* 添加基本信息
	* @param string $title
	* @param string $link
	* @param string $description
	*/
   	public function __construct($title, $link, $description) {
       	$this->channel_title = $title;
       	$this->channel_link = $link;
       	$this->channel_description = $description;
       	$this->pubDate = Date('Y-m-d H:i:s',time());
       	$this->lastBuildDate = Date('Y-m-d H:i:s',time());
   	}

   	/**
     	* 添加一个节点
     	* @param string $title
     	* @param string $link
    	* @param string $description
     	* @param date $pubDate
     	*/
   	public function addItem($title, $link, $description ,$pubDate) {
       	$this->items[] = array('title' => $title ,
                        'link' => $link,
                        'descrīption' => $description,
                        'pubDate' => $pubDate);
   	}

   	/**
     	* 构建xml元素
     	*/
	public function buildRSS() {
       	$s = <<<RSS
<?xml version='1.0' encoding='utf-8'?>\n
<rss version="2.0">\n
RSS;

       	// start channel
       	$s .= "<channel>\n";
       	$s .= "<title><![CDATA[{$this->channel_title}]]></title>\n";
       	$s .= "<link><![CDATA[{$this->channel_link}]]></link>\n";
       	$s .= "<descrīption><![CDATA[{$this->channel_description}]]></descrīption>\n";
       	$s .= "<language>{$this->language}</language>\n";
       	if (!empty($this->copyright)) {
        	$s .= "<copyright><![CDATA[{$this->copyright}]]></copyright>\n";
       	}
       	if (!empty($this->webMaster)) {
      		$s .= "<webMaster><![CDATA[{$this->webMaster}]]></webMaster>\n";
       	}
       	if (!empty($this->pubDate)) {
       		$s .= "<pubDate>{$this->pubDate}</pubDate>\n";
       	}
       	if (!empty($this->lastBuildDate)) {
          	$s .= "<lastBuildDate>{$this->lastBuildDate}</lastBuildDate>\n";
       	}
       	if (!empty($this->generator)) {
          	$s .= "<generator>{$this->generator}</generator>\n";
       	}
       	// start items
       	for ($i=0;$i<count($this->items);$i++) {
           	$s .= "<item>\n";
           	$s .= "<title><![CDATA[{$this->items[$i]['title']}]]></title>\n";
           	$s .= "<link><![CDATA[{$this->items[$i]['link']}]]></link>\n";
           	$s .= "<descrīption><![CDATA[{$this->items[$i]['descrīption']}]]></descrīption>\n";
           	$s .= "<pubDate>{$this->items[$i]['pubDate']}</pubDate>\n";
           	$s .= "</item>\n";
       	}
      	// close channel
      	$s .= "</channel>\n</rss>";
      	$this->content = $s;
   	}

	/**
	 * 输出rss内容
	 */
	function show() {
    	if (empty($this->content)) {
    		$this->buildRSS();
    	}
       	return $this->content;
	}

	/**
	 * 设置版权
	 * @param unknown $copyright
	 */
	public function setCopyRight($copyright){
		$this->copyright = $copyright;
	}

	/**
	 * 设置管理员
	 * @param unknown $master
	 */
	public function setWebMaster($master){
		$this->webMaster = $master;
	}

	/**
	 * 设置发布时间
	 * @param date $date
	 */
	public function setpubDate($date){
		$this->pubDate = $date;
	}

	/**
	 * 设置建立时间
	 * @param unknown $date
	 */
	public function setLastBuildDate($date){
		$this->lastBuildDate = $date;
	}

	/**
	 * 将rss保存为文件
	 * @param String $fname
	 * @return boolean
	 */
   	function saveToFile($fname) {
       	$handle = fopen($fname, 'wb');
       	if ($handle === false){
       		return false;
       	}
       	fwrite($handle, $this->content);
       	fclose($handle);
   	}

   	/**
   	 * 获取文件的内容
   	 * @param String $fname
   	 * @return boolean
   	 */
   	function getFile($fname) {
       	$handle = fopen($fname, 'r');
       	if ($handle === false){
       		return false;
       	}
    	while(!feof($handle)){
            echo fgets($handle);
    	}
       	fclose($handle);
   	}
}
?>
