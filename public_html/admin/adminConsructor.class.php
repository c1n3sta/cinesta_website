<?
/* --- // --- */
abstract class PageTemplate{
	public $form;
	public  $table;
	public abstract function getSql();
	function __construct($table){
		$this->table=$table;
		$this->form=array();
	}
}
class Page extends PageTemplate{
	public function getSql(){
		$query="create table IF NOT EXISTS `".$this->table."`(
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT";
		foreach($this->form as $formi){
			switch($formi->type){
				case 'img':
				case 'select':
				case 'gallery':
				case 'url':
				case 'file':
				case 'text':
					$query.=", `".$formi->name."` Varchar(255) NOT NULL";
					break;
				case 'textEditor':		
					$query.=", `".$formi->name."` text NOT NULL";
					break;
				case 'checkBox':		
						$query.=", `".$formi->name."` int(1) NOT NULL DEFAULT '1'";
						break;
				case 'rate':
						$query.=", `".$formi->name."` int(11) unsigned NOT NULL DEFAULT '0'";
						break;
				case 'int':
						$query.=", `".$formi->name."` int(11) NOT NULL";
						break;	
				case 'date':
						$query.=", `".$formi->name."` int(11) NOT NULL";
						break;
			}
		}
		$query.="
			, PRIMARY KEY (`id`)
			)ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
		$query.="Insert into `".$this->table."` VALUES ()";
		return $query;
	}
}
class PageList  extends PageTemplate{
	public $id;
	public function getSql(){
			$query="create table IF NOT EXISTS `".$this->table."`(
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT ";
			foreach($this->form as $formi){
				switch($formi->type){
					case 'img':
					case 'select':
					case 'gallery':
					case 'url':
					case 'file':
					case 'text':
						$query.=", `".$formi->name."` Varchar(255) NOT NULL";
						break;
					case 'textarea':			
					case 'textEditor':		
						$query.=", `".$formi->name."` text NOT NULL";
						break;
					case 'rate':
						$query.=", `".$formi->name."` int(11) unsigned NOT NULL DEFAULT '0'";
						break;
					case 'int':
						$query.=", `".$formi->name."` int(11) NOT NULL";
						break;	
					case 'date':
						$query.=", `".$formi->name."` int(11) NOT NULL";
						break;
					case 'checkBox':		
						$query.=", `".$formi->name."` int(1) NOT NULL DEFAULT '1'";
						break;
				}
			}
			$query.="
				, PRIMARY KEY (`id`)
				)ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
			return $query;
		}
}
abstract class FormBox{
	public $name;
	public $type;
	public $title;
	public $inSearch;
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="text";
			$this->inSearch = $inSearch;
	}
	public abstract function print_element($value='');
	public abstract function print_inSearch($value='');
	public abstract function get($value);
}
class textType extends FormBox{
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			<input type='text' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class textareaType extends FormBox{
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="textarea";
			$this->inSearch = $inSearch;
			$this->translit=$translit;
	}
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			<textarea name='".$this->name."' class='input' style='height:400px'/>".$value."</textarea>
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return adataprocessing($value);
	}
}
class intType extends FormBox{
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="int";
			$this->inSearch = $inSearch;
			$this->translit=$translit;
	}
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			<input type='text' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class urlType extends FormBox{
	public $translit;
	function __construct($name,$title,$translit,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="url";
			$this->inSearch = $inSearch;
			$this->translit=$translit;
	}
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			<input type='text' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class rateType extends FormBox{
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="rate";
			$this->inSearch = $inSearch;
			$this->translit=$translit;
	}
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			<input type='text' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class dateType extends FormBox{
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="date";
			$this->inSearch = $inSearch;
	}
	public function print_element($value=0){
		return "<div class='formbox'>
			".$this->title.":<br />
			".date("Y.m.d H:i",$value)."
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>".date("Y.m.d H:i",$value)."</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class selectType extends FormBox{
	public $options;
	public $key;
	function __construct($name,$title,$options,$inSearch=false,$key=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="select";
			$this->options=$options;
			$this->inSearch = $inSearch;
			$this->key=$key;
	}
	public function print_element($value=''){
		$return="<div class='formbox'>
			".$this->title.":<br />
			<select type='text' name='".$this->name."' class='input' />";
			$i=0;
			foreach ($this->options as $val) {
				$ch= (($this->key[$i]==$value || $value==$val) ? ' selected' : '');
				$valik=$val;
				if($this->key) $valik=$this->key[$i];
				$return.="<option value='$valik' $ch>$val</option>";
				$i++;
			}
		$return.="</select></div>";
		return $return;
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class textEditorType extends FormBox{
	function __construct($name,$title,$inSearch=false){
			$this->name=$name;
			$this->title=$title;
			$this->type="textEditor";
			$this->inSearch = $inSearch;
	}
	public function print_element($value=''){
		return "<div class='formbox'>
			".$this->title.":<br />
			".fckeditor($this->name, $value, '400', '705', 'Default')."
		</div>";
	}
	public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>$value</div>";
		return $return;
	}
	public function get($value){
		return adataprocessing($value);
	}
}
class checkType extends FormBox{
	function __construct($name,$title,$inSearch=false){
		$this->name=$name;
		$this->title=$title;
		$this->type="checkBox";
		$this->inSearch = $inSearch;
	}
	public function print_element($checked="0"){
		if($checked=="1") $ch="checked='checked'";
		return "<div class='formbox'>
			".$this->title." <input type='checkbox' name='".$this->name."' value='1'".$ch." />
		</div>";
	}
	public function print_inSearch($value=''){
		return $value;
	}
	public function get($value){
		return dataprocessing($value);
	}
}
class fileType extends FormBox{
	public $folder;
	public $icon;
	public $allowFiles;
	function __construct($name,$title,$folder,$inSearch=false,$icon=false,$allowFiles=false){
		$this->name=$name;
		$this->title=$title;
		$this->type="file";
		$this->folder=$folder;
		$this->inSearch = $inSearch;
		$this->icon = $icon;
		$this->allowFiles=$allowFiles;
	}
	public function print_element($value=''){
		if(!empty($value)){
			$return = "<div class='formbox'>
					Файл: $value
					<br />Удалить 
					<input type='checkbox' name='file_".$this->name."'>
				</div>";
		}
		$return.="<div class='formbox'>
			".$this->title.":<br />
			<input type='file' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
		return $return;
	}
		public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>".$value."</div>";
		return $return;
	}
	public function get($value){
		return rus_to_eng($value);
	}
	public function check($extension){
		if(in_array($extension,$this->allowFiles)) return true;
		else return false;
	}
}
class imgType extends FormBox{
	public $width;
	public $height;
	public $folder;
	public $filters;
	function __construct($name,$title,$width,$height,$folder,$inSearch=false,$filters=false){
		$this->name=$name;
		$this->title=$title;
		$this->type="img";
		$this->width=$width;
		$this->height=$height;
		$this->folder=$folder;
		$this->inSearch = $inSearch;
		$this->filters=$filters;
	}
	public function print_element($value=''){
		if(!empty($value)){
			$return = "<div class='formbox'>
					<img src='/images/".$this->folder."/$value' alt='' style='max-width:400px'  width='".$this->width."'/>
					<br />Удалить 
					<input type='checkbox' name='img_".$this->name."'>
				</div>";
		}
		$return.="<div class='formbox'>
			".$this->title."(".$this->width."x".$this->height."):<br />
			<input type='file' name='".$this->name."' value='".$value."' class='input' maxlength='255' />
		</div>";
		return $return;
	}
		public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div><img src='/images/".$this->folder."/".$value."' alt='' style='max-width:400px' width='".$this->width."'/></div>";
		return $return;
	}
	public function get($value){
		return rus_to_eng($value);
	}
}
class imgListType extends FormBox{
	public $width;
	public $height;
	public $folder;
	function __construct($name,$title,$width,$height,$folder,$inSearch=false){
		$this->name=$name;
		$this->title=$title;
		$this->type="gallery";
		$this->width=$width;
		$this->height=$height;
		$this->folder=$folder;
		$this->inSearch = $inSearch;
	}
	public function print_element($value=''){
		if(!empty($value)){
			$res = mysql_query("SELECT * FROM gal where `search_id`='$value' ORDER BY rate DESC");
			$return = "<div class='formbox'>";
			while($row = mysql_fetch_assoc($res)){
					echo '<div>
									<img src="/images/'.$this->folder.'/'.$row["path"].'" class="floatLeft" style="margin:10px;max-width:400px" width="'.$this->width.'">
									<div class="floatLeft" style="margin-top:20px; width:200px"><input type="checkbox" value="'.$row['id'].'" name="gal_'.$this->name.'[]"> Удалить</div>
									<!--<div class="floatLeft" style="margin-top:20px"><input type="text" style="width:273px;height:25px;padding:5px" placeholder="текст" value="'.$row['text'].'" name="galtext_'.$this->name.'[]"></div>-->
									<div class="floatLeft" style="margin-top:20px"><input type="text" style="width:273px;height:25px;padding:5px"  placeholder="alt" value="'.$row['alt'].'" name="galalt_'.$this->name.'[]"></div>
									<div class="floatLeft" style="margin-top:20px"><input type="text" style="width:273px;height:25px;padding:5px"  placeholder="title" value="'.$row['title'].'" name="galtitle_'.$this->name.'[]"></div>
									<div class="floatLeft" style="margin-top:20px"><input type="text" style="width:273px;height:25px;padding:5px"  placeholder="рейтинг" value="'.$row['rate'].'" name="galrate_'.$this->name.'[]"></div>
										<input type="hidden" value="'.$row['id'].'" name="galid_'.$this->name.'[]">
									<div class="clear"></div>
								</div>';
			}
			$return.="</div>";
		}
		$return.="<div class='formbox'>
			".$this->title."(".$this->width."x".$this->height."):<br />
			<input type='file' name='".$this->name."[]' value='".$value."' class='input' maxlength='255' multiple='true' min='1' max='999'/>
		</div>
		
		";
		return $return;
	}
		public function print_inSearch($value=''){
			if(!empty($value)) $return = "<div>".$value."</div>";
		return $return;
	}
	public function get($value){
		return rus_to_eng($value);
	}
}

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){ 
      // $pct - уровень прозрачности при наложении 0 .. 100
      if(!isset($pct)){ 
          return false; 
      }
      $pct /= 100;
      $w = imagesx( $src_im ); 
      $h = imagesy( $src_im ); 
      imagealphablending( $src_im, false );
      $minalpha = 127; 
      for( $x = 0; $x < $w; $x++ ) 
      for( $y = 0; $y < $h; $y++ ){ 
          $alpha = ( imagecolorat( $src_im, $x, $y ) >> 24 ) & 0xFF; 
          if( $alpha < $minalpha ){ 
              $minalpha = $alpha; 
          } 
      } 
      for( $x = 0; $x < $w; $x++ ){ 
          for( $y = 0; $y < $h; $y++ ){ 
              $colorxy = imagecolorat( $src_im, $x, $y ); 
              $alpha = ( $colorxy >> 24 ) & 0xFF; 
              if( $minalpha !== 127 ){ 
                  $alpha = 127 + 127 * $pct * ( $alpha - 127 ) / ( 127 - $minalpha ); 
              } else { 
                  $alpha += 127 * $pct; 
              } 
              $alphacolorxy = imagecolorallocatealpha( $src_im,
      	    	    	    	    	    	( $colorxy >> 16 ) & 0xFF,
      	    	    	    	    	    	( $colorxy >> 8 ) & 0xFF,
      	    	    	    	    	    	  $colorxy & 0xFF, $alpha
      	    	    	    	      ); 
              if( !imagesetpixel( $src_im, $x, $y, $alphacolorxy ) ){ 
                  return false; 
              } 
          } 
      } 
      imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h); 
  }

