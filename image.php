<h1>Generate Image</h1>
<form action="/image.php" method="post" enctype="multipart/form-data">
    Generate Image With Given Input: <br>
    <label for="prompt">Prompt</label>
    <input type="text" name="prompt" id="prompt">
    <br>
    <input type="submit" value="Generate Image" name="submit">
</form>
<?php
require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (ob_get_contents()) ob_end_clean();
    $open_ai_key = getenv('OPENAI_API_KEY');
    $open_ai = new OpenAi($open_ai_key);

    $result = $open_ai->image([
        "prompt" => $_POST["prompt"],
        "n" => 1,
        "size" => "256x256",
    ]);
    echo $result;
}
