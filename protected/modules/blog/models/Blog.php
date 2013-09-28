<?php

/**
 * This is the model class for table "mod_doctors_blog".
 *
 * The followings are the available columns in table 'mod_doctors_blog':
 * @property string $id
 * @property string $blog_date
 * @property string $blog_name
 * @property string $blog_author
 * @property string $blog_content
 * @property integer $blog_image  - id of the image file
 * @property integer $lang_id
 * @property integer $order_by
 * @property integer $f_status
 * @property integer $f_deleted
 * @property string $created_dt
 * @property string $created_id
 * @property string $changed_dt
 * @property string $changed_id
 *
 * The followings are the available model relations:
 * @property BlogComment[] $blogComments
 */
class Blog extends CmsActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Blog the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'mod_doctors_blog';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('blog_name, blog_author, blog_content, blog_date, blog_image',  'required'),
            array('blog_image, lang_id, order_by, f_status, f_deleted', 'numerical', 'integerOnly'=>true),
            array('blog_name', 'length', 'max'=>256),
            array('blog_date', 'date', 'format'=>'yyyy-MM-dd'),
            //array('blog_image', 'isUrl'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, blog_name, blog_content, blog_image, lang_id, order_by, f_status, f_deleted', 'safe', 'on'=>'search'),
        );
    }

    public function isUrl($attribute, $params=NULL)
    {
        $img=$this->$attribute;
        $img_name=end(explode('/',$img));
        $img_path=Yii::getPathOfAlias('webroot') . '/upload/';
        $img_public_path=Yii::app()->baseUrl . '/upload/' . $img_name;

        if((($img !== $img_public_path ) || (!file_exists($img_path . $img_name))) && $img != null)
            $this->addError($attribute, 'File with this "Image Url" does not exist!');
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'blogComments' => array(self::HAS_MANY, 'BlogComment', 'blog_id'),

            'creator' => array(self::BELONGS_TO, 'User', 'created_id'),
            'editor' => array(self::BELONGS_TO, 'User', 'changed_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'blog_date'=>'Date',
            'blog_name' => 'Post Name',
            'blog_author' => 'Author',
            'blog_content' => 'Text',
            'blog_image' => 'Image',
            'lang_id' => 'Language',
            'order_by' => 'Order By',
            'f_status' => 'Status',
            'f_deleted' => 'Deleted',
            'created_dt' => 'Created On',
            'created_id' => 'Created By',
            'changed_dt' => 'Changed On',
            'changed_id' => 'Changed By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('blog_name',$this->blog_name,true);
        $criteria->compare('blog_content',$this->blog_content,true);
        $criteria->compare('blog_image',$this->blog_image,true);
        $criteria->compare('lang_id',$this->lang_id);
        $criteria->compare('order_by',$this->order_by);
        $criteria->compare('f_status',$this->f_status);
        $criteria->compare('f_deleted',0);
        $criteria->compare('created_dt',$this->created_dt,true);
        $criteria->compare('created_id',$this->created_id,true);
        $criteria->compare('changed_dt',$this->changed_dt,true);
        $criteria->compare('changed_id',$this->changed_id,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function getLangOptions()
    {
        return Language::model()->getLanguagesOptions();
    }

    public function getLangText()
    {
        $langId = $this->lang_id;
        if( $langId === null ) $langId = 0;
        if ( $langId != 0 )
        {
            $langType = $this->getLangOptions();
            return isset($langType[$langId]) ? $langType[$langId] : "unknown category ($langType[$langId])";
        }
        else
        {
            return 'No Languange Selected';
        }
    }

    public function getNumOfComments($index = null)
    {
        //$condition = '';
        if($index){
            $condition = 'f_deleted = 0  AND blog_id = :id';
        }
        else{
            $condition = 'f_deleted = 0 AND f_status=1 AND blog_id = :id';
        }
        $params['id']=$this->id;
        //$comments=array();
        $comments=BlogComment::model()->findAllByAttributes(array(), $condition, $params);
        if(count($comments) != 0)
            return count($comments);
    }

    public function getRightTextForComments()
    {
        if($this->getNumOfComments() == 0)
            return "No Comments";
        elseif($this->getNumOfComments() == 1)
            return "comment";
        else
            return "comments";
    }

    /**
     * @input string Blogs Name parsed for SEO
     * @return integer Blogs ID
     */
    public static function getIdFromSEO( $seo )
    {
        $ret = 0;
        $blogs = self::model()->findAll();
        foreach( $blogs as $item ){
            $parsedName = MyFunctions::parseForSEO( $item->blog_name );
            if( $parsedName == $seo ){
                $ret = $item->id;
                break;
            }
        }
        return $ret;
    }

    public function formatDate()
    {
        $date = date_create($this->blog_date);
        $formatDate = date_format($date, 'Y-m-d');
        return $formatDate;
    }

    public function getImagesOptions()
    {
        $images = array();
        $models = File::retrieveAll('', array('f_status'=>1, 'file_type'=>'image'));
        foreach($models as $model){
            array_push($images, array('id'=>$model->id, 'file_name'=>$model->file_name, 'group'=>$model->getCategoryText($model->cat_id)));
        }
        //MyFunctions::echoArray($images);
        $ret = CHtml::listData($images, 'id','file_name', 'group');
        return $ret;
    }

    public function getImageName()
    {
        $image = File::model()->findByPk($this->img_id);
        return $image->file_name.'.'.$image->file_ext;
    }

    public function makeBlogImage()
    {
        //$fileThumb = '';
        $file = File::model()->findByPk($this->blog_image);
        $fileSrc = $file->getFilePath();
        $thumbs = array(
            'blogList' => array('width'=>202, 'height' => 157 ),
            'blogHomePage'=> array('width'=>50, 'height'=> 55),

        );
        $tg = new ThumbGenerator($fileSrc, $thumbs);
        $tg->createThumbnails();
    }

    public function loadBlogImage()
    {
        $fileSrc = '';
        $file = File::model()->findByPk($this->blog_image);
        //MyFunctions::echoArray($file->file_seo);
        if ($file) {
            $fileSrc = $file->getFileThumbUrl(true, 'blogList', $file->id, true);
        }
        //MyFunctions::echoArray($fileSrc);
        return $fileSrc;
    }

    public function loadBlogImageHomePage()
    {
        $file = File::model()->findByPk($this->blog_image);
        $fileSrc = $file->getFileThumbUrl(true, 'blogHomePage', $file->id, true);
        return $fileSrc;
    }


    /**
     * @static
     * @param $text input text
     * @param $wordsNum number of words to return
     * @return string shorten text
     */
    /*public static function getShortText($text, $wordsNum)
    {
        if(!is_numeric($wordsNum) && !is_int($wordsNum)){
            $_limit = 10;
        }else{
            $_limit = $wordsNum;
        }
        $words = explode(" ", $text);
        if(count($words) < $_limit){
            return $text;
        }else{
            for($j=0; $j<=$_limit-1; $j++){
                $tmp[] = $words[$j];
            }
            $tmp[] = '...';
            $shortText = implode(" ", $tmp);
            //MyFunctions::echoArray($shortText);
        }
        return $shortText;
    }*/

    /**
     * @static
     * @param $text input text
     * @param $numOfChars number of characters to return
     * @return string shorten text
     */
    public static function getShortText($text, $numOfChars)
    {
        if(!is_numeric($numOfChars) && !is_int($numOfChars)){
            $_limit = 50;
        }else{
            $_limit = $numOfChars;
        }
        $chars = strlen($text);
        if($chars < $_limit){
            return $text;
        }else{
            $text1 = substr($text, 0, $_limit);
            $text2 = substr($text1, 0, strrpos($text1, " "));
            $textArray = array($text2, "...");
            $finalText = implode(" ", $textArray);
        }
        return $finalText;
    }
}