function imagealphamask( &$picture, $mask ) {
    // Get sizes and set up new picture
    $xSize = imagesx( $picture );
    $ySize = imagesy( $picture );
    $newPicture = imagecreatetruecolor( $xSize, $ySize );
    imagesavealpha( $newPicture, true );
    imagefill( $newPicture, 0, 0, imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 ) );
    // Resize mask if necessary
    if( $xSize != imagesx( $mask ) || $ySize != imagesy( $mask ) ) {
        $tempPic = imagecreatetruecolor( $xSize, $ySize );
        imagecopyresampled( $tempPic, $mask, 0, 0, 0, 0, $xSize, $ySize, imagesx( $mask ), imagesy( $mask ) );
        imagedestroy( $mask );
        $mask = $tempPic;
    }
    // Perform pixel-based alpha map application
    for( $x = 0; $x < $xSize; $x++ ) {
        for( $y = 0; $y < $ySize; $y++ ) {
            $alpha = imagecolorsforindex( $mask, imagecolorat( $mask, $x, $y ) );
            $alpha = 127 - floor( $alpha[ 'red' ] / 2 );
            $color = imagecolorsforindex( $picture, imagecolorat( $picture, $x, $y ) );
            imagesetpixel( $newPicture, $x, $y, imagecolorallocatealpha( $newPicture, $color[ 'red' ], $color[ 'green' ], $color[ 'blue' ], $alpha ) );
        }
    }
    // Copy back to original picture
    imagedestroy( $picture );
    $picture = $newPicture;
}

