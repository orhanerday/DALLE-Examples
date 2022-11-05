<h1>Edit Image</h1>
<form action="/image-edit.php" method="post" enctype="multipart/form-data">
    Select file to upload: <br>
    <label for="image">Image</label>
    <input type="file" name="image" id="image">
    <br>
    <label for="mask">Mask</label>
    <input type="file" name="mask" id="mask">
    <br>
    <input type="submit" value="Upload File" name="submit">
</form>
<?php
require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (ob_get_contents()) ob_end_clean();
    $open_ai_key = getenv('OPENAI_API_KEY');
    $open_ai = new OpenAi($open_ai_key);
    $tmp_file = $_FILES['image']['tmp_name'];
    $file_name = basename($_FILES['image']['name']);
    $image = curl_file_create($tmp_file, $_FILES['image']['type'], $file_name);

    $tmp_file = $_FILES['mask']['tmp_name'];
    $file_name = basename($_FILES['mask']['name']);
    $mask = curl_file_create($tmp_file, $_FILES['mask']['type'], $file_name);
    $result = $open_ai->imageEdit([
        "image" => $image,
        "mask" => $mask,
        "prompt" => "A cute baby sea otter wearing a beret",
        "n" => 2,
        "size" => "256x256",
    ]);
    echo $result;
}
