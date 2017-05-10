<?php
class AccessControlServer implements IAccessControlServer
{
	private  $pdo;
	function __construct (PDO $pdo) {
		$this->pdo = $pdo;
	}
	public function hasAccess ($userId, $uri) {
		$sql = 'select * from accessrule left join resource on accessrule.resource_id=resource.id where accessrule.gouser_id=? and resource.uri=?;';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$userId,$uri]);
		if(empty($stmt->fetchAll ())) {
			return false;
		}
		else {
			return true;
		}
	}
	public function getWhitelist ($userId) {
		$sql = 'select uri from accessrule left join resource on resource.id = resource_id where gouser_id=? order by uri asc;';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$userId]);
		
		return $stmt->fetchAll(PDO::FETCH_COLUMN);
		
	}


}
