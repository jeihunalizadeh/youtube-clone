<?php
// This Class handles the form input, 
// it gets all the data about video
//  and handles it
class VideoDetailsFormProvider {
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $createCategoriesInput = $this->createCategoriesInput();
        $createUploadButton = $this->createUploadButton();
        return "<form action='processing.php' method='POST' enctype='multipart/form-data'>
            $fileInput
            $titleInput
            $descriptionInput
            $privacyInput
            $createCategoriesInput
            $createUploadButton
        </form>
        ";
    }
    private function createFileInput() {
        return "<div class='form-group'>
        <label for='fileInput'>Insert a file</label>
        <input type='file' class='form-control-file bg-dark text-white' name='fileInput' id='fileInput' required>
                </div>";
    }
    private function createTitleInput(){
        return "<div class='form-group'>
        <label for='titleInput'>Insert a title</label>
        <input class='form-control bg-dark text-white' type='text'  placeholder='Title' name='titleInput' id='titleInput' required>
        </div>";
    }  
    private function createDescriptionInput(){
        return "<div class='form-group'>
        <label for='descriptionInput'>Insert description</label>
        <textarea class='form-control bg-dark text-white' placeholder='Insert text' name='descriptionInput' id='descriptionInput' rows='3'></textarea>
        </div>
        ";
    }
        private function createPrivacyInput(){
            return "<div class='form-group'>
            <label for='privacyInput'>Choose:</label>
            <select class='form-control bg-dark text-white' id='privacyInput' name='privacyInput'>
            <option value='0'>Public</option>
            <option value='1'>Private</option>
            </select>
            </div>";
        }
        private function createCategoriesInput() {
            $query = $this->con->prepare("SELECT * FROM `video-categories`");
            $query->execute();
            
            $html = "<div class ='form-group'>
            <label for='categoryInput'>Choose category:</label>
            <select class='form-control bg-dark text-white' id='categoryInput' name='categoryInput'>";

            while($row= $query->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
                $name = $row['name'];

                $html .= "<option value='$id'>$name</option>";
            }
                $html .="</select></div>";

                return $html;

        }
        private function createUploadButton(){
            return "<button type='submit' name='uploadButton' class='btn btn-primary'>Upload</button>";
        }

    }




?>