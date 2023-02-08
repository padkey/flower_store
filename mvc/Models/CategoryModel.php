<?php
class CategoryModel extends BaseModel
{
    const TABLE_CATEGORY = 'category';
    const TABLE_PRODUCT ='product';
    const ROOT_CATEGORY = 0;

  /*  public function getAll($select = ['*'],$orderBys=[],$limit=105){
        return $this->all(Self::TABLE,$select,$orderBys,$limit);
    }*/
    public function updateData($id,$data){
        $this->update(Self::TABLE,$id,$data);
    }
    public function findById($id){
        return $this->find(self::TABLE_CATEGORY,$id);
    }

    //lấy các loại con và loại cha
    public function getCategoryForMenu(){
        $rootCategories = $this->getAllRootCategory();
        $menu = [];
        foreach ($rootCategories as $category)
        {
            //lấy ra id của parent
            $categoryIdOfRoot = $category['category_id'];
            //từ id parent tìm ra các child có parent_id bằng với id của nó
            $listChildCategory = $this->getChildCategory($categoryIdOfRoot);
            //tạo một mảng chứa list child
            $category['list_child'] = $listChildCategory;

            $menu[] = $category;
        }
        return $menu;
    }
    //lấy loại cha
    private function getAllRootCategory()
    {
        $sql = "SELECT * FROM  " .Self::TABLE_CATEGORY. " WHERE parent_id = ".self::ROOT_CATEGORY;
        return $this->getByQuery($sql);
    }
    //lấy loại con
    private function getChildCategory($categoryIdOfRoot)
    {

        $sql = "SELECT * FROM  " .Self::TABLE_CATEGORY. " WHERE parent_id = ${categoryIdOfRoot}";

        return $this->getByQuery($sql);
    }

    //lấy danh sách sản phẩm từ category
    public function getAllProductByCategoryId($id){
        $sql = "SELECT * FROM ".Self::TABLE_PRODUCT. " WHERE category_id = ${id}";
        $listCategory = $this->getByQuery($sql);

        return $listCategory;
    }

    //hủy hoại
    public function destroy($id){
        $this->delete(self::TABLE,$id);
    }

    //admin
    public function getAll($id){
        $sql = "SELECT * FROM ".self::TABLE_CATEGORY." WHERE parent_id = ${id}";
        return $this->getByQuery($sql);
    }
        public function getAllChild(){
        //select tất cả category có parent_id khác 0
            $sql = "SELECT * FROM ".self::TABLE_CATEGORY." WHERE parent_id != 0";
            return $this->getByQuery($sql);
        }

    public function AdminDeleteCategory($tableCategoryName,$idName,$id,$tableProName)
    {
        //xóa trong bảng product trước
        $sql1 = "DELETE FROM ${tableProName} WHERE ${idName} = ${id}";
        $this->QueryOneArray($sql1);
        //xóa trong bảng cate
        $sql2 = "DELETE FROM ${tableCategoryName} WHERE ${idName} = ${id}";
        $this->QueryOneArray($sql2);
    }

    public function save($name,$parent_id){
        $sql = "INSERT INTO ".self::TABLE_CATEGORY." (category_name,parent_id) VALUES ('${name}',${parent_id})";
        $this->QueryOneArray($sql);
    }

}