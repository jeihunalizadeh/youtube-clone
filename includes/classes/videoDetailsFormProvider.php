<!-- This Class handles Upload form part -->

<?php

class VideoDetailsFormProvider {
    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        return "<form action='processing.php' method='POST'>
            $fileInput
            $titleInput
            $descriptionInput
            $privacyInput
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
            <select class='form-control bg-dark text-white' id='selectPrivacy'>
            <option value='0'>Public</option>
            <option value='1'>Private</option>
            </select>
            </div>";
        }
    }




?>