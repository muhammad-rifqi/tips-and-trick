<?php
$path = 'home';
$page = '';
if(isset($_GET['path'])){
    $path = $_GET['path'];
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPA</title>
    <script>
        let loader = new Image(98,109);
        loader.src= 'cogs.gif';
        let lastloaded = '';
        function loadContent(path, addhist){
            let path_array = path.split('/');
                path = path_array[0];
            if(lastloaded == path) {return false;}
            if(path_array.length > 1){history.replaceState('','','/'+path);}
            let contentbox = document.getElementById("content");
            contentbox.innerHTML = '';
            contentbox.appendChild(loader);

            let ajax = new XMLHttpRequest();
            ajax.open("POST", '/handler.php', true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = ()=> {
                if(ajax.readyState == 4 && ajax.status == 200) {
                    document.title = path;
                    contentbox.innerHTML = ajax.responseText;
                    lastloaded == path
                    if(addhist != false){
                        let state = {'path' : path };
                        history.pushState(state , '' , path);
                    }
                }
            }

            ajax.send("path="+path);
    }
    window.addEventListener("popstate",(event)=>{
        let esp = '';
            if(event.state == null){
                esp = 'home';
            }else{
                esp = event.state.path;
            }
            loadContent(esp, false);
    })

    window.addEventListener("load",(e)=>{
        loadContent('<?php echo $path; ?>', false);
    })
    </script>
</head>
<body>
<header>
    <h1> SPA Demo - Database Driven </h1>
</header>
<nav>
    <button onclick="loadContent(this.dataset.path)" data-path="home">Home</button>
    <button onclick="loadContent(this.dataset.path)" data-path="service">Service</button>
    <button onclick="loadContent(this.dataset.path)" data-path="about">About</button>
    <button onclick="loadContent(this.dataset.path)" data-path="contact">Contact</button>
</nav>
<hr/>
<main id="content">
    <?php echo $page; ?>
</main>
<footer>Copyright by Muhammad Rifqi</footer>
</body>
</html>

