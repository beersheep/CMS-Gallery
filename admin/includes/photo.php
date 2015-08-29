<?php 



class Photo extends Db_object {

	protected static $db_table = "photos";
	protected static $db_table_field = 
	array("id","title","caption", "description", "filename", "alternate_text", "photo_type", "size");

	public $id;
	public $title;
	public $caption;
	public $description;
	public $filename;
	public $alternate_text;
	public $photo_type;
	public $size;

	public $tmp_path;
	public $upload_directory ="images";
	public $errors = array();
	public $upload_error = array(

		UPLOAD_ERR_OK			=>"Upload Success.",
		UPLOAD_ERR_INI_SIZE		=>"The upload file exceeds the upload_max_filesize",
		UPLOAD_ERR_FORM_SIZE	=>"The upload file exceeds the max file size",
		UPLOAD_ERR_PARTIAL		=>"The upload was only partially uploaded.",
		UPLOAD_ERR_NO_FILE		=>"No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR	=>"Missing a temporary folder.",
		UPLOAD_ERR_CANT_WRITE	=>"Failed to write file to disk",
		UPLOAD_ERR_EXTENSION	=>"A PHP extension stopped the file upload."

		);

	public function set_file($file){

		if(empty($file) || !$file || !is_array($file)){
			$this->errors[] = "There was no file uploaded here";
			return false;

		} elseif ($file['error'] !=0){
			$this->errors[] = $this->$upload_error[$file['error']];
			return false;

		} else {

		$this->filename = basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->photo_type = $file['type'];
		$this->size = $file['size'];

		}


	} // set_file method


	public function picture_path() {

		return $this->upload_directory.DS.$this->filename;
	}


	public function save() {

		if ($this->id) {
			$this->update();

		} else {

			if (!empty($this->errors)) {

				return false;
			}

			if (empty($this->filename) || empty($this->tmp_path)){
				$this->errors[] = "the file was not available!";
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;


			if (file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already existed.";
				return false;
			}

			if (move_uploaded_file($this->tmp_path, $target_path)) {

				if ($this->create()) {
					unset($tmp_path);
					return true;
				} else {
					$this->errors[] = "You cannot access the file diretory.";
					return false;
					foreach ($this->errors as $error) {
						echo $error."<br/>";
					}
				}

			} // if move upload file
			
		}

	} // End Save method


	public function delete_photo(){

		if($this->delete()) {

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

			return unlink($target_path) ? true : false;

		} else {

			return false;

		}

	} // End delete_photo method;


} // End Photo Class


 ?>