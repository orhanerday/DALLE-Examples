# DALL-E Examples

### The following HTML forms are available for DALL-E operations
* Generate Image
* Edit Image
* Create Image Variations

## Using Docker

Build the image
```shell
docker build -t dalle-examples .
```
or pull from Docker Hub

```shell
docker pull orhan55555/dallephp
```

Run the app
```shell
docker run -p 8000:8000 -e OPENAI_API_KEY=sk-rf... dalle-examples
```

## Getting started 
Before you get starting, you should set OPENAI_API_KEY with the following commands;

_Powershell_
```powershell
$Env:OPENAI_API_KEY = "sk-gjtv....."
```

_Cmd_
```cmd
set OPENAI_API_KEY=sk-gjtv.....
```

_Linux or macOS_
```shell
export OPENAI_API_KEY=sk-gjtv.....
```
> Getting issues while setting up env? Please read https://help.openai.com/en/articles/5112595-best-practices-for-api-key-safety article.

### Add and update the depencencies 

```shell
composer update
```

### Run the server with the following command

```shell
php -S localhost:8000 -t .
```

> This app is uses [OrhanErday/OpenAI](https://github.com/orhanerday/open-ai) library.