//Используется с установленным chdir и загруженным tmp_file из FILES
function makeImg($name,$width,$height,$imask=false,$iwatermark=false){
	$filename = $_FILES[$name]['name'];
	$path_info = pathinfo($filename);
	$extension = $path_info['extension'];
	$path = rus_to_eng($path_info['filename'])."-".time().round(microtime()*1000).".".$extension;	
	$rpath= rus_to_eng($path_info['filename'])."-".time().round(microtime()*1000+1).".png";
	move_uploaded_file($_FILES[$name]['tmp_name'], $path);
	$nwidth1 = $width;
	$nheight1 = $height;
	$imageinfo = getimagesize($path);
	$width = $imageinfo[0];
	$height = $imageinfo[1];
	$nheight = $nheight1;
	$nwidth = ($nheight/$height)*$width;
	if ($nwidth < $nwidth1)
	{
		$nwidth = $nwidth1;
		$nheight = ($nwidth/$width)*$height;
	}
	else if ($nheight < $nheight1)
	{
		$nheight = $nheight1;
		$nwidth = ($nheight/$height)*$width;
	}
	exec("convert -resize ".round($nwidth)."x".round($nheight)." -quality 90 ".$path." ".$path."");
	exec("convert -gravity Center -crop ".$nwidth1."x".$nheight1."+0+0 -quality 90 ".$path." ".$path."");
	if($iwatermark || $imask){
		if($extension=='png')	$source = imagecreatefrompng($path);
		else if($extension=='jpg' || $extension=='jpeg') $source = imagecreatefromjpeg($path);
		else {echo 'Ошибка при работе с расширением: '.$extension;exit;}
	}
	if($imask){
		// Load source and mask
		$mask = imagecreatefrompng( '../mask_pent_278_323.png' );
			// Apply mask to source
		imagealphamask( $source, $mask );
	}
		
	if($iwatermark){
		// Output
		$watermark_src = '../border_pent_278_323.png';
		// получаем ее размер
		$sizeWM = getimagesize($watermark_src);
		$heightWM = $sizeWM[1]; // высота
		$widthWM = $sizeWM[0]; // ширина
		// Загружаем изображения
		$image = imagecreatefromjpeg($img);
		$watermark = imagecreatefrompng($watermark_src);
		// задаем прозрачность
		imagesavealpha($watermark, true);
		// координаты верхнего левого угла накладываемой картинки
		$x = 0;
		$y = 0;
		// Копируем
		imagecopymerge_alpha(
				$source, $watermark, $x, $y, 0, 0,
				$widthWM, $heightWM,10
		);
	}
	if($iwatermark || $imask){
		imagepng($source,$rpath);
		unlink($path);
		return $rpath;
	}else{
		return $path;
	}
}

