<!doctype html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VAN GISTEREN</title>
    <link rel="shortcut icon" href="/media/favicon.ico" type="image/x-icon">
    <meta name="author" content="www.roxlu.com">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Copse|Arvo|Scope+One|Lato|Open+Sans|Pontano+Sans|Josefin+Sans|Josefin+Slab|Slabo+27px|Maven+Pro|Cabin|Rubik" rel="stylesheet">
    <link rel="stylesheet" href="/css/ress.css">
    <link rel="stylesheet" href="/css/socicon.css">
    <link rel="stylesheet" href="/css/hamburger.css?{$smarty.now}">
    <link rel="stylesheet" href="/css/vangisteren.css?{$smarty.now}">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="/js/vangisteren.js"></script>
  </head>
  <body class="{$page}">
    <header id="menu-header">
      <div class="container">
        <a id="logo" href="/" title="VAN GISTEREN"></a>
        <div id="menu-hamburger">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div id="menu">
          <ul id="menu-main">
            <li><a href="/" title="">Home</a></li>
            <li><a href="/werk" title="">Werk</a></li>
            <li><a href="/over" title="">Over Ons</a></li>
            <li><a href="/contact" title="">Contact</a></li>
            <li>
              <ul id="menu-social">
                <li><a class="socicon-facebook inline-socicon" href="https://www.facebook.com/vangisteren.nu" title="Bezoek onze pagina op Facebook" target="_blank"></a></li>
                <li><a class="socicon-twitter inline-socicon" href="https://twitter.com/van_gisteren" title="Bezoek onze pagina op Twitter" target="_blank"></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div id="site">
      {if $page == "homepage"}
        {include file="homepage.tpl"}
      {elseif $page == "overview"}
        {include file="work.tpl"}
      {elseif $page != "" && is_array($post)}
        {include file="post.tpl"}
      {/if}
      <footer>
        <ul>
          <li><a class="socicon-facebook inline-socicon" href="https://www.facebook.com/vangisteren.nu" title="Bezoek onze pagina op Facebook" target="_blank"></a></li>
          <li><a class="socicon-twitter inline-socicon" href="https://twitter.com/van_gisteren" title="Bezoek onze pagina op Twitter" target="_blank"></a></li>
        </ul>
      </footer>
    </div>
    <script>
     $(document).ready(function(){
       $('#menu-hamburger').click(function(){
         $(this).toggleClass('open');
         $('#menu').toggleClass('open');
         $('body').toggleClass("menu-open");
       });
     });
    </script>

  </body>
</html>
