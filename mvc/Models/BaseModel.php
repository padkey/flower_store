<?php
class BaseModel extends Database{
    protected $connect;
    const MODEL_FOLDER_NAME = 'Models';
    public function __construct(){
        $connect = $this->connect();
    }
    //lấy tất cả dữ liệucủa product trong bảng
    public function All($table, $select=['*'],$orderBys=['product_name'=>'asc'],$limit=12)
    {
        //chuyển từ mảng sang chuỗi
     $columns= implode(',',$select);
        $orderByString = implode(' ',$orderBys);
        if($orderByString){
            $sql="SELECT ${columns} FROM ${table} ORDER BY ${orderByString} LIMIT ${limit}";
        }else{
            $sql="SELECT ${columns} FROM ${table}  LIMIT ${limit}";
        }
        // thực hiện query
        $query = $this->_query($sql);
        $data = [];
        //lấy ra giá trị trong bảng product bỏ vào $data
        while($row = mysqli_fetch_assoc($query)){
            //array_push là hàm thêm phần tử cào mảng muốn thêm
            array_push($data,$row);

        }
        return $data;
    }
    //Tìm id id cho product
    public function find($table,$id){
    $sql="SELECT * FROM ${table} WHERE product_id = ${id} LIMIT 1";
    //thực hiện query

        $query =$this->_query($sql);
        //trả về một mảng kết hợp
    return mysqli_fetch_assoc($query);
    }
    //tìm id category của product
    public function findCategoryId($table,$id){
        $sql="SELECT category_id FROM ${table} WHERE product_id = ${id}";
        //thực hiện query
        $query =$this->_query($sql);
        //trả về một mảng kết hợp
        return mysqli_fetch_assoc($query);
    }

    public function getByQuery($sql)
    {

        $query = $this-> _query($sql);
        $data = [];
        while($row = mysqli_fetch_assoc($query)){

            array_push($data,$row);
        }
        return $data;
    }
    public function QueryOneArray($sql)
    {

        $query = $this-> _query($sql);

        //trả về một mảng kết hợp
        return mysqli_fetch_assoc($query);
    }
    public function insertOrder($sql){
        $this->_query($sql);
    }

    public function insertData($sql){
        $this->_query($sql);
    }
    //thêm dữ liệu vào bảng
    public function create($table,$data=[]){
        //array_keys là hàm chuển key thành mảng sau đó dùng implode(',',$columns); để chuyển mảng thành chuỗi
        $column = implode(',',array_keys($data));

        // hàm này là thêm dấu nháy ' ' cho giá trị trong $data , làm cái này mới đungs cú pháp
        $newValues = array_map(function($value){
            return "'" . $value ."'";
        },array_values($data));
        //chuyển mảng thành chuỗi
        $newValues = implode(',',$newValues);
        $sql= "INSERT INTO ${table}(${column}) VALUES(${newValues}) ";

        // thực hiện insert vào dữ liệu
        $this->_query($sql);
    }

    //update dữ liệu vào bảng
    public function update($table,$id,$data){
        $dataSets = [];
        foreach($data as $key => $value){
            //array_push dùng để thêm phần tử vào mảng
            array_push($dataSets,"${key} = '" . $value ."'");
        }
        //chuyển mảng thành chuỗi xong cho vào câu truy vấn
        $dataSetString = implode(',',$dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}
        WHERE category_id = ${id}";
        //thực hiên câu query
        $this->_query($sql);
    }
    public function updateDataCart($sql){
        $this->_query($sql);
    }
    //xóa dữ liệu của bảng
    public function delete($table,$id){
        $sql ="DELETE FROM ${table} WHERE product_id = ${id}";
        $this->_query($sql);
    }
    public function AdminDelete($tableName,$idName,$id){
        $sql ="DELETE FROM ${tableName} WHERE ${idName} = ${id}";
        $this->_query($sql);
    }

    //thực hiện truy vấn với $sql
    private function _query($sql){
       return mysqli_query($this->connect(),$sql);
    }

    protected function loadModel($modelPath){
        require(self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php');
    }
}
?>