//Используется с установленным chdir и загруженным tmp_file из FILES
function makeGalImg($name,$width,$height,$i,$imask=false,$iwatermark=false){
	$filename = $_FILES[$name]['name'][$i];
	$path_info = pathinfo($filename);
	$extension = $path_info['extension'];
	$path = rus_to_eng($path_info['filename'])."-".time().round(microtime()*1000).".".$extension;	
	$rpath= rus_to_eng($path_info['filename'])."-".time().round(microtime()*1000+1).".png";
	move_uploaded_file($_FILES[$name]['tmp_name'][$i], $path);
	$nwidth1 = $width;
	$nheight1 = $height;
	$imageinfo = getimagesize($path);
	$width = $imageinfo[0];
	$height = $imageinfo[1];
	$nheight = $nheight1;
	$nwidth = ($nheight/$height)*$width;
	if ($nwidth < $nwidth1)
	{
		$nwidth = $nwidth1;
		$nheight = ($nwidth/$width)*$height;
	}
	else if ($nheight < $nheight1)
	{
		$nheight = $nheight1;
		$nwidth = ($nheight/$height)*$width;
	}
	exec("convert -resize ".round($nwidth)."x".round($nheight)." -quality 90 ".$path." ".$path."");
	exec("convert -gravity Center -crop ".$nwidth1."x".$nheight1."+0+0 -quality 90 ".$path." ".$path."");
	if($iwatermark || $imask){
		if($extension=='png')	$source = imagecreatefrompng($path);
		else if($extension=='jpg' || $extension=='jpeg') $source = imagecreatefromjpeg($path);
		else {echo 'Ошибка при работе с расширением: '.$extension;exit;}
	}
	if($imask){
		// Load source and mask
		$mask = imagecreatefrompng( '../mask_pent_278_323.png' );
			// Apply mask to source
		imagealphamask( $source, $mask );
	}
		
	if($iwatermark){
		// Output
		$watermark_src = '../border_pent_278_323.png';
		// получаем ее размер
		$sizeWM = getimagesize($watermark_src);
		$heightWM = $sizeWM[1]; // высота
		$widthWM = $sizeWM[0]; // ширина
		// Загружаем изображения
		$image = imagecreatefromjpeg($img);
		$watermark = imagecreatefrompng($watermark_src);
		// задаем прозрачность
		imagesavealpha($watermark, true);
		// координаты верхнего левого угла накладываемой картинки
		$x = 0;
		$y = 0;
		// Копируем
		imagecopymerge_alpha(
				$source, $watermark, $x, $y, 0, 0,
				$widthWM, $heightWM,10
		);
	}
	if($iwatermark || $imask){
		imagepng($source,$rpath);
		unlink($path);
		return $rpath;
	}else{
		return $path;
	}
}

?>