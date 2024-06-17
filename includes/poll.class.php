<?
class poll {
            
            private $db      = false;
            private $pollTbl = 'polls';
            private $optTbl  = 'poll_options';
            private $voteTbl = 'poll_votes';
            
            public function __construct(){
                if(!$this->db){ 
                    require 'dbh.inc.php';
                    if($conn->connect_error){
                        die("Failed to connect with MySQL: " . $conn->connect_error);
                    }
                    else{
                        $this->db = $conn;
                    }
                }
            }
            
            private function getQuery($sql, $types = '', $params = [], $returnType = ''){
                $stmt = $this->db->prepare($sql);
                if ($stmt && !empty($params)) {
                    $stmt->bind_param($types, ...$params);
                }
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result) {
                    switch($returnType){
                        case 'count':
                            $data = $result->num_rows;
                            break;
                        case 'single':
                            $data = $result->fetch_assoc();
                            break;
                        default:
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $data[] = $row;
                                }
                            }
                    }
                }
                $stmt->close();
                return !empty($data)?$data:false;
            }
            
            public function getPolls($i, $pollType = 'single'){
                $pollData = array();
                $sql = "SELECT * FROM ".$this->pollTbl." WHERE status = '1' AND id = ? ORDER BY created DESC";
                $pollResult = $this->getQuery($sql, 'i', [$i], $pollType);
                
                if(!empty($pollResult)){
                    if($pollType == 'single'){
                        $pollData['poll'] = $pollResult;
                        $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ? AND status = '1'";
                        $optionResult = $this->getQuery($sql2, 'i', [$pollResult['id']]);
                        $pollData['options'] = $optionResult;
                    }else{
                        $i = 0;
                        foreach($pollResult as $prow){
                            $pollData[$i]['poll'] = $prow;
                            $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ? AND status = '1'";
                            $optionResult = $this->getQuery($sql2, 'i', [$prow['id']]);
                            $pollData[$i]['options'] = $optionResult;
                        }
                    }

            }
        }
        return !empty($data)?$data:false;
    }
    

    public function getPolls($i, $pollType = 'single'){
        $pollData = array();
        $sql = "SELECT * FROM ".$this->pollTbl." WHERE status = '1' AND idPoll=".$i." ORDER BY created DESC";
        $pollResult = $this->getQuery($sql, $pollType);
        
        if(!empty($pollResult)){
            if($pollType == 'single'){
                $pollData['poll'] = $pollResult;
                $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ".$pollResult['id']." AND status = '1'";
                $optionResult = $this->getQuery($sql2);
                $pollData['options'] = $optionResult;
            }else{
                $i = 0;
                foreach($pollResult as $prow){
                    $pollData[$i]['poll'] = $prow;
                    $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ".$prow['id']." AND status = '1'";
                    $optionResult = $this->getQuery($sql2);
                    $pollData[$i]['options'] = $optionResult;

                }
                return !empty($pollData)?$pollData:false;
            }
            
            public function vote($data = array()){
                if(!isset($data['poll_id']) || !isset($data['poll_option_id']) || !isset($data['poll_vote_by'])){
                    return false;
                }
                else{
                    $sql = "SELECT * FROM ".$this->voteTbl." WHERE vote_by = ? AND poll_id = ?";
                    $preVote = $this->getQuery($sql, 'ii', [$data['poll_vote_by'], $data['poll_id']], 'count');
                    if($preVote > 0){
                        $query = "UPDATE ".$this->voteTbl." SET poll_option_id = ? WHERE poll_id = ? AND vote_by = ?";
                        $stmt = $this->db->prepare($query);
                        $stmt->bind_param('iii', $data['poll_option_id'], $data['poll_id'], $data['poll_vote_by']);
                        $update = $stmt->execute();
                        $stmt->close();
                    } else {
                        $query = "INSERT INTO ".$this->voteTbl." (poll_id, poll_option_id, vote_by) VALUES (?, ?, ?)";
                        $stmt = $this->db->prepare($query);
                        $stmt->bind_param('iii', $data['poll_id'], $data['poll_option_id'], $data['poll_vote_by']);
                        $insert = $stmt->execute();
                        $stmt->close();
                    }
                    return true;
                }
            }
            return true;
        }
    }

    
    public function getResult($pollID){
        $resultData = array();
        if(!empty($pollID)){
            $sql = "SELECT p.subject, count(v.idPollvotes) as total_votes  FROM ".$this->voteTbl." as v LEFT JOIN ".$this->pollTbl." as p ON p.idPoll = v.poll_id WHERE poll_id = ".$pollID;
            $pollResult = $this->getQuery($sql,'single');
            if(!empty($pollResult)){
                $resultData['poll'] = $pollResult['subject'];
                $resultData['total_votes'] = $pollResult['total_votes'];
                
                $sql2 = "SELECT o.idPolloptions, o.name, ( "
                        . "SELECT COUNT(*) "
                        . "from " . $this->voteTbl . " v "
                        . "WHERE v.poll_id = " . $pollID . " "
                        . "AND v.poll_option_id = o.idPolloptions "
                        . ") as vote_count "
                        . "FROM " . $this->optTbl . " o "
                        . "WHERE o.poll_id = " . $pollID . ";";
                $optResult = $this->getQuery($sql2);
                if(!empty($optResult)){
                    foreach($optResult as $orow){
                        $resultData['options'][$orow['name']] = $orow['vote_count']; 

                    }
                }
                return !empty($resultData)?$resultData:false;
            }
        }
?>        