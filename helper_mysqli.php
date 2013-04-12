<?php
class Helper_Mysqli{
	/**
	 *  句柄对象
	 * @var string
	 */
	private $handle = '';

	/**
	 * [__construct description]
	 * @param string $hostname 主机地址
	 * @param string $username 登录名
	 * @param string $password 密码
	 * @param string $database 数据库
	 */
	public function __construct($hostname,$username,$password,$database){
		$this->handle = new mysqli($hostname,$username,$password,$database);
	}

	/**
	 * 设置字符编码
	 * @param string $string 字符编码
	 */
	public function setCharset($string){
		$this->handle->set_charset($string);
	}

	/**
	 * 对象的字符集
	 * @return [type] [description]
	 */
	public function getCharset(){
		return $this->handle->get_charset();
	}

	/**
	 * 整型的Mysql服务端版本信息
	 * @return string 版本号
	 */
	public function getServerVersion(){
		return $this->handle->server_version;
	}

	/**
	 * 使用的Mysql协议的版本信息
	 * @return [type] [description]
	 */
	public function getProtocolVersion(){
		return $this->handle->protocol_version;
	}

	/**
	 * Mysql服务端版本的信息
	 * @return [type] [description]
	 */
	public function getServerInfo(){
		return $this->handle->server_info;
	}

	/**
	 * 获取前一个Mysql操作的受影响行数
	 * @return [type] [description]
	 */
	public function getAffectedRows(){
		return $this->handle->affected_rows;
	}

	/**
	 * 字符串类型的Mysql客户端版本信息
	 * @return [type] [description]
	 */
	public function getClientInfo(){
		return $this->handle->client_info;
	}

	/**
	 * 整型的Mysql客户端版本信息
	 * @return [type] [description]
	 */
	public function getClientVersion(){
		return $this->handle->client_version;
	}

	/**
	 * 最后一次连接调用的错误代码
	 * @return [type] [description]
	 */
	public function getConnectErrno(){
		return $this->handle->connect_errno;
	}

	/**
	 * 最后一次连接调用的错误代码(一个字符串描述)
	 * @return [type] [description]
	 */
	public function getConnectError(){
		return $this->handle->connect_error;
	}

	/**
	 * 最近的函数调用产生的错误代码
	 * @return [type] [description]
	 */
	public function getErrno(){
		return $this->handle->errno;
	}

	/**
	 * 最近一次函数调用产生的错误代码(字符串描述)
	 * @return [type] [description]
	 */
	public function getError(){
		return $this->handle->error;
	}

	/**
	 * 最近一次查询获取到的列的数目
	 * @return [type] [description]
	 */
	public function getFieldCount(){
		return $this->handle->field_count;
	}

	/**
	 * 最近一次执行的查询的检索信息
	 * @return [type] [description]
	 */
	public function getInfo(){
		return $this->handle->info;
	}

	/**
	 * 最后一次查询自动生成并使用的id
	 * @return [type] [description]
	 */
	public function getInsertId(){
		return $this->handle->insert_id;
	}

	/**
	 * 前一个Mysql操作的SQLSTATE错误
	 * @return [type] [description]
	 */
	public function getSqlState(){
		return $this->handle->sqlstate;
	}

	/**
	 * 给定链接最后一次查询的警告数量
	 * @return [type] [description]
	 */
	public function getWarningCount(){
		return $this->handle->warning_count;
	}

	/**
	 * 执行一个mysql查询
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function realQuery($sql){
		return $this->handle->real_query($sql);
	}

	/**
	 * 在数据库上执行一个查询
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function query($sql){
		return $this->handle->query($sql);
	}

	public function __destruct(){
		$this->handle->close();
	}
}
?>