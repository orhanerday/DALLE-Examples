<h1>Variations</h1>
<form action="/variations.php" method="post" enctype="multipart/form-data">
    Select file to upload: <br>
    <label for="image">Image</label>
    <input type="file" name="image" id="image">
    <br>
    <input type="submit" value="Upload File" name="submit">
</form>
<?php
require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    ob_clean();
    $open_ai_key = getenv('OPENAI_API_KEY');
    $open_ai = new OpenAi($open_ai_key);
    $tmp_file = $_FILES['image']['tmp_name'];
    $file_name = basename($_FILES['image']['name']);
    $image = curl_file_create($tmp_file, $_FILES['image']['type'], $file_name);

    $result = $open_ai->createImageVariation([
        "image" => $image,
        "n" => 2,
        "size" => "256x256",
    ]);
    echo $result;
}
