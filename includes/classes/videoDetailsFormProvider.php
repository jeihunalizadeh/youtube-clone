<!-- This Class handles Upload form part -->

<?php

class VideoDetailsFormProvider {
    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        return "<form action='processing.php' method='POST'
            $fileInput
            $titleInput
        </form>";
    }
    private function createFileInput() {
        return "<div class='form-group'>
        <input type='file' class='form-control-file' name='fileInput' required>
                </div>";
    }
    private function createTitleInput(){
        return "<div class='form-group'>
        <input class='form-control ' type='text'  placeholder='Title' name='titleInput' required>
        </div>";
    }
}



?>