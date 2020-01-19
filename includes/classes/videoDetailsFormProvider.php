<!-- This Class handles Upload form part -->

<?php

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
        return "<form action='processing.php' method='POST'>
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
        <label for='fileInsert'>Insert a file</label>
        <input type='file' class='form-control-file bg-dark text-white' name='fileInput' id='fileInsert' required>
                </div>";
    }
    private function createTitleInput(){
        return "<div class='form-group'>
        <label for='insertTitle'>Insert a title</label>
        <input class='form-control bg-dark text-white' type='text'  placeholder='Title' name='titleInput' id='insertTitle' required>
        </div>";
    }
    private function createDescriptionInput(){
        return "<div class='form-group'>
        <label for='insertDescription'>Insert description</label>
        <textarea class='form-control bg-dark text-white' placeholder='Insert text' name='insertDescription' rows='3'></textarea>
        </div>
        ";
    }
        private function createPrivacyInput(){
            return "<div class='form-group'>
            <label for='selectPrivacy'>Choose:</label>
            <select class='form-control bg-dark text-white' id='selectPrivacy' name='privactInput'>
            <option value='0'>Public</option>
            <option value='1'>Private</option>
            </select>
            </div>";
        }
        private function createCategoriesInput() {
            $query = $this->con->prepare("SELECT * FROM `video-categories`");
            $query->execute();
            
            $html = "<div class ='form-group'>
            <label for='selectCategory'>Choose category:</label>
            <select class='form-control bg-dark text-white' id='selectCategory' name='categoryInput'>";

